@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <div>
            RUANGAN LABORATORIUM
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
    <div class="flex justify-between items-center w-full p-2 mb-4 bg-slate-100 rounded-xl">
        <h2 class="text-2xl font-bold text-bold-blue leading-none">
            Daftar Ruangan
        </h2>
        <a href="{{ route('admin.ruangan.create') }}"
            class="p-3 font-bold text-white bg-primary-green rounded-lg hover:bg-green-500">
            Tambah Baru
        </a>
    </div>
    <div class="space-y-5 w-full text-lg">
        <table class="w-full border rounded-xl">
            <thead>
                <tr align="center" class="text-[#515769]">
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Nama Program Studi</th>
                    <th>Nama Fakultas</th>
                    <th>Jumlah Material</th>
                    <th>Jumlah Peralatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $index => $room)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>{{ $room->major_name }}</td>
                        <td>{{ $room->faculty_name }}</td>
                        <td>{{ $room->total_materials }}</td>
                        <td>{{ $room->total_tools }}</td>
                        <td align="center">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.ruangan.detail.room', ['room' => $room->id]) }}"
                                    class="w-fit h-12 py-1 px-2 bg-blue-900 rounded-lg text-white flex justify-between items-center gap-2 hover:opacity-85">
                                    <img src="/icons/icon_detail.svg" alt="" class="w-5 h-5">
                                    Detail
                                </a>
                                <a href="{{ route('admin.ruangan.update', ['room' => $room->id]) }}"
                                    class="w-fit h-12 py-1 px-2 bg-[#F7C443] rounded-lg text-white flex justify-between items-center gap-2 hover:opacity-85">
                                    <img src="/icons/icon_edit.svg" alt="" class="w-5 h-5">
                                    Edit
                                </a>
                                <form action="{{ route('rooms.destroy', ['id' => $room->id]) }}" method="POST"
                                    class="w-fit h-12 py-1 px-2 bg-bold-red rounded-lg text-white flex justify-between items-center gap-2 hover:opacity-85">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="h-10 rounded-full bg-bold-red flex justify-center items-center px-1 gap-2">
                                        <img src="/icons/icon_delete.svg" alt="" class="w-5 h-5">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
