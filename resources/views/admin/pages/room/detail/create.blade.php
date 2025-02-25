@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.ruangan.detail.room', ['room' => $room->id]) }}">
            <img src="/icons/icon_arrow_back.svg" class="w-8">
        </a>
        <div class="uppercase">
            Mengisi {{ $type }} pada {{ $room->room_name }}
        </div>
    </div>
@endsection
@section('main-content')
    @if (session('success'))
        <div id="success-message" class="w-full flex items-center justify-center mb-4">
            <div class="w-full p-2 rounded-xl shadow-md bg-green-200">
                <div class="bg-green-200 text-xl font-bold text-green-700 p-4 rounded">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    @if ($type == 'material')
        <form action="{{ route('room_details.store') }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <label for="material_id" class="font-bold text-slate-700 mb-2.5">Nama Barang *</label>
                <select name="material_id" id="material_id" class="p-3 border border-black text-base rounded-md mb-5">
                    <option disabled selected>
                        Pilih Nama Barang
                    </option>
                    @foreach ($materials as $item)
                        @if ($item->id != 0)
                            <option value="{{ $item->id }}">
                                {{{ $item->material_name }}}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="total_stocks" class="font-bold text-slate-700 mb-2.5">Total Stok *</label>
                <input type="number" id="total_stocks" name="total_stocks" placeholder="Masukan total jumlah stok"
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="current_stocks" class="font-bold text-slate-700 mb-2.5">Stok Saat Ini *</label>
                <input type="number" id="current_stocks" name="current_stocks" placeholder="Masukan jumlah stok saat ini"
                    class="p-3 border border-black text-base rounded-md mb-5">

                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <input type="hidden" name="tool_id" value="0">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
            </div>
        </form>
    @else
        <form action="{{ route('room_details.store') }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <label for="tool_id" class="font-bold text-slate-700 mb-2.5">Nama Barang *</label>
                <select name="tool_id" id="tool_id" class="p-3 border border-black text-base rounded-md mb-5">
                    <option disabled selected>
                        Pilih Nama Barang
                    </option>
                    @foreach ($tools as $item)
                        @if ($item->id != 0)
                            <option value="{{ $item->id }}">
                                {{{ $item->tool_name }}}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="total_stocks" class="font-bold text-slate-700 mb-2.5">Total Stok *</label>
                <input type="number" id="total_stocks" name="total_stocks" placeholder="Masukan total jumlah stok"
                    class="p-3 border border-black text-base rounded-md mb-5">

                <label for="current_stocks" class="font-bold text-slate-700 mb-2.5">Stok Saat Ini *</label>
                <input type="number" id="current_stocks" name="current_stocks" placeholder="Masukan jumlah stok saat ini"
                    class="p-3 border border-black text-base rounded-md mb-5">

                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <input type="hidden" name="material_id" value="0">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
            </div>
        </form>
    @endif
@endsection
<script>
    setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.top = '-200px';
            }

            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000);
</script>