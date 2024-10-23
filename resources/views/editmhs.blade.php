<x-start></x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-1 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                Edit Kelas
            </p>
            <div class="leading-loose">
                <form class="" action="{{ route('updatemhs') }}" method="POST">
                    @csrf
                    <div class="my-2">
                        <input readonly hidden name="user_id" value="{{ $mhs->user_id }}">
                        <label class="w-full py-5 text-black" for="nim">NIM</label>
                        <input class="w-full my-2 px-5 py-1 text-gray-400 bg-gray-200 rounded" name="nim" type="text" aria-label="Name" value="{{ $mhs->nim }}">
    
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
            </div>
        </div>
    </div>
</x-body>
<x-end></x-end>