<x-start>Edit Dosen</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                Edit Dosen
            </p>
            <div class="leading-loose">
                <form class="" action="{{ route('changedosen') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        
                        <label class="block text-sm text-gray-600" for="name">Kode Dosen</label>
                        <input class="w-full px-5 py-1 text-gray-700 mb-3 bg-gray-200 rounded" id="name" name="kode_dosen" type="text" required=""  aria-label="Name" value="{{ $dosen->kode_dosen }}" readonly>

                        <label class="block text-sm text-gray-600" for="name">Nama</label>
                        <input class="w-full px-5 py-1 text-gray-700 mb-3 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nama" aria-label="Name" value="{{ $dosen->name }}">

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