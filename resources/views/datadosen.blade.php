<x-start>Data Dosen</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    @if (session('success'))
        <div x-data="{ open: true }" x-init="open = true">
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
                        <h2 class="text-xl text-black font-semibold">Hapus Data Berhasil</h2>
                        {{-- <button @click="open = false" class="text-gray-500 hover:text-gray-700">&times;</button> --}}
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button type="button" @click="open = false" class="ml-2 text-black bg-gray-300 px-4 py-2 rounded">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <h1 class="text-3xl text-black pb-6">Data Dosen</h1>
    <a class="hover:text-white" href="{{ route('tambahdosen') }}">
        <button class="w-1/1 mb-3 bg-blue-500 text-white font-semibold mr-5 m-b py-1 px-4 rounded-md mt-5 shadow-lg hover:shadow-xl flex items-center justify-center">     
        <i class="fas fa-plus mr-3"></i>
        Tambah Dosen
        </button>
    </a>
    <div class="overflow-x-auto">     
        <table class="w-full table bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Kode Dosen</th>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">NIP</th>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">opsi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($dosen as $d)
                <tr>
                    <td class="w-auto text-left py-3 px-4">{{ $d->kode_dosen }}</td>
                    <td class="w-auto text-left py-3 px-4">{{ $d->name }}</td>
                    <td class="w-auto text-left py-3 px-4">
                        @empty($d->kelas->name)
                        @else
                        {{ $d->kelas->name }}   
    
                        @endempty
                        {{-- {{ $d->kelas->name }} --}}
                    </td>
                    <td class="w-auto text-left py-3 px-4">{{ $d->nip }}</td>
                    <td class="w-auto text-left py-3 px-4">
                        <div class="flex flex-col md:flex-row items-center justify-center">
                            
                            <a class="hover:text-blue-red m-3" href="editdosen/{{ $d->user_id }}">
                                <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded">
                                    <i class="fas fa-edit mr-2"></i>
                                    Ubah
                                </button>
                            </a>
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
                            
                                        <form method="POST" action="{{ url('/hapusdosen/' . $d->user_id) }}">
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
                        </div>
                    </td>
    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</x-body>
<x-end></x-end>