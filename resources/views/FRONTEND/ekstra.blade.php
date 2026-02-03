@extends('frontend.layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

<style>
/* ===== HERO ===== */
.hero-ekstra {
    background: linear-gradient(135deg, #0b3c8a, #0a2f6b);
    color: white;
    padding: 80px 0;
}
.hero-ekstra h1 {
    font-size: 48px;
    font-weight: bold;
}
.hero-ekstra p {
    max-width: 600px;
}

/* ===== CAROUSEL ===== */
.section-daftar {
    text-align: center;
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 10px;
}
.carousel-container {
    position: relative;
    max-width: 1200px;
    height: 420px;
    margin: 10px auto;
    perspective: 1000px;
}
.carousel {
    position: relative;
    height: 100%;
    transform-style: preserve-3d;
}

/* ===== CARD ===== */
.ekstra-card {
    position: absolute;
    top: 10%;
    left: 40%;
    width: 260px;
    height: 360px;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 18px 40px rgba(0,0,0,.35);
    transition: all .45s ease;
    cursor: pointer;
    background: #000;
}
.ekstra-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.ekstra-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.8), rgba(0,0,0,.15));
}
.ekstra-info {
    position: absolute;
    bottom: 25px;
    left: 25px;
    right: 25px;
    color: white;
    z-index: 2;
    opacity: 0;
    transform: translateY(15px);
    transition: all .4s ease;
}
.ekstra-card.active {
    transform: scale(1.1) translateZ(70px);
    z-index: 10;
}
.ekstra-card.left {
    transform: translateX(-320px) rotateY(15deg) scale(.85);
    opacity: .65;
}
.ekstra-card.right {
    transform: translateX(320px) rotateY(-15deg) scale(.85);
    opacity: .65;
}
.ekstra-card.hidden {
    opacity: 0;
    transform: scale(.6);
}
.ekstra-card.active:hover {
    transform: scale(1.13) translateZ(70px);
}
.ekstra-card.active .ekstra-info {
    opacity: 1;
    transform: translateY(0);
}

/* ===== NAV BUTTON ===== */
.nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,.9);
    border: none;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    font-size: 22px;
    cursor: pointer;
    z-index: 20;
}
.nav-btn.left { left: 15px; }
.nav-btn.right { right: 15px; }

/* ===== ESKUL FAVORIT ===== */
.eskul-favorit {
    background: #f5f7fb;
    padding: 80px 0;
}
.section-title {
    text-align: center;
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 50px;
}
.favorit-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: center;
    margin-bottom: 50px;
}
.favorit-image {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,.2);
}
.favorit-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.8), rgba(0,0,0,.2));
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 25px;
}
.image-overlay h3 {
    font-size: 20px;
    font-weight: 100;
}
.favorit-desc p {
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 25px;
}

/* ===== INFO ===== */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 60px;
}
.info-box {
    border-radius: 14px;
    padding: 25px;
    box-shadow: 0 12px 30px rgba(0,0,0,.12);
}
.info-box.dark {
    background: #355c8c;
    color: #fff;
}
.info-box.light {
    background: #e8f1ff;
}
.info-box h4 {
    margin-bottom: 15px;
    font-weight: 700;
}

/* ===== CTA ===== */
.cta-ekstra {
    background: #355c8c;
    color: white;
    border-radius: 18px;
    padding: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 30px;
}

/* ===== BUTTON ===== */
.btn-primary {
    background: #2d6cdf;
    color: white;
    padding: 10px 22px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
}
.btn-outline {
    border: 2px solid #fff;
    color: #fff;
    padding: 10px 22px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
}
</style>

{{-- HERO --}}
<section class="hero-ekstra">
    <div class="container">
        <h1>EKSTRAKURIKULER</h1>
        <p>Wadah pengembangan minat dan bakat siswa di berbagai bidang.</p>
    </div>
</section>

{{-- CAROUSEL --}}
<div class="carousel-container">
    <h2 class="section-daftar">DAFTAR EKSTRA</h2>
    <button class="nav-btn left" onclick="prevCard()">&#10094;</button>

    <div class="carousel" id="carousel">
        @php
            $ekstra = ['Futsal','Basket','Voli','Karate','Pramuka','Musik','Tari'];
        @endphp

        @foreach($ekstra as $i => $nama)
        <div class="ekstra-card">
            <img src="https://picsum.photos/400/600?random={{ $i }}">
            <div class="ekstra-info">
                <h4>{{ $nama }}</h4>
                <p>Ekstrakurikuler {{ $nama }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <button class="nav-btn right" onclick="nextCard()">&#10095;</button>
</div>

{{-- ESKUL FAVORIT --}}
<section class="eskul-favorit">
    <div class="container">
        <h2 class="section-title">ESKUL FAVORIT</h2>

    <div class="container">
        <div class="favorit-grid">
            <div class="favorit-image">
                <img src="https://picsum.photos/600/600?random=20">
                <div class="image-overlay">
                    <span>Ekstra Unggulan</span>
                    <h3>Tabuh</h3>
                </div>
            </div>

            <div class="favorit-desc">
                <p>
                    Tabuh merupakan salah satu ekstrakurikuler unggulan
                    yang melatih kekompakan, disiplin, serta kecintaan
                    terhadap budaya tradisional.
                </p>
                <a href="#" class="btn-primary">Daftar Sekarang</a>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-box dark">
                <h4>Keunggulan</h4>
                <ul>
                    <li>Mengembangkan bakat</li>
                    <li>Melatih disiplin</li>
                    <li>Menambah percaya diri</li>
                </ul>
            </div>

            <div class="info-box light">
                <h4>Aturan Ekstra</h4>
                <ul>
                    <li>Disiplin hadir</li>
                    <li>Wajib ikut latihan</li>
                    <li>Memakai seragam</li>
                </ul>
            </div>
        </div>

        <div class="cta-ekstra">
            <div>
                <small>DAFTAR SEKARANG</small>
                <h3>Mari Ikuti Kegiatan Ekstrakurikuler Sekolah</h3>
            </div>
            <div>
                <a href="#" class="btn-primary">Daftar</a>
                <a href="#" class="btn-outline">Pelajari</a>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let index = 0;
    const cards = document.querySelectorAll('.ekstra-card');
    const total = cards.length;

    function update() {
        cards.forEach((c,i)=>{
            c.className='ekstra-card';
            if(i===index) c.classList.add('active');
            else if(i===(index-1+total)%total) c.classList.add('left');
            else if(i===(index+1)%total) c.classList.add('right');
            else c.classList.add('hidden');
        });
    }
    window.nextCard=()=>{ index=(index+1)%total; update(); }
    window.prevCard=()=>{ index=(index-1+total)%total; update(); }
    update();
});
</script>

@endsection
