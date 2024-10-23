<x-start></x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <h1 class="text-3xl text-black pb-6">Data Mahasiswa</h1>
    <a class="hover:text-white" href="{{ route('tambahmhs') }}">
        <button class="w-1/1 mb-3 bg-blue-500 text-white font-semibold mr-5 m-b py-1 px-4 rounded-md mt-5 shadow-lg hover:shadow-xl flex items-center justify-center">     
        <i class="fas fa-plus mr-3"></i>
        Tambah Mahasiswa
        </button>
    </a>
    @if (session('message'))
      <div 
          x-data="{ show: true }"
          x-init="setTimeout(() => show = false, 3000)" 
          x-show="show" 
          class="bg-green-500 text-white px-4 py-3 rounded-lg mb-4"
          role="alert"
      >
          <div class="flex justify-between items-center">
              <span>{{ session('message') }}</span>
              <button @click="show = false" class="text-white font-bold">&times;</button>
          </div>
      </div>
    @endif
    <div class="overflow-x-auto">     
        <table class="w-full table bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">NIM</th>
                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($mhs as $m)
                <tr>
                    <td class="w-auto text-left py-3 px-4">{{ $m->name }}</td>
                    <td class="w-auto text-left py-3 px-4">{{ $m->nim }}</td>
                    <td class="w-auto text-left py-3 px-4">
                        @empty($m->kelas->name)
                        @else
                        {{ $m->kelas->name }}   
    
                        @endempty
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-body>
<x-end></x-end>