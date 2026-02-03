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
.carousel-container {
    position: relative;
    max-width: 1200px;
    height: 420px;
    margin: 80px auto;
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

/* overlay */
.ekstra-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.8), rgba(0,0,0,.15));
}

/* teks */
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

.ekstra-info h4 {
    font-size: 24px;
    margin-bottom: 8px;
}

/* posisi */
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

/* hover halus */
.ekstra-card.active:hover {
    transform: scale(1.13) translateZ(70px);
    z-index: 15;
}


.ekstra-card.active .ekstra-info {
    opacity: 1;
    transform: translateY(0);
}


/* tombol */
.nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,.85);
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
    
    <button class="nav-btn left" onclick="prevCard()">&#10094;</button>

    <div class="carousel" id="carousel">
        @php
            $ekstra = [
                'Futsal','Basket','Voli','Karate','Pencak Silat',
                'Pramuka','PMR','Paskibra','Rohis','Musik','Tari'
            ];
        @endphp

        @foreach($ekstra as $i => $nama)
        <div class="ekstra-card {{ $i === 0 ? 'active' : ($i === 1 ? 'right' : 'hidden') }}">
            <img src="https://picsum.photos/400/600?random={{ $i }}">
            <div class="ekstra-info">
                <h4>{{ $nama }}</h4>
                <p>Ekstrakurikuler {{ $nama }} untuk mengembangkan potensi siswa.</p>
            </div>
        </div>
        @endforeach
    </div>

    <button class="nav-btn right" onclick="nextCard()">&#10095;</button>
</div>

<script>
let currentIndex = 0;
const cards = document.querySelectorAll('.ekstra-card');
const total = cards.length;

function updateCarousel() {
    cards.forEach((card, i) => {
        card.classList.remove('active','left','right','hidden');
        const diff = i - currentIndex;

        if (diff === 0) card.classList.add('active');
        else if (diff === -1 || (currentIndex === 0 && i === total-1)) card.classList.add('left');
        else if (diff === 1 || (currentIndex === total-1 && i === 0)) card.classList.add('right');
        else card.classList.add('hidden');
    });
}

function nextCard() {
    currentIndex = (currentIndex + 1) % total;
    updateCarousel();
}

function prevCard() {
    currentIndex = (currentIndex - 1 + total) % total;
    updateCarousel();
}
</script>

@endsection