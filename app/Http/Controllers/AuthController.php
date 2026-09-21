<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(LoginRequest $request)
    {
        // 1. Cek apakah user sedang dihukum kunci waktu
        if ($request->session()->has('login_locked_until')) {
            $waktuKunci = $request->session()->get('login_locked_until');
            $sisaDetik = $waktuKunci - time();

            if ($sisaDetik > 0) {
                return back()->withErrors([
                    'password' => "Terlalu banyak percobaan login. Silakan coba lagi dalam $sisaDetik detik.",
                ])->withInput($request->only('email'));
            }

            // Jika waktu hukuman sudah habis, hapus session kunci
            $request->session()->forget('login_locked_until');
            $request->session()->forget('login_attempts');
        }

        // 2. Ambil data user berdasarkan email untuk cek manual
        $user = User::where('email', $request->email)->first();
        
        $isEmailBenar = (bool) $user;
        $isPasswordBenar = false;

        // Cek kebenaran password secara mandiri
        if ($isEmailBenar) {
            $isPasswordBenar = Hash::check($request->password, $user->password);
        } else {
            // Cek apakah password cocok dengan akun manapun di database
            $allUsers = User::all();
            foreach ($allUsers as $u) {
                if (Hash::check($request->password, $u->password)) {
                    $isPasswordBenar = true;
                    break;
                }
            }
        }

        // 3. KONDISI SUKSES: Jika Email & Password dua-duanya BENAR
        if ($isEmailBenar && $isPasswordBenar) {
            if (Auth::attempt($request->validated())) {
                // Bersihkan semua riwayat salah login
                $request->session()->forget('login_attempts');
                $request->session()->forget('login_locked_until');
                
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('succes', 'Selamat Datang, ' . Auth::user()->name);
            }
        }

        // ====================================================================
        // JIKA LOGIN GAGAL, MAKA PROSES KONDISI ERROR DI BAWAH INI
        // ====================================================================
        
        // Tambah hitungan salah (+1) di dalam Session
        $attempts = $request->session()->get('login_attempts', 0) + 1;
        $request->session()->put('login_attempts', $attempts);

        $maxAttempts = 3;
        $attemptsLeft = $maxAttempts - $attempts;

        // Tentukan template teks dasar berdasarkan jenis kesalahan input
        if (!$isEmailBenar && $isPasswordBenar) {
            $jenisError = "Email salah!";
            $field = 'email';
        } elseif ($isEmailBenar && !$isPasswordBenar) {
            $jenisError = "Kata sandi salah!";
            $field = 'password';
        } else {
            $jenisError = "Email dan Kata sandi salah!";
            $field = 'email';
        }

        // A. Jika sisa kesempatan masih ada (Salah ke-1 atau ke-2)
        if ($attemptsLeft > 0) {
            $pesanFinal = "$jenisError Sisa kesempatan Anda $attemptsLeft kali lagi.";
            
            return back()->withErrors([$field => $pesanFinal])->withInput($request->only('email'));
        } 
        // B. Jika salah sudah mencapai 3 kali, berikan hukuman kunci 15 detik gabung dengan jenis error-nya
        else {
            $durasiKunci = 15; 
            $request->session()->put('login_locked_until', time() + $durasiKunci);

            $pesanFinal = "$jenisError Terlalu banyak percobaan login. Silakan coba lagi dalam $durasiKunci detik.";

            return back()->withErrors([$field => $pesanFinal])->withInput($request->only('email'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah keluar aplikasi!');
    }
}
