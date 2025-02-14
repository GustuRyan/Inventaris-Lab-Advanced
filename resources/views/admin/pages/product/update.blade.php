@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.alat-bahan.index') }}">
            <img src="/icons/icon_arrow_back.svg" class="w-8">
        </a>
        <div class="uppercase">
            PERBARUI {{ $filter }}
        </div>
    </div>
@endsection
@section('main-content')
    @if ($filter == 'material')
        <form action="{{ route('materials.update', [$data->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                <label for="material_name" class="font-bold text-slate-700 mb-2.5">Nama Barang *</label>
                <input type="text" id="material_name" name="material_name" value={{ $data->material_name }}
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="character" class="font-bold text-slate-700 mb-2.5">Karakteristik *</label>
                <input type="text" id="character" name="character" value={{ $data->character }}
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="condition" class="font-bold text-slate-700 mb-2.5">Kondisi Barang *</label>
                <input type="text" id="condition" name="condition" value={{ $data->condition }}
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="tanggal_masuk" class="font-bold text-slate-700 mb-2.5">Tanggal
                    Masuk *</label>
                <input type="date" id="tanggal_masuk" name="in_date" value={{ $data->in_date }}
                    class="p-3 border border-black text-base rounded-md">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
            </div>
        </form>
    @else
        <form action="{{ route('tools.update', [$data->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                <label for="tool_name" class="font-bold text-slate-700 mb-2.5">Nama Barang *</label>
                <input type="text" id="tool_name" name="tool_name" value={{ $data->tool_name }}
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="merk" class="font-bold text-slate-700 mb-2.5">Nama Merk *</label>
                <input type="text" id="merk" name="merk" value={{ $data->merk }}
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="condition" class="font-bold text-slate-700 mb-2.5">Kondisi Barang *</label>
                <input type="text" id="condition" name="condition" value={{ $data->condition }}
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="tanggal_masuk" class="font-bold text-slate-700 mb-2.5">Tanggal
                    Masuk *</label>
                <input type="date" id="tanggal_masuk" name="in_date" value={{ $data->in_date }}
                    class="p-3 border border-black text-base rounded-md">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
            </div>
        </form>
    @endif
@endsection