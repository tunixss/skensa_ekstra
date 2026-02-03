<!-- Navbar -->
<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 lg:px-6">
        <div class="flex items-center justify-between h-16">

            <!-- Brand -->
            <a href="#" class="flex items-center gap-2">
                <img src="{{ asset('assets/LOGO.png') }}"
                     alt="Logo"
                     class="h-9 w-auto">
                <div class="flex flex-col leading-tight">
                    <span class="font-bold text-[16px] lg:text-[18px] text-gray-900">
                        SIEKSTRA
                    </span>
                    <span class="text-[11px] lg:text-[12px] text-gray-500">
                        Sistem Ekstrakurikuler
                    </span>
                </div>
            </a>

            <!-- Hamburger (Mobile) -->
            <button id="menuBtn"
                class="lg:hidden inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-100 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Menu Desktop -->
            <ul class="hidden lg:flex items-center gap-8 font-medium">
                <li><a href="/" class="text-gray-700 hover:text-blue-600 transition">Beranda</a></li>
                <li><a href="/ekstra" class="text-gray-700 hover:text-blue-600 transition">Ekskul</a></li>
                <li><a href="/berita" class="text-gray-700 hover:text-blue-600 transition">Berita</a></li>
                <li><a href="/prestasi" class="text-gray-700 hover:text-blue-600 transition">Prestasi</a></li>
                <li><a href="/tentang" class="text-gray-700 hover:text-blue-600 transition">Tentang</a></li>
            </ul>

            <!-- Button Desktop -->
            <div class="hidden lg:block">
                <a href="#daftar"
                   class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                    Daftar
                </a>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobileMenu" class="hidden lg:hidden pb-4">
            <ul class="flex flex-col gap-3 text-center font-medium">
                <li><a href="/" class="block py-2 text-gray-700 hover:text-blue-600">Beranda</a></li>
                <li><a href="#eskul" class="block py-2 text-gray-700 hover:text-blue-600">Ekskul</a></li>
                <li><a href="/berita" class="block py-2 text-gray-700 hover:text-blue-600">Berita</a></li>
                <li><a href="/prestasi" class="block py-2 text-gray-700 hover:text-blue-600">Prestasi</a></li>
                <li><a href="/tentang" class="block py-2 text-gray-700 hover:text-blue-600">Tentang</a></li>

                <li class="mt-3">
                    <a href="#daftar"
                       class="block bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                        Daftar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Toggle Script -->
<script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
