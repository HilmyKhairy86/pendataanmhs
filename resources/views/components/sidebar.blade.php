<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
  <div class="p-6">
      <a href="{{ route('dashboard') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Pendataan</a>
  </div>
  <nav class="text-white text-base font-semibold pt-3">
        @auth
            @if (auth()->user()->role == 'kaprodi')
                <x-navlink href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                    <div class="mx-2">
                        <i class="fa-solid fa-gauge"></i>
                    </div>
                    Dashboard
                </x-navlink>
                <x-navlink href="{{ route('datakelas') }}" :active="request()->is('datakelas', 'detailkelas','addkelas',)">
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
                <x-navlink href="{{ route('datamhs') }}" :active="request()->is('datamhs')">
                    <div class="mx-2">
                        <i class="fa-solid fa-table-columns"></i>
                    </div>
                    Data Mahasiswa
                </x-navlink>
            @elseif (auth()->user()->role == 'dosen_wali')
                <x-navlink href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                    <div class="mx-2">
                        <i class="fa-solid fa-gauge"></i>
                    </div>
                    Dashboard
                </x-navlink>
                <x-navlink href="{{ route('detail_kelas') }}" :active="request()->is('detail_kelas')">
                    <div class="mx-2">
                        <i class="fa-solid fa-table-columns"></i>
                    </div>
                    Data Kelas
                </x-navlink>
                <x-navlink href="{{ route('requestedit') }}" :active="request()->is('requestedit')">
                    <div class="mx-2">
                        <i class="fa-solid fa-hand"></i>
                    </div>
                    Request Edit
                </x-navlink>
            @elseif (auth()->user()->role == 'dosen')
                <x-navlink href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                    <div class="mx-2">

                    </div>
                    Dashboard
                </x-navlink>
                
            @else
                <x-navlink href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                    <div class="mx-2">

                    </div>
                    Dashboard
                </x-navlink>
                <x-navlink href="{{ route('profile') }}" :active="request()->is('profile')">
                    <div class="mx-2">

                    </div>
                    Profil
                </x-navlink>
            @endif
        @endauth
  </nav>
</aside>