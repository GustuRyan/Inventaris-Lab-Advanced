@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <div>
            DAFTAR BARANG
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
            Daftar Material
        </h2>
        <a href="{{ route('admin.alat-bahan.create', ['type' => 'material']) }}"
            class="p-3 font-bold text-white bg-primary-green rounded-lg hover:bg-green-500">
            Tambah Baru
        </a>
    </div>
    <div class="grid grid-cols-4 gap-4 mb-20">
        @foreach ($materials as $detail)
            <livewire:card-admin :detail="$detail" :filter="'material'" />
        @endforeach
        <div class="col-span-4">
            @include('vendor.material_pagination')
        </div>
    </div>
    <div class="flex justify-between items-center w-full p-2 mb-4 bg-slate-100 rounded-xl">
        <h2 class="text-2xl font-bold text-bold-blue leading-none">
            Daftar Peralatan
        </h2>
        <a href="{{ route('admin.alat-bahan.create', ['type' => 'peralatan']) }}"
            class="p-3 font-bold text-white bg-primary-green rounded-lg hover:bg-green-500">
            Tambah Baru
        </a>
    </div>
    <div class="grid grid-cols-4 gap-4 mb-20">
        @foreach ($tools as $detail)
            <livewire:card-admin :detail="$detail" :filter="'tool'" />
        @endforeach
        <div class="col-span-4">
            @include('vendor.tool_pagination')
        </div>
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