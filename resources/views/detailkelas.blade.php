<x-start>Detail Kelas</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div>
        @if (session('success'))
            <div x-data="{ open: true }">
                <div 
                                            x-show="open" 
                                            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50"
                                            x-cloak
                                        >
                                            <div 
                                            class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5" 
                                                @click.away="open = false"
                                                @keydown.escape.window="open = false"
                                            >
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl text-black font-semibold">Data Berhasil Dihapus</h2>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button type="button" @click="open = false" class="ml-2 text-black bg-gray-300 px-4 py-2 rounded">
                            OK
                        </button>
                    </div>
                </div>
                </div>
            </div> 
        @endif
        <h1 class="text-3xl text-black">Detail Kelas</h1>
        <div class="mb-3 flex flex-wrap mt-2">
            @auth
                @if (auth()->user()->role == 'kaprodi')
                <a class="" href="{{ route('tambah', ['kelas' => $kelas->id]) }}">
                    <button class="w-1/1 mb-3 bg-blue-500 text-white font-semibold mr-5 m-b py-1 px-4 rounded-md mt-5 shadow-lg hover:shadow-xl flex items-center justify-center">     
                    <i class="fas fa-plus mr-3"></i>
                        Tambah Mahasiswa/Dosen
                    </button>
                </a>
                @else
                @endif
            @endauth     
          </div>
        <table class="min-w-full table bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Role</th>
                    {{-- <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Status</th> --}}
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @empty($dosen)
                    @else
                        {{-- @foreach ($dosen as $d) --}}
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4">{{ $dosen->name}}</td>
                                <td class="w-1/3 text-left py-3 px-4">Dosen Wali</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500">
                                    <div x-data="{ open: false }" x-init="open = false">
                                        <button @click="open = true" class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded">
                                            <i class="fas fa-trash mr-2"></i>
                                            Hapus
                                        </button>
                                    
                                        <div 
                                            x-show="open" 
                                            class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                                            x-cloak
                                        >
                                            <div 
                                            class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5" 
                                                @click.away="open = false"
                                                @keydown.escape.window="open = false"
                                            >
                                                <!-- Modal Header -->
                                                <div class="flex justify-between items-center">
                                                    <h2 class="text-xl text-black font-semibold">Apakah anda yakin ingin menghapus data?</h2>
                                                    {{-- <button @click="open = false" class="text-gray-500 hover:text-gray-700">&times;</button> --}}
                                                </div>
                                    
                                                <form method="POST" action="{{ url('/hapusdsn/' . $dosen->user_id) }}">
                                                    @csrf
                                    
                                                    <div class="mt-8 flex justify-end">
                                                        <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded">
                                                            Hapus
                                                        </button>
                                                        <button type="button" @click="open = false" class="ml-2 text-black bg-gray-300 px-4 py-2 rounded">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                @endempty
                @empty($mhs)
                    @else
                        @foreach ($mhs as $m)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">{{ $m->name }}</td>
                            <td class="w-1/3 text-left py-3 px-4">Mahasiswa</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500">
                                <div x-data="{ open: false }" x-init="open = false">
                                    <button @click="open = true" class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded">
                                        <i class="fas fa-trash mr-2"></i>
                                        Hapus
                                    </button>
                                
                                    <div 
                                        x-show="open" 
                                        class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                                        x-cloak
                                    >
                                        <div 
                                        class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5" 
                                            @click.away="open = false"
                                            @keydown.escape.window="open = false"
                                        >
                                            <!-- Modal Header -->
                                            <div class="flex justify-between items-center">
                                                <h2 class="text-xl text-black font-semibold">Apakah anda yakin ingin menghapus data?</h2>
                                                {{-- <button @click="open = false" class="text-gray-500 hover:text-gray-700">&times;</button> --}}
                                            </div>
                                
                                            <form method="POST" action="{{ url('/hapusmhs/' . $m->user_id) }}">
                                                @csrf
                                
                                                <div class="mt-8 flex justify-end">
                                                    <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded">
                                                        Hapus
                                                    </button>
                                                    <button type="button" @click="open = false" class="ml-2 text-black bg-gray-300 px-4 py-2 rounded">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                        @endforeach
                @endempty
            </tbody>
        </table>
    </div>
    
</x-body>
<x-end></x-end>