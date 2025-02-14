@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.ruangan.index') }}">
            <img src="/icons/icon_arrow_back.svg" class="w-8">
        </a>
        <div class="uppercase">
            BUAT RUANGAN BARU
        </div>
    </div>
@endsection
@section('main-content')
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="flex flex-col">
            <label for="room_name" class="font-bold text-slate-700 mb-2.5">Nama Ruangan *</label>
            <input type="text" id="room_name" name="room_name" placeholder="Masukan nama ruangan"
                class="p-3 border border-black text-base rounded-md mb-5">

            <label for="major_name" class="font-bold text-slate-700 mb-2.5">Nama Program Studi *</label>
            <input type="text" id="major_name" name="major_name" placeholder="Masukan nama program studi"
                class="p-3 border border-black text-base rounded-md mb-5">

            <label for="faculty_name" class="font-bold text-slate-700 mb-2.5">Nama Fakultas *</label>
            <select name="faculty_name" id="faculty_name" class="p-3 border border-black text-base rounded-md mb-5">
                <option disabled selected>
                    Pilih Fakultas
                </option>
                <option value="FMIPA">
                    FMIPA
                </option>
                <option value="FT">
                    FT
                </option>
                <option value="FK">
                    FK
                </option>
                <option value="FP">
                    FP
                </option>
                <option value="FKH">
                    FKH
                </option>
            </select>
            <label for="status" class="font-bold text-slate-700 mb-2.5">Status Ruangan *</label>
            <input type="text" id="status" name="status" class="p-3 border border-black text-base rounded-md">
            
            <input type="hidden" name="total_materials" value="0">
            <input type="hidden" name="total_tools" value="0">
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
        </div>
    </form>
@endsection
