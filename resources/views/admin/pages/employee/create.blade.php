@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.pegawai.index') }}">
            <img src="/icons/icon_arrow_back.svg" class="w-8">
        </a>
        <div class="uppercase">
            PEGAWAI BARU
        </div>
    </div>
@endsection
@section('main-content')
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="flex flex-col">
            <label for="employee_name" class="font-bold text-slate-700 mb-2.5">Nama Pegawai *</label>
            <input type="text" id="employee_name" name="employee_name" placeholder="Masukan nama pegawai"
                class="p-3 border border-black text-base rounded-md mb-5">

            <label for="nip" class="font-bold text-slate-700 mb-2.5">NIP *</label>
            <input type="text" id="nip" name="nip" placeholder="Masukan NIP"
                class="p-3 border border-black text-base rounded-md mb-5">

            <label for="room" class="font-bold text-slate-700 mb-2.5">Nama Ruangan *</label>
            <select name="room_id" id="room_id" class="p-3 border border-black text-base rounded-md mb-5">
                <option disabled selected>
                    Pilih Ruangan
                </option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">
                        {{ $room->room_name }}
                    </option>
                @endforeach
            </select>
            
            <label for="user" class="font-bold text-slate-700 mb-2.5">Pengguna *</label>
            <select name="user_id" id="user_id" class="p-3 border border-black text-base rounded-md mb-5">
                <option disabled selected>
                    Pilih Username Pengguna
                </option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->username }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
        </div>
    </form>
@endsection