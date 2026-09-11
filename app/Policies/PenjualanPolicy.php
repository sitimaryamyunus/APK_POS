<?php

namespace App\Policies;

use App\Models\Penjualan;
use App\Models\User;

class PenjualanPolicy
{
    /**
     * Mengizinkan proses hapus untuk semua status penjualan
     */
    public function delete(User $user, Penjualan $penjualan): bool
    {
        return true;
    }

    /**
     * Mengizinkan proses view/edit
     */
    public function view(User $user, Penjualan $penjualan): bool
    {
        return $user->role->name === 'admin'
        && $penjualan->status === 'OPEN';
    }
}
