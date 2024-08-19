@extends('user.layouts.dashboard')
@section('page')
    Peminjaman
@endsection
@section('contents')
    <div x-data="{ open: false }">
        <h1 class="font-bold text-2xl">
            <div class="relative flex flex-col py-20 bg-white">
                <div class="p-20 max-md:p-5">
                    <div class="bg-red-400 text-white p-5 mb-5 rounded-lg flex items-center justify-between">
                        <div class="flex">
                            <div class="h-[40px] w-[40px] rounded-lg bg-slate-700"></div>
                            <h1 class="px-4 py-2 text-2x1 font-bold text-white ml-4">Peminjaman</h1>
                        </div>
                        <button x-on:click="open = !open" class="px-4 py-2 bg-white rounded-xl text-[#F25E5E]">Lihat
                            Riwayat</button>
                    </div>
                    @if ($transactions != null)
                        <section x-show="open" @click.away="open = false" x-cloak
                            class="bg-white rounded-xl border-2 shadow-lg w-full h-screen flex p-4 mb-8 overflow-y-scroll scrollbar-hide">
                            <div class="flex flex-col overflow-y-scroll w-full h-full scrollbar-hide gap-4">
                                <span class="bg-white pb-4 sticky top-0">
                                    Riwayat Transaksi
                                </span>
                                @foreach ($transactions as $trans)
                                    <card class="flex flex-col gap-4 border-2 rounded-xl p-4">
                                        <div
                                            class="w-full h-fit flex justify-between items-center bg-[#343C53] rounded-xl p-4 text-white">
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
                                            <p class="bg-white px-4 py-2 rounded-xl text-[#343C53] text-xl">
                                                Status: {{ $trans->status }}
                                            </p>
                                            <a href="{{ route('laporan.trans', $trans->id) }}"
                                                class="w-[224px] h-full flex justify-between items-center px-4 py-2 bg-[#f25e5e] text-white text-xl font-bold rounded-xl shadow-xl cursor-pointer hover:opacity-80">
                                                <span>
                                                    Download Nota
                                                </span>
                                                <img class="w-8 h-8" src="/assets/img/Bidownload.png" alt="">
                                            </a>
                                        </div>
                                        @php
                                            $list = $details->where('trans_id', '=', $trans->id);
                                        @endphp
                                        <div
                                            class="w-full h-full overflow-x-scroll flex border-2 border-[#343C53] rounded-xl p-4 scrollbar-hide gap-3">
                                            @foreach ($list as $detail)
                                                <div
                                                    class="w-60 h-24 px-4 py-2 bg-[#F25E5E] rounded-xl text-white font-bold flex items-center">
                                                    @if ($detail->material_id != 0)
                                                        {{ $detail->material->material_name }}
                                                    @else
                                                        {{ $detail->tool->tool_name }}
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </card>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    @php
                        $user = Auth::user();
                        $materials = $cartData->where('material_id', '!=', 0);
                        $tools = $cartData->where('tool_id', '!=', 0);
                    @endphp
                    @auth
                        @if (count($materials) != 0 || count($tools) != 0)
                            <form action="{{ route('trans.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="dipinjam">
                                <div class="grid grid-cols-2 gap-5">
                                    <div class="flex flex-col mb-5">
                                        <label for="tanggal_peminjaman" class="font-bold text-slate-700 mb-2.5">Nama
                                            Peminjam</label>
                                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                                        <input type="text" id="nama" name="nama" value="{{ $user->name }}"
                                            class="p-3 border border-black text-base rounded-md">
                                    </div>
                                    <div class="flex flex-col mb-5">
                                        <label for="tanggal_pengembalian" class="font-bold text-slate-700 mb-2.5">Nomor Telepon
                                            Peminjam</label>
                                        <input type="text" id="tanggal_pengembalian" name="tanggal_pengembalian"
                                            value="{{ $user->phone }}" class="p-3 border border-black text-base rounded-md">
                                    </div>

                                    <label for="material" class="col-span-2">
                                        Daftar Bahan-Bahan Pada Keranjang
                                    </label>
                                    <div class="col-span-2 flex w-full overflow-x-scroll scrollbar-hide gap-8">
                                        @foreach ($materials as $materialIndex => $material)
                                            <input type="hidden" name="details[{{ $materialIndex }}][material_id]"
                                                value="{{ $material->material->id }}">
                                            <input type="hidden" name="details[{{ $materialIndex }}][amount]"
                                                value="{{ $material->amount }}">
                                            <input type="hidden" name="details[{{ $materialIndex }}][tool_id]" value="0">
                                            <livewire:card-trans :detail="$material" :filter="'material'" :materials="$materials"
                                                :index="$materialIndex" />
                                        @endforeach
                                    </div>

                                    <label for="material" class="col-span-2">
                                        Daftar Alat-Alat Pada Keranjang
                                    </label>
                                    <div class="col-span-2 flex w-full overflow-x-scroll scrollbar-hide gap-8">
                                        @foreach ($tools as $toolIndex => $tool)
                                            <input type="hidden" name="details[{{ count($materials) + $toolIndex }}][tool_id]"
                                                value="{{ $tool->tool->id }}">
                                            <input type="hidden" name="details[{{ count($materials) + $toolIndex }}][amount]"
                                                value="{{ $tool->amount }}">
                                            <input type="hidden"
                                                name="details[{{ count($materials) + $toolIndex }}][material_id]"
                                                value="0">
                                            <livewire:card-trans :detail="$tool" :filter="'tool'" :materials="$materials"
                                                :index="$toolIndex" />
                                        @endforeach
                                    </div>
                                    <div class="flex flex-col mb-5">
                                        <label for="tanggal_peminjaman" class="font-bold text-slate-700 mb-2.5">Tanggal
                                            Peminjaman</label>
                                        <input type="date" id="tanggal_peminjaman" name="borrow_date"
                                            class="p-3 border border-black text-base rounded-md">
                                    </div>
                                    <div class="flex flex-col mb-5">
                                        <label for="tanggal_pengembalian" class="font-bold text-slate-700 mb-2.5">Rencana
                                            Pengembalian</label>
                                        <input type="date" id="tanggal_pengembalian" name="return_date"
                                            class="p-3 border border-black text-base rounded-md">
                                    </div>
                                </div>
                                <div class="felx justify-end">

                                </div>
                                <button type="submit"
                                    class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
                            </form>
                        @else
                            <section class="relative w-full h-full">
                                <img loading="lazy" src="/assets/img/Rectangle 1.png"
                                    class="w-full h-[520px] object-cover rounded-lg" alt="Image description" />
                                <div class="absolute inset-0"
                                    style="border-radius: 8px; background: linear-gradient(77deg, rgba(242, 94, 94, 0.50) 0%, rgba(242, 94, 94, 0.25) 36.4%, rgba(242, 94, 94, 0.10) 100%);">
                                </div>
                                <div class="absolute w-full h-full top-0 left-0 flex items-center justify-center z-30">
                                    <div
                                        class="w-[50%] flex flex-col gap-8 justify-center items-center p-12 rounded-lg bg-white opacity-90">
                                        <h1 class="text-[#343C53]">
                                            Barang Yang Ingin Anda Pinjam Masih Kosong
                                        </h1>
                                        <p class="text-center text-lg font-normal w-full">
                                            Tambahkan alat dan bahan laboratorium yang anda perlukan untuk melakukan praktikum.
                                            Pergi ke
                                            halaman fakultas untuk memilih fakultas yang diinginkan, kemudian simpan ke dalam
                                            keranjang.
                                        </p>
                                        <div class="text-lg flex items-center gap-6">
                                            <a href="{{ route('fakultas', 'FMIPA') }}"
                                                class="w-52 h-14 flex justify-center items-center rounded-full bg-[#F25E5E] text-white hover:bg-[#343C53]">
                                                Halaman Fakultas
                                            </a>
                                            <span>
                                                Atau
                                            </span>
                                            <a href="{{ route('dashboard') }}"
                                                class="w-52 h-14 flex justify-center items-center rounded-full border-2 border-[#F25E5E] bg-white text-[#F25E5E] hover:text-white hover:bg-[#343C53] hover:border-none">
                                                Halaman Rekomendasi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                    @endauth
                </div>
            </div>
        </h1>
    </div>
@endsection
