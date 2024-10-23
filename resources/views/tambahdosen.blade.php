<x-start>Tambah Dosen</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl text-black pb-6 flex items-center">
                Tambah Dosen
            </p>
            <div class="leading-loose">
                <form class=""action="{{ route('tambahdosen') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="username">Username</label>
                        <input class="w-full px-5 py-1 text-gray-700 mb-3 bg-gray-200 rounded" id="username" name="username" type="text" required="" placeholder="username" aria-label="Name">
                        @if (session('username'))
                            <p class="mb-3 text-red-500">Username is already Exists!</p>
                        @endif

                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-5 py-1 text-gray-700 mb-3 bg-gray-200 rounded" id="nip" name="email" type="email" required="" placeholder="Email" aria-label="Name">
                        @if (session('email'))
                            <p class="mb-3 text-red-500">Email is already Exists!</p>
                        @endif

                        <label class="block text-sm text-gray-600" for="nip">NIP</label>
                        <input class="w-full px-5 py-1 text-gray-700 mb-3 bg-gray-200 rounded" id="nip" name="nip" type="text" required="" placeholder="NIP" aria-label="Name">
                        
                        <label class="block text-sm text-gray-600" for="name">Nama</label>
                        <input class="w-full px-5 py-1 text-gray-700 mb-3 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nama" aria-label="Name">

                        <label class="block text-sm text-gray-600" for="name">Password</label>
                        <input class="w-full px-5 py-1 text-gray-700 mb-3 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="Password" aria-label="Name">
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</x-body>
<x-end></x-end>