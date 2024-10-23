<x-start>Tambah Mahasiswa</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl text-black pb-6 flex items-center">
                Tambah Mahasiswa/Dosen
            </p>
            <div class="leading-loose">
                <form class="" action="{{ route('tambahkelas') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="name">NIM / NIP</label>
                        <input class=" w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="nim" type="text" required="" placeholder="NIM / NIP" aria-label="Name">
                        <input type="text" name="kelas_id" value="{{ $kelas->id }}" hidden>
                        @if (session('error'))
                        <div class="text-red-500">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if (session('success'))
                            <div class="">
                                {{ session('success') }}
                            </div>
                        @endif
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