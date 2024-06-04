<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="max-w-sm mx-auto" method="POST" action="{{ url('/product/' . $product->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label for="kode"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode</label>
                            <input type="text" id="kode" name="kode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan nama barang" value="{{ old('kode', $product->kode) }}" required />
                            @if ($errors->has('kode'))
                                <span class="text-red-700">{{ $errors->first('kode') }}</span>
                            @endif
                        </div>
                        <div class="mb-5">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan nama barang" value="{{ old('nama', $product->nama) }}" required />
                            @if ($errors->has('nama'))
                                <span class="text-red-700">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                        <div class="mb-5">
                            <label for="kategori"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih kategori
                                barang</label>
                            <select id="kategori" name="kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Categori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->kode }}"
                                        {{ old('kategori', $product->kd_kategori) === $item->kode ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('kategori'))
                                <span class="text-red-700">{{ $errors->first('kategori') }}</span>
                            @endif
                        </div>
                        <div class="mb-5">
                            <label for="satuan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih satuan
                                barang</label>
                            <select id="satuan" name="satuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Satuan</option>
                                @foreach ($unit as $item)
                                    <option value="{{ $item->kode }}"
                                        {{ old('satuan', $product->kd_satuan) === $item->kode ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('satuan'))
                                <span class="text-red-700">{{ $errors->first('satuan') }}</span>
                            @endif
                        </div>
                        <div class="mb-5">
                            <label for="jumlah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan jumlah barang" value="{{ old('jumlah', $product->jumlah) }}"
                                required />
                            @if ($errors->has('jumlah'))
                                <span class="text-red-700">{{ $errors->first('jumlah') }}</span>
                            @endif
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                            Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
