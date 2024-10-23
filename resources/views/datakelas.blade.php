<x-start>Data Kelas</x-start>
<x-sidebar></x-sidebar>
<x-navbar>
    
</x-navbar>
<x-body>
  <h1 class="text-3xl text-black pb-6">Data Kelas</h1>
  <a class="" href="{{ route('addkelas') }}">
    <button class="w-1/1 mb-3 bg-blue-500 text-white font-semibold mr-5 m-b py-1 px-4 rounded-md mt-5 shadow-lg hover:shadow-xl flex items-center justify-center">     
      <i class="fas fa-plus mr-3"></i>
      Tambah Kelas
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
      <table class="min-w-full table bg-white">
          <thead class="bg-gray-800 text-white">
              <tr>
                  <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama Kelas</th>
                  <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Jumlah</th>
                  <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Opsi</th>
              </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach ($kelas as $k)
              <tr>
                  <td class="text-sm md:text-base py-3 px-4">{{ $k->name }}</td>
                  <td class=" text-left py-3 px-4">
                    {{ $k->mahasiswa_count }} /
                    {{ $k->jumlah }}
                  </td>
                  <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="">
                    <div class="flex flex-col md:flex-row items-center justify-center">

                      <a class="hover:text-blue-500 py-3 m-3" href="detailkelas/{{ $k->id }}">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded">
                          <i class="fa-solid fa-bars"></i>
                          Detail
                        </button>
                      </a>
                    
                      <a class="hover:text-blue-red py-3 m-3" href="editkelas/{{$k->id}}">
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
                    
                                <form method="POST" action="{{ url('/hapuskelas/' . $k->id) }}">
                                    @csrf
                    
                                    <div class=" flex justify-end">
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