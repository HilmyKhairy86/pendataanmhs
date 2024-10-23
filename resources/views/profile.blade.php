<x-start>Profile</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-2 pr-0 lg:pr-2">
            <h1 class="mx-5 text-xl font-bold pb-6 flex items-center">
                Profil Mahasiswa
            </h1>
            <div class="leading-loose">
                @if ($mhs->edit == 0)
                    @empty ($req)
                        <div class="my-2">
                            <label class="w-full py-5 text-black" for="name">NIM</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="nim" type="text" aria-label="Name" readonly value="{{ $mhs->nim }}">

                            <label class="w-full py-5 text-black" for="name">Nama</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="nim" type="text" aria-label="Name" readonly value="{{ $mhs->name }}">

                            <label class="w-full py-5 text-black" for="name">Tempat Lahir</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="nim" type="text" aria-label="Name" readonly value="{{ $mhs->tempat_lahir }}">

                            <label class="w-full py-5 text-black" for="name">Tanggal Lahir</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="nim" type="text" aria-label="Name" readonly value="{{ $mhs->tanggal_lahir }}">
                        </div>
                        <div x-data="{ open: false }">
                            @empty($mhs->kelas_id)
                            @else
                            <button @click="open = true" class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded">Request Edit</button>

                            <div 
                               x-show="open" 
                               class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50"
                               x-cloak
                            >
                               <div 
                                  class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full" 
                                  @click.away="open = false"
                                  @keydown.escape.window="open = false"
                               >
                                  <!-- Modal Header -->
                                  
                         
                                  <form method="POST" action="{{ route('sendrequest') }}">
                                     @csrf
                                     <div class="mt-4">
                                        <label for="name" class="block text-xl mb-2 font-medium text-black">Keterangan</label>
                                        {{-- <input type="text" id="name" name="keterangan" class="border rounded-lg w-full p-2 mt-1" required> --}}
                                        <div class="sm:col-span-2">
                                            <textarea id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Write a description..." name="keterangan" required></textarea>                    
                                        </div>
                                     </div>
                         
                                     <div class="mt-4 flex justify-end">
                                        <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded">
                                           Submit
                                        </button>
                                        <button type="button" @click="open = false" class="ml-2 bg-gray-300 px-4 py-2 rounded hover:bg-red-400 hover:text-white">
                                           Cancel
                                        </button>
                                     </div>
                                  </form>
                               </div>
                            </div>
                            @endempty
                        </div>
                         
                    @else
                        <div class="my-2">
                            <label class="w-full py-5 text-black" for="name">NIM</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="nim" type="text" aria-label="Name" readonly value="{{ $mhs->nim }}">

                            <label class="w-full py-5 text-black" for="name">Nama</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="nim" type="text" aria-label="Name" readonly value="{{ $mhs->name }}">

                            <label class="w-full py-5 text-black" for="name">Tempat Lahir</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="tlahir" type="text" aria-label="Name" readonly value="{{ $mhs->tempat_lahir }}">

                            <label class="w-full py-5 text-black" for="name">Tanggal Lahir</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" id="name" name="tgllahir" type="date" aria-label="Name" readonly value="{{ $mhs->tanggal_lahir }}">
                        </div>
                        <div x-data="{ open: false }">
                            <button @click="open = true" class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded">Request Edit</button>

                            <div 
                               x-show="open" 
                               class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50"
                               x-cloak
                            >
                               <div 
                                  class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full" 
                                  @click.away="open = false"
                                  @keydown.escape.window="open = false"
                               >
                                  <!-- Modal Header -->
                                  <div class="flex justify-between items-center">
                                     <h2 class="text-xl font-semibold">Anda Sudah mengirimkan request</h2>
                                     <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                                        <i class="fa-solid fa-x"></i>
                                     </button>
                                  </div>
                                    
                               </div>
                            </div>
                        </div>
                        @if (session('success'))
                            <p class="text-green-400">request berhasil dikirim</p>
                        @endif 
                    @endempty
                @else
                    <form class="p-5" action="{{ route('updateprofile') }}" method="POST">
                        @csrf
                        <div class="my-2">
                            <label class="w-full py-5 text-black" for="nim">NIM</label>
                            <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" name="nim" type="text" aria-label="Name" readonly value="{{ $mhs->nim }}">

                            <label class="w-full py-5 text-black" for="name">Nama</label>
                            <input class="w-full my-2 px-5 py-1 text-black bg-gray-200 rounded" name="name" type="text" aria-label="Name"  value="{{ $mhs->name }}">

                            <label class="w-full py-5 text-black" for="lahir">Tempat Lahir</label>
                            <input class="w-full my-2 px-5 py-1 text-black bg-gray-200 rounded" name="tlahir" type="text" aria-label="Name"  value="{{ $mhs->tempat_lahir }}">

                            <label class="w-full py-5 text-black" for="tgllahir">Tanggal Lahir</label>
                            <input class="w-full my-2 px-5 py-1 text-black bg-gray-200 rounded" name="tgllahir" type="date" aria-label="Name"  value="{{ $mhs->tanggal_lahir }}">
                        </div>
                        <div class="mt-6">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Update</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-body>
<x-end></x-end>