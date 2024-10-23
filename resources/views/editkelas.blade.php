<x-start>Edit Kelas</x-start>
<x-sidebar></x-sidebar>
<x-navbar></x-navbar>
<x-body>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-1 pr-0 lg:pr-2">
            <p class="text-xl text-black pb-6 flex items-center">
                Edit Kelas
            </p>
            <div class="leading-loose">
                <form class="" action="{{ route('changekelas') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <input name="id" type="text" required hidden value="{{ $kelas->id }}">
                        <label class="block mb-1 text-sm text-gray-600" for="name">Nama Kelas</label>
                        <input class="w-full mb-5 px-5 py-1 text-gray-700 bg-gray-200 rounded" name="name" type="text" required value="{{ $kelas->name }}">
                        <label class="block mb-1 text-sm text-gray-600" for="name">Jumlah</label>
                        <input class="w-full mb-5 px-5 py-1 text-gray-700 bg-gray-200 rounded" name="jumlah" type="text" required value="{{ $kelas->jumlah }}">
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