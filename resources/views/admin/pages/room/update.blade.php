@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.ruangan.index') }}">
            <img src="/icons/icon_arrow_back.svg" class="w-8">
        </a>
        <div class="uppercase">
            PERBARUI {{ $room->room_name }}
        </div>
    </div>
@endsection
@section('main-content')
<form action="{{ route('rooms.update', ['room' => $room->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="flex flex-col">
        <label for="room_name" class="font-bold text-slate-700 mb-2.5">Nama Ruangan *</label>
        <input type="text" id="room_name" name="room_name" value="{{ $room->room_name }}" class="p-3 border border-black text-base rounded-md mb-5">

        <label for="major_name" class="font-bold text-slate-700 mb-2.5">Nama Program Studi *</label>
        <input type="text" id="major_name" name="major_name" value="{{ $room->major_name }}" class="p-3 border border-black text-base rounded-md mb-5">

        <label for="faculty_name" class="font-bold text-slate-700 mb-2.5">Nama Fakultas *</label>
        <select name="faculty_name" id="faculty_name" class="p-3 border border-black text-base rounded-md mb-5">
            <option value="{{ $room->faculty_name }}" selected>
                Fakultas Saat Ini: {{ $room->faculty_name }}
            </option>
            <option value="FMIPA">FMIPA</option>
            <option value="FT">FT</option>
            <option value="FK">FK</option>
            <option value="FP">FP</option>
            <option value="FKH">FKH</option>
        </select>        

        <label for="status" class="font-bold text-slate-700 mb-2.5">Status Ruangan *</label>
        <input type="text" id="status" name="status" value="{{ $room->status }}" class="p-3 border border-black text-base rounded-md">
    </div>
    <div class="flex justify-end">
        <button type="submit" class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">
            SIMPAN
        </button>
    </div>
</form>

@endsection
