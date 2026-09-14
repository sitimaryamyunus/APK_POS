<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tentang Rosé Cafe</title>
<style>
  :root{
    --cream: #FBF5EF;
    --paper: #FFFDFB;
    --ink: #2E2420;
    --ink-soft: #7A6A62;
    --rose: #B4657A;
    --rose-deep: #8C4256;
    --rose-soft: #F3DEE3;
    --sage: #6E8F6C;
    --sage-soft: #E7EFE3;
    --line: #EAE0D6;
  }
  *{ box-sizing:border-box; }
  body{
    margin:0;
    background: var(--cream);
    color: var(--ink);
    font-family: -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
  }
  .display{
    font-family: Georgia, "Iowan Old Style", "Palatino Linotype", "Book Antiqua", serif;
  }

  .topbar{
    display:flex; align-items:center; justify-content:space-between;
    padding:16px 40px; border-bottom:1px solid var(--line);
    background: var(--paper);
  }
  .brandmark{ display:flex; align-items:center; gap:10px; }
  .brandmark .dot{
    width:10px;height:10px;border-radius:50%;
    background: var(--rose);
  }
  .brandmark span{ font-weight:700; letter-spacing:.02em; font-size:14px; color:var(--rose-deep); }
  .back-link{
    font-size:12.5px; color:var(--ink-soft); text-decoration:none;
    border:1px solid var(--line); padding:7px 14px; border-radius:999px;
    background:var(--cream);
  }

  .hero{
    max-width:760px; margin:0 auto; padding:64px 32px 40px; text-align:center;
    position:relative;
  }
  .hero .eyebrow{
    font-size:11.5px; letter-spacing:.18em; text-transform:uppercase;
    color:var(--rose); font-weight:700; margin-bottom:14px;
  }
  .hero h1{
    font-size:44px; margin:0 0 18px; color:var(--ink); font-weight:400;
    letter-spacing:.01em;
  }
  .hero h1 em{ color:var(--rose-deep); font-style:italic; }
  .hero-rule{
    width:56px; height:2px; background:var(--rose); margin:0 auto 22px; border-radius:2px;
  }
  .hero p{
    font-size:15.5px; line-height:1.75; color:#4A3F3A; margin:0 auto;
    max-width:620px;
  }
  .hero p strong{ color:var(--rose-deep); }

  .wrap{ max-width:900px; margin:0 auto; padding:10px 32px 70px; }

  .cards{
    display:grid; grid-template-columns:1fr 1fr; gap:22px; margin-top:20px;
  }
  .story-card{
    background:var(--paper);
    border:1px solid var(--line);
    border-radius:18px;
    padding:30px 28px;
    position:relative;
    box-shadow: 0 10px 30px -18px rgba(140,66,86,0.25);
  }
  .story-card .badge{
    width:44px; height:44px; border-radius:12px;
    display:flex; align-items:center; justify-content:center;
    font-size:19px; margin-bottom:16px;
  }
  .story-card.visi .badge{ background:var(--rose-soft); color:var(--rose-deep); }
  .story-card.misi .badge{ background:var(--sage-soft); color:var(--sage); }
  .story-card h2{
    font-size:20px; margin:0 0 10px; font-weight:400; color:var(--ink);
  }
  .story-card p{
    font-size:14px; line-height:1.7; color:#5A4E48; margin:0;
  }
  .story-card .tag{
    position:absolute; top:26px; right:26px;
    font-size:10px; letter-spacing:.1em; text-transform:uppercase;
    color:var(--ink-soft); font-weight:700; opacity:.55;
  }

  .divider-row{
    display:flex; align-items:center; gap:14px; margin:56px 0 34px;
  }
  .divider-row .line{ flex:1; height:1px; background:var(--line); }
  .divider-row .mark{ color:var(--rose); font-size:13px; letter-spacing:.3em; }

  .quote-block{
    text-align:center; padding:0 20px 10px;
  }
  .quote-block .mark-open{
    font-size:40px; font-family: Georgia, serif; color:var(--rose-soft);
    line-height:0; display:block; margin-bottom:6px;
  }
  .quote-block p{
    font-size:19px; font-style:italic; color:var(--rose-deep);
    font-family: Georgia, "Iowan Old Style", serif;
    margin:0 auto; max-width:480px; line-height:1.6;
  }
  .quote-block .sign{
    margin-top:16px; font-size:11.5px; letter-spacing:.14em; text-transform:uppercase;
    color:var(--ink-soft); font-weight:650;
  }

  @media (max-width:640px){
    .cards{ grid-template-columns:1fr; }
    .hero h1{ font-size:34px; }
    .hero, .wrap{ padding-left:20px; padding-right:20px; }
  }
</style>
</head>
<body>

  <div class="topbar">
    <div class="brandmark"><span class="dot"></span><span class="display">Rosé Cafe</span></div>
    <a class="back-link" href="{{ url('/dashboard') }}">← Kembali ke Dashboard</a>
  </div>

  <div class="hero">
    <div class="eyebrow">Tentang Kami</div>
    <h1 class="display">Tentang <em>Rosé</em> Cafe</h1>
    <div class="hero-rule"></div>
    <p>
      Selamat datang di <strong>Rosé Cafe!</strong> Kami adalah tempat di mana rasa, kenyamanan,
      dan kehangatan bertemu. Berawal dari kecintaan kami terhadap kopi berkualitas dan hidangan
      penutup yang manis, kami hadir untuk menemani setiap momen berharga Anda.
    </p>
  </div>

  <div class="wrap">
    <div class="cards">
      <div class="story-card visi">
        <span class="tag">01</span>
        <div class="badge">✦</div>
        <h2 class="display">Visi Kami</h2>
        <p>Menjadi cafe pilihan utama yang menyajikan kebahagiaan di setiap cangkir kopi dan hidangan yang kami sajikan.</p>
      </div>
      <div class="story-card misi">
        <span class="tag">02</span>
        <div class="badge">🌿</div>
        <h2 class="display">Misi Kami</h2>
        <p>Menggunakan bahan baku premium, memberikan pelayanan terbaik dengan senyuman, dan menciptakan suasana yang nyaman bagi semua pelanggan.</p>
      </div>
    </div>

    <div class="divider-row">
      <div class="line"></div>
      <div class="mark">✦</div>
      <div class="line"></div>
    </div>

    <div class="quote-block">
      <span class="mark-open">“</span>
      <p>Dibuat dengan cinta, disajikan dengan bangga.</p>
      <div class="sign">Rosé Cafe</div>
    </div>
  </div>

</body>
</html>