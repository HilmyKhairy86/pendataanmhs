<x-start>Request Edit</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div>
        <h1 class="text-3xl text-black">Request Edit</h1>
        <div class="mb-3 flex flex-wrap mt-2">  
          </div>
        <table class="min-w-full mx-auto table bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Keterangan</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @empty($mhs)
                    @else
                        @foreach ($mhs as $m)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">{{ $m->name }}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{ $m->keterangan }}</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500">
                                <div>
                                    <form action="{{ route('requestapprove') }}" method="POST" onsubmit="confirmSubmit(event)">
                                        @csrf
                                        {{-- <label for="deletekelas" class="text-red-500"></label> --}}
                                        <input type="text" name="user_id" value="{{ $m->user_id }}" hidden readonly required>
                                        <button type="submit" class="px-4 py-1 hover:bg-blue-400 text-white font-light tracking-wider bg-gray-900 rounded mb-3">
                                            <i class="fas fa-check mr-2"></i>
                                            Konfirmasi
                                        </button>
                                    </form>
                                    <div>
                                        <form action="{{ url('/requestedit/' . $m->user_id) }}" method="POST" onsubmit="confirmSubmit(event)">
                                            @csrf
                                            {{-- <input type="text" name="user_id" value="{{ $m->user_id }}" hidden readonly required> --}}
                                            <label class="text-red-500"></label>
                                            <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded">
                                                <i class="fas fa-trash mr-2"></i>
                                                Hapus
                                            </button>
                                        </form>
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