<x-start>Detail Kelas</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div class="">
        <h1 class="text-3xl text-black">Detail Kelas</h1>
        <div class="mb-3 flex flex-wrap mt-2">
            @auth
                @if (auth()->user()->role == 'kaprodi')
                <a class="hover:text-blue-500"" href="{{ route('tambah', ['kelas' => $kelas->id]) }}">
                    <button class="w-1/1 cta-btn mb-3 bg-white font-semibold mr-5 m-b p-4 rounded-xl mt-5 shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">     
                    <i class="fas fa-plus mr-3"></i>
                        Tambah Mahasiswa/Dosen
                    </button>
                </a>
                @else
                @endif
            @endauth     
        </div>
        <div class="">
            <table class="min-w-full table bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                        <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Opsi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 ">
                    
                    @empty($mhs)
                        @else
                            @foreach ($mhs as $m)
                            <tr>
                                <td class="w-1/2 text-left py-3 px-4">{{ $m->name }}</td>
                                <td class="w-1/4 text-left py-3 px-4">
                                    <a class="hover:text-blue-red" href="{{ url('/editmhs/' . $m->user_id) }}">
                                        <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded">
                                          <i class="fas fa-edit mr-2"></i>
                                          Ubah
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
    
</x-body>
<x-end></x-end>