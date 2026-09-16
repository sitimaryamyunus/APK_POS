@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .about-wrap {
        max-width: 900px;
    }

    .display {
        font-family: Georgia, "Iowan Old Style", "Palatino Linotype", "Book Antiqua", serif;
    }

    /* Section wrapper sama seperti dashboard-section */
    .dashboard-section {
        background: rgba(255, 255, 255, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.75rem;
        padding: 1.75rem 1.75rem 1.5rem 1.75rem;
        margin-bottom: 2rem;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    /* Hero */
    .about-hero {
        text-align: center;
        padding: 2.5rem 1rem 1.5rem;
    }

    .about-hero .eyebrow {
        font-size: 0.72rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: #ec4899;
        font-weight: 700;
        margin-bottom: 0.85rem;
    }

    .about-hero h1 {
        font-size: 2.35rem;
        margin: 0 0 1rem;
        color: #4c0519;
        font-weight: 400;
        letter-spacing: 0.01em;
    }

    .about-hero h1 em {
        color: #9d174d;
        font-style: italic;
    }

    .about-hero-rule {
        width: 56px;
        height: 3px;
        background: linear-gradient(90deg, #f472b6, #db2777);
        margin: 0 auto 1.35rem;
        border-radius: 2px;
    }

    .about-hero p {
        font-size: 0.97rem;
        line-height: 1.75;
        color: #831843;
        margin: 0 auto;
        max-width: 620px;
    }

    .about-hero p strong {
        color: #9d174d;
    }

    /* Kartu Visi & Misi, styling senada .card di dashboard */
    .story-card {
        border: none;
        border-radius: 1.25rem;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.7);
        box-shadow:
            0 8px 20px -6px rgba(219, 39, 119, 0.08),
            0 0 0 1px rgba(251, 207, 232, 0.4);
        transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.2s ease;
        height: 100%;
        padding: 1.75rem;
        position: relative;
    }

    .story-card:hover {
        transform: translateY(-3px);
        box-shadow:
            0 14px 28px -6px rgba(219, 39, 119, 0.14),
            0 0 0 1px rgba(251, 207, 232, 0.6);
    }

    .story-card .badge {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        margin-bottom: 1rem;
    }

    .story-card.visi .badge {
        background: #fbcfe8;
        color: #9d174d;
    }

    .story-card.misi .badge {
        background: #fae8ff;
        color: #a21caf;
    }

    .story-card .tag {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        font-size: 0.62rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #9d174d;
        font-weight: 700;
        opacity: 0.55;
    }

    .story-card h2 {
        font-size: 1.15rem;
        margin: 0 0 0.6rem;
        font-weight: 800;
        color: #4c0519;
    }

    .story-card p {
        font-size: 0.87rem;
        line-height: 1.7;
        color: #831843;
        margin: 0;
    }

    /* Divider */
    .about-divider {
        display: flex;
        align-items: center;
        gap: 14px;
        margin: 0.5rem 0 1.5rem;
    }

    .about-divider .line {
        flex: 1;
        height: 1px;
        background: #fbcfe8;
    }

    .about-divider .mark {
        color: #ec4899;
        font-size: 0.8rem;
        letter-spacing: 0.3em;
    }

    /* Quote */
    .about-quote {
        text-align: center;
        padding: 0 1rem 0.5rem;
    }

    .about-quote .mark-open {
        font-size: 2.5rem;
        font-family: Georgia, serif;
        color: #fbcfe8;
        line-height: 0;
        display: block;
        margin-bottom: 0.4rem;
    }

    .about-quote p {
        font-size: 1.15rem;
        font-style: italic;
        color: #9d174d;
        font-family: Georgia, "Iowan Old Style", serif;
        margin: 0 auto;
        max-width: 480px;
        line-height: 1.6;
    }

    .about-quote .sign {
        margin-top: 1rem;
        font-size: 0.72rem;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: #9d174d;
        font-weight: 700;
    }

    /* Info Kontak & Lokasi */
    .info-heading {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .info-heading .eyebrow {
        font-size: 0.72rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: #ec4899;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .info-heading h2 {
        font-size: 1.4rem;
        color: #4c0519;
        font-weight: 400;
        margin: 0;
    }

    .info-heading h2 em {
        color: #9d174d;
        font-style: italic;
    }

    .info-card {
        border: none;
        border-radius: 1.25rem;
        background: rgba(255, 255, 255, 0.7);
        box-shadow:
            0 8px 20px -6px rgba(219, 39, 119, 0.08),
            0 0 0 1px rgba(251, 207, 232, 0.4);
        padding: 1.5rem 1.6rem;
        height: 100%;
        transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.2s ease;
    }

    .info-card:hover {
        transform: translateY(-3px);
        box-shadow:
            0 14px 28px -6px rgba(219, 39, 119, 0.14),
            0 0 0 1px rgba(251, 207, 232, 0.6);
    }

    .info-card .badge {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        margin-bottom: 0.9rem;
        background: #fbcfe8;
        color: #9d174d;
    }

    .info-card h3 {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #be185d;
        font-weight: 700;
        margin: 0 0 0.5rem;
    }

    .info-card p {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #4c0519;
        font-weight: 600;
        margin: 0;
    }

    .info-card .sub {
        font-size: 0.8rem;
        color: #831843;
        font-weight: 500;
        margin-top: 0.2rem;
    }

    /* Sosial Media */
    .social-row {
        display: flex;
        flex-wrap: wrap;
        gap: 0.9rem;
        justify-content: center;
        margin-top: 1.75rem;
    }

    .social-pill {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        background: rgba(255, 255, 255, 0.75);
        border: 1px solid #fbcfe8;
        border-radius: 999px;
        padding: 0.6rem 1.3rem;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 6px 15px rgba(219, 39, 119, 0.06);
    }

    .social-pill:hover {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
        border-color: #ec4899;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(236, 72, 153, 0.25);
    }

    .social-pill .icon {
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .social-pill .icon svg {
        width: 20px;
        height: 20px;
        fill: #be185d;
        transition: fill 0.2s ease;
    }

    .social-pill:hover .icon svg {
        fill: #fff;
    }

    .social-pill span.label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #4c0519;
        transition: color 0.2s ease;
    }

    .social-pill:hover span.label {
        color: #fff;
    }

    @media (max-width: 767px) {
        .dashboard-section {
            padding: 1.25rem;
        }

        .about-hero h1 {
            font-size: 1.85rem;
        }
    }
</style>

<div class="container about-wrap mt-4">

    <!-- Hero -->
    <div class="dashboard-section">
        <div class="about-hero">
            <div class="eyebrow">Tentang Kami</div>
            <h1 class="display">Tentang <em>Rosé</em> Cafe</h1>
            <div class="about-hero-rule"></div>
            <p>
                Selamat datang di <strong>Rosé Cafe!</strong> Kami adalah tempat di mana rasa, kenyamanan,
                dan kehangatan bertemu. Berawal dari kecintaan kami terhadap kopi berkualitas dan hidangan
                penutup yang manis, kami hadir untuk menemani setiap momen berharga Anda.
            </p>
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="dashboard-section">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="story-card visi">
                    <span class="tag">01</span>
                    <div class="badge">✦</div>
                    <h2 class="display">Visi Kami</h2>
                    <p>Menjadi cafe pilihan utama yang menyajikan kebahagiaan di setiap cangkir kopi dan hidangan yang kami sajikan.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="story-card misi">
                    <span class="tag">02</span>
                    <div class="badge">🌿</div>
                    <h2 class="display">Misi Kami</h2>
                    <p>Menggunakan bahan baku premium, memberikan pelayanan terbaik dengan senyuman, dan menciptakan suasana yang nyaman bagi semua pelanggan.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== INFO LOKASI, JAM BUKA & KONTAK ===================== --}}
    {{-- Ganti isi teks di bawah ini (alamat, jam, dan link sosial media) sesuai data Rosé Cafe yang sebenarnya --}}
    <div class="dashboard-section">
        <div class="info-heading">
            <div class="eyebrow">Kunjungi Kami</div>
            <h2 class="display">Lokasi &amp; <em>Jam Operasional</em></h2>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="info-card">
                    <div class="badge">📍</div>
                    <h3>Alamat</h3>
                    <p>Jl. Kopi Manis No. 12</p>
                    <div class="sub">Bandung, Jawa Barat, Indonesia</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <div class="badge">🕒</div>
                    <h3>Jam Buka</h3>
                    <p>Setiap Hari, 08.00 – 22.00 WIB</p>
                    <div class="sub">Buka setiap hari termasuk akhir pekan</div>
                </div>
            </div>
        </div>

        <div class="social-row">
            <a href="https://instagram.com/_maryamyu_" target="_blank" rel="noopener" class="social-pill">
                <span class="icon">
                    <svg viewBox="0 0 24 24"><path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.256 1.216.6 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.05 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.05-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 1.802c-2.67 0-2.987.01-4.04.059-.976.045-1.505.207-1.858.344-.466.181-.8.398-1.15.748-.35.35-.566.684-.747 1.15-.137.353-.3.882-.344 1.857-.05 1.054-.06 1.37-.06 4.04 0 2.67.01 2.987.06 4.04.045.976.207 1.505.344 1.858.181.466.397.8.747 1.15.35.35.684.566 1.15.747.353.137.882.3 1.858.344 1.053.05 1.37.06 4.04.06 2.67 0 2.987-.01 4.04-.06.976-.045 1.505-.207 1.857-.344.466-.181.8-.397 1.15-.747.35-.35.567-.684.748-1.15.137-.353.3-.882.344-1.858.05-1.053.06-1.37.06-4.04 0-2.67-.01-2.986-.06-4.04-.045-.975-.207-1.504-.344-1.857a3.09 3.09 0 0 0-.748-1.15 3.098 3.098 0 0 0-1.15-.748c-.352-.137-.881-.3-1.857-.344-1.053-.05-1.37-.059-4.04-.059zm0 4.595a5.603 5.603 0 1 1 0 11.206 5.603 5.603 0 0 1 0-11.206zm0 1.802a3.801 3.801 0 1 0 0 7.602 3.801 3.801 0 0 0 0-7.602zm5.83-1.997a1.31 1.31 0 1 1-2.62 0 1.31 1.31 0 0 1 2.62 0z"/></svg>
                </span>
                <span class="label">@_maryamyu_</span>
            </a>

            <a href="https://tiktok.com/@_smilinggggggggg" target="_blank" rel="noopener" class="social-pill">
                <span class="icon">
                    <svg viewBox="0 0 24 24"><path d="M16.5 3c.3 1.7 1.3 3.1 2.8 3.9.9.5 1.9.8 2.9.8v3.1c-1.6 0-3.2-.5-4.5-1.4v6.4c0 3.2-2.6 5.8-5.8 5.8a5.8 5.8 0 0 1-2-11.3v3.3a2.7 2.7 0 1 0 3.7 2.5V3h2.9z"/></svg>
                </span>
                <span class="label">@_smilinggggggggg</span>
            </a>

            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="social-pill">
                <span class="icon">
                    <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12.001 2C6.478 2 2 6.477 2 12c0 1.876.514 3.632 1.409 5.14L2 22l4.994-1.386A9.938 9.938 0 0 0 12 22c5.523 0 10-4.477 10-10S17.524 2 12.001 2zm0 18.09a8.06 8.06 0 0 1-4.115-1.126l-.295-.175-3.076.854.822-3.005-.192-.31A8.062 8.062 0 0 1 3.91 12c0-4.465 3.626-8.09 8.091-8.09 4.464 0 8.09 3.625 8.09 8.09 0 4.465-3.626 8.09-8.09 8.09z"/></svg>
                </span>
                <span class="label">+62 812-3456-7890</span>
            </a>
        </div>
    </div>

    <!-- Quote -->
    <div class="dashboard-section mb-5">
        <div class="about-divider">
            <div class="line"></div>
            <div class="mark">✦</div>
            <div class="line"></div>
        </div>
        <div class="about-quote">
            <span class="mark-open">"</span>
            <p>Dibuat dengan cinta, disajikan dengan bangga.</p>
            <div class="sign">Rosé Cafe</div>
        </div>
    </div>

</div>

@endsection