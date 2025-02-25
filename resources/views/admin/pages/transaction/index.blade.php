@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <div>
            DAFTAR PEMINJAMAN ({{ $faculty }})
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
    <div>
        @foreach ($transactions as $trans)
            <div class="w-full h-fit flex justify-between items-center bg-[#343C53] rounded-xl p-4 text-white mb-4">
                <p class="text-xl">
                    {{ $trans->user->name }}
                    <br>
                    {{ $trans->user->phone }}
                </p>
                <div class="flex gap-4 text-lg">
                    <p class="w-44">
                        Tanggal Meminjam: {{ $trans->borrow_date }}
                    </p>
                    <p class="w-44">
                        Harus Dikembalikan: {{ $trans->return_date }}
                    </p>
                </div>
                <form action="{{ route('transactions.updateStatus', $trans->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" onchange="this.form.submit()" class="bg-yellow-300 px-2 py-2 rounded-xl text-[#343C53] text-xl hover:opacity-80">
                        <option disabled selected>Status: {{ $trans->status }}</option>
                        <option value="ditolak" {{ $trans->status === 'ditolak' ? 'disabled' : '' }}>ditolak</option>
                        <option value="berlangsung" {{ $trans->status === 'berlangsung' ? 'disabled' : '' }}>berlangsung</option>
                        <option value="dikembalikan" {{ $trans->status === 'dikembalikan' ? 'disabled' : '' }}>dikembalikan</option>
                        <option value="selesai" {{ $trans->status === 'selesai' ? 'disabled' : '' }}>selesai</option>
                    </select>
                </form>
                <p class="bg-white px-4 py-2 rounded-xl text-[#343C53] text-xl">
                    Ruangan: {{ $trans->room->room_name }}
                </p>
                <a href="{{ route('laporan.trans', $trans->id) }}"
                    class="w-[224px] h-full flex justify-between items-center px-4 py-2 bg-[#f25e5e] text-white text-xl font-bold rounded-xl shadow-xl cursor-pointer hover:opacity-80">
                    <span>
                        Download Nota
                    </span>
                    <img class="w-8 h-8" src="/assets/img/Bidownload.png" alt="">
                </a>
            </div>
        @endforeach
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
