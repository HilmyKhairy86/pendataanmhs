<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        <div class="w-1/2">
            <h1 class="text-black">Halo {{ auth()->user()->mahasiswa->name ?? auth()->user()->dosen->name ?? auth()->user()->username ?? auth()->user()->kaprodi->name}}</h1>
        
        </div>
        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <i class="fa-solid fa-user"></i>
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                {{-- <a href="profile" class="block px-4 py-2 account-link hover:text-white">Account</a> --}}
                <a href="{{ route('actionlogout') }}" class="block px-4 text-black py-2 account-link hover:text-white">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sign Out
                </a>
            </div>
        </div>
    </header>
    
    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Pendataan</a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>
        @auth
            @if (auth()->user()->role == 'kaprodi')
            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                    <div class="mx-2">
                        <i class="fa-solid fa-gauge"></i>
                    </div>
                    Dashboard</x-nav-link>
                <x-navlink href="{{ route('datakelas') }}" :active="request()->is('datakelas')">
                    <div class="mx-2">
                        <i class="fa-solid fa-table-columns"></i>
                    </div>
                    Data Kelas
                </x-navlink>
                <x-navlink href="{{ route('datadosen') }}" :active="request()->is('datadosen')">
                    <div class="mx-2">
                        <i class="fa-solid fa-table-columns"></i>
                    </div>
                    Data Dosen
                </x-navlink>
                <x-navlink href="{{ route('tambahmhs') }}" :active="request()->is('tambahmhs')">
                    <div class="mx-2">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    Data Mahasiswa
                </x-navlink>
                <x-navlink href="{{ route('actionlogout') }}">
                    <div class="mx-2">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    Sign Out
                </x-navlink>
            </nav>
            @elseif (auth()->user()->role == 'dosen_wali')
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <x-navlink href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                    <div class="mx-2">
                        <i class="fa-solid fa-gauge"></i>
                    </div>
                    Dashboard
                </x-navlink>
                <x-navlink href="{{ route('detail_kelas') }}" :active="request()->is('datakelas')">
                    <div class="mx-2">
                        <i class="fa-solid fa-table-columns"></i>
                    </div>
                    Data Kelas
                </x-navlink>
                <x-navlink href="{{ route('requestedit') }}" :active="request()->is('request')">
                    <div class="mx-2">
                        <i class="fa-solid fa-hand"></i>
                    </div>
                    Request Edit
                </x-navlink>
                <a href="{{ route('actionlogout') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <div class="mx-2">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    Sign Out
                </a>
            </nav>
            @elseif (auth()->user()->role == 'dosen')
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <x-navlink href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                        <div class="mx-2">
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                        Dashboard
                    </x-navlink>
                    
                    <a href="{{ route('actionlogout') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </a>
                </nav>
            @else
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
            
                <x-navlink href="dashboard" :active="request()->is('dashboard')">
                    <div class="mx-2">
                        <i class="fa-solid fa-gauge"></i>
                    </div>
                    Dashboard
                </x-navlink>
                <x-navlink href="profile" :active="request()->is('profile')">
                    <div class="mx-2">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    Data Mahasiswa
                </x-navlink>
                <x-navlink href="actionlogout">
                    <div class="mx-2">
                        <i class="fa-solid fa-sign-out"></i>
                    </div>
                    Sign Out
                </x-navlink>
            </nav>
        @endif
        @endauth
    </header>