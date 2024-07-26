@extends('user.layouts.dashboard') {{-- Memperluas layout utama 'dashboard' dari folder 'user.layouts' --}}

@section('page')
    Barang {{-- Menetapkan judul halaman sebagai "Barang" --}}
@endsection

@section('contents')
    @if (request()->routeIs('barang'))
        {{-- Memeriksa apakah rute saat ini adalah 'barang' --}}
        <section x-data="{ open: false }" class="relative flex flex-col px-16 py-20 bg-white max-md:px-5">
            <div class="relative w-full mt-20 max-md:mt-10">
                <div class="absolute inset-0"
                    style="border-radius: 48px; background: linear-gradient(77deg, rgba(242, 94, 94, 0.50) 0%, rgba(242, 94, 94, 0.25) 36.4%, rgba(242, 94, 94, 0.10) 100%);">
                </div>
                <img loading="lazy" src="/assets/img/Rectangle 1.png"
                    class="w-full aspect-[2.08] max-md:max-w-full rounded-[48px]" alt="Image description" />
                <div class="absolute top-0 w-full h-full flex justify-center items-center text-3xl font-bold text-[#F25E5E]">
                    <div class="w-[50%] text-center bg-white rounded-3xl py-28 px-8 shadow-xl opacity-90">
                        Pilih dan Masuk ke Dalam Halaman Fakultas yang Anda Inginkan Terlebih Dahulu, Melalui Bar Navigasi
                        Di Atas
                    </div>
                </div>
            </div>
        </section>
    @else
        {{-- Jika Route Bukan barang --}}
        <section x-data="{ open: false }" class="relative w-full flex flex-col px-16 py-20 bg-white max-md:px-5">
            <div class="relative w-full mt-20 max-md:mt-10">
                {{-- Dropdown Pilihan Ruangan --}}
                <div class="absolute left-0 top-0 z-40 w-full flex  text-slate-700 p-[56px] justify-between">
                    <div class="flex flex-col">
                        <div x-on:click="open = !open"
                            class="w-[360px] flex justify-between items-center px-8 py-2 bg-white text-4xl font-bold rounded-xl shadow-xl cursor-pointer hover:opacity-80">
                            <span>
                                {{ $room->room_name }} {{-- Menampilkan nama ruangan saat ini --}}
                            </span>
                            <img class="w-8 h-8" src="/assets/img/dropdown.png" alt="">
                        </div>
                        <div x-show="open" @click.away="open = false" x-cloak
                            class="mt-2 w-[360px] flex flex-col justify-between items-start p-4 bg-white text-2xl font-bold rounded-xl shadow-xl">
                            <div class="border-b-2 w-full"></div>
                            {{-- Menampilkan daftar ruangan --}}
                            @foreach ($list_rooms as $room)
                                <a href="" class="px-4 py-3 border-b-2 w-full hover:opacity-90 hover:bg-slate-50">
                                    {{ $room->room_name }} {{-- Nama setiap ruangan dalam daftar --}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('laporan.barang', $major) }}"
                        class="w-[280px] h-full flex justify-between items-center px-6 py-2 bg-[#f25e5e] text-white text-xl font-bold rounded-xl shadow-xl cursor-pointer hover:opacity-80">
                        <span>
                            Download Detail Lab
                        </span>
                        <img class="w-8 h-8" src="/assets/img/Bidownload.png" alt="">
                    </a>
                </div>
                <div class="absolute inset-0"
                    style="border-radius: 48px; background: linear-gradient(77deg, rgba(242, 94, 94, 0.50) 0%, rgba(242, 94, 94, 0.25) 36.4%, rgba(242, 94, 94, 0.10) 100%);">
                </div>
                <img loading="lazy" src="/assets/img/Rectangle 1.png"
                    class="w-full aspect-[2.08] max-md:max-w-full rounded-[48px]" alt="Image description" />
                <div
                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 flex justify-center items-center w-full max-w-7xl max-md:max-w-full">
                    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                        {{-- Informasi Alat --}}
                        <article class="flex flex-col w-[36%] max-md:ml-0 max-md:w-full">
                            <section
                                class="flex flex-col grow px-8 py-8 mx-auto w-full bg-white rounded-3xl shadow-lg max-md:px-5 max-md:mt-9">
                                <div class="flex gap-4 font-bold text-center text-slate-700">
                                    <img loading="lazy" src="/assets/img/Alat-black.svg" alt="Equipment Icon"
                                        class="shrink-0 max-w-full aspect-square w-[100px]" />
                                    <div class="flex flex-col self-start mt-3">
                                        <h2 class="text-[28px] font-bold">Alat Sejumlah</h2>
                                        <p class="text-6xl font-bold">
                                            <span class="text-red-400">{{ $room->total_tools }}</span> unit {{-- Jumlah unit alat --}}
                                        </p>
                                    </div>
                                </div>
                                <p class="mt-7 text-base text-zinc-500 font-normal">Dengan berbagai alat yang dapat
                                    dipinjamkan dan membantu anda dalam melaksanakan praktikum. Terutama berfokus kepada
                                    praktikum yang
                                    melibatkan cairan dan penggunaan laboratorium basah.</p>
                            </section>
                        </article>
                        {{-- Informasi Bahan --}}
                        <article class="flex flex-col ml-5 w-[36%] max-md:ml-0 max-md:w-full">
                            <section
                                class="flex flex-col grow px-8 py-8 mx-auto w-full bg-white rounded-3xl shadow-lg max-md:px-5 max-md:mt-9">
                                <div class="flex gap-4 font-bold text-center text-slate-700">
                                    <img loading="lazy" src="/assets/img/Bahan-red.svg" alt="Materials Icon"
                                        class="shrink-0 max-w-full aspect-square w-[100px]" />
                                    <div class="flex flex-col self-start mt-3">
                                        <h2 class="text-[28px] font-bold">Bahan Sejumlah</h2>
                                        <p class="text-6xl font-bold">
                                            <span class="text-red-400">{{ $room->total_materials }}</span> jenis {{-- Jumlah jenis bahan --}}
                                        </p>
                                    </div>
                                </div>
                                <p class="mt-7 text-base text-zinc-500 font-normal">Dengan berbagai bahan yang dapat
                                    dipinjamkan dan membantu anda dalam melaksanakan praktikum. Terutama berfokus kepada
                                    praktikum yang
                                    melibatkan cairan dan penggunaan laboratorium basah.</p>
                            </section>
                        </article>
                        {{-- Informasi Jam Operasional --}}
                        <article class="flex flex-col ml-5 w-[36%] max-md:ml-0 max-md:w-full">
                            <section
                                class="flex flex-col grow px-8 py-8 mx-auto w-full bg-white rounded-3xl shadow-lg max-md:px-5 max-md:mt-9">
                                <div class="flex gap-4 font-bold text-center text-slate-700">
                                    <img loading="lazy" src="/assets/img/Jam.svg" alt="Operating Hours Icon"
                                        class="shrink-0 max-w-full aspect-square w-[100px]" />
                                    <div class="flex flex-col self-start mt-3">
                                        <h2 class="text-[28px] font-bold">Jam Operasional</h2>
                                        <p class="text-4xl font-bold">
                                            <span class="text-red-400">08.00</span> - 16.00 {{-- Waktu operasional laboratorium --}}
                                        </p>
                                    </div>
                                </div>
                                <p class="mt-7 text-base text-zinc-500 font-normal">Dengan berbagai alat yang dapat
                                    dipinjamkan dan membantu anda dalam melaksanakan praktikum. Terutama berfokus kepada
                                    praktikum yang
                                    melibatkan cairan dan penggunaan laboratorium basah.</p>
                            </section>
                        </article>
                    </div>
                </div>
            </div>
            @if ($recommendations->count() > 0)
                <p class="mt-56 text-[#343C53] text-[28px] font-bold mb-12">
                    Rekomendasi Barang Untuk Kamu
                </p>
                <div
                    class="w-full h-full flex justify-between items-center text-[28px} text-[#343C53] text-[28px] font-bold overflow-x-scroll scrollbar-hide gap-16">
                    @foreach ($recommendations as $recommendation)
                        <article class="flex flex-col w-[300px] h-[448px]">
                            <section
                                class="flex overflow-hidden relative flex-col grow justify-center text-center w-[300px] h-[448px]">
                                <img loading="lazy" src="/assets/img/Rectangle 2.png"
                                    class="object-cover absolute inset-0 size-full" alt="Image description" />
                                <div class="flex relative flex-col px-9 pb-14 rounded-2xl max-md:px-5"
                                    style="background: linear-gradient(180deg, rgba(140, 54, 54, 0.00) 0%, #F25E5E 89.5%); height: 100%;">
                                    <h3 class="mt-20 text-2xl font-bold text-white max-md:mt-10">
                                        {{-- Menampilkan Detail Berdasarkan Filter --}}
                                        @if ($filter == 'material')
                                            {{ $recommendation->material->material_name }} {{-- Nama material --}}
                                            <br>
                                            Karakter : {{ $recommendation->material->character }} {{-- Karakter material --}}
                                            <br><br>
                                            <span class="text-xl">
                                                {{ $recommendation->material->condition }} {{-- Kondisi material --}}
                                            </span>
                                        @else
                                            {{ $recommendation->tool->tool_name }} {{-- Nama alat --}}
                                            <br>
                                            Merk : {{ $recommendation->tool->merk }} {{-- Merk alat --}}
                                            <br><br>
                                            Kondisi
                                            {{ $recommendation->tool->condition }} {{-- Kondisi alat --}}
                                        @endif
                                    </h3>
                                    <button
                                        class="justify-center self-center px-10 py-3 mt-12 text-xl text-red-400 whitespace-nowrap bg-white rounded-3xl max-md:px-5 max-md:mt-10 hover:bg-[#343C53] add-to-cart"
                                        data-id="{{ $filter == 'material' ? $recommendation->material->id : $recommendation->tool->id }}"
                                        {{-- ID item --}} data-type="{{ $filter == 'material' ? 'material' : 'tool' }}"
                                        tabindex="0"> {{-- Tipe item --}}
                                        PINJAM
                                    </button>
                                </div>
                            </section>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="mt-36"></div>
            @endif
            <div class="mt-20 w-full flex justify-between items-center text-[#343C53] text-[28px] font-bold">
                <span>
                    Ditampilkan Berdasarkan
                </span>
                {{-- Pilihan Filter --}}
                {{-- Dropdown ini memungkinkan pengguna untuk memilih apakah mereka ingin melihat daftar bahan atau alat --}}
                <div class="z-20">
                    <div x-on:click="open = !open"
                        class="w-[280px] px-4 py-2 border-[3px] border-[#343C53] text-2xl rounded-xl flex items-center justify-between cursor-pointer hover:opacity-80">
                        <span>
                            @if ($filter == 'material')
                                Bahan Praktikum
                            @else
                                Alat Praktikum
                            @endif
                        </span>
                        <img class="w-6 h-6" src="/assets/img/dropdown.png" alt="">
                    </div>
                    @if ($filter != 'material')
                        {{-- Link untuk filter bahan praktikum jika filter saat ini bukan bahan --}}
                        <a x-show="open" @click.away="open = false" x-cloak
                            href="{{ route('alat-bahan', ['major' => $major, 'filter' => 'material']) }}"
                            class="w-[280px] mt-2 px-4 py-2 border-[3px] border-[#343C53] text-white text-2xl rounded-xl flex items-center gap-4 absolute bg-[#343C53] hover:bg-white hover:text-[#343C53]">
                            <span>
                                Bahan Praktikum
                            </span>
                        </a>
                    @else
                        {{-- Link untuk filter alat praktikum jika filter saat ini bukan alat --}}
                        <a x-show="open" @click.away="open = false" x-cloak
                            href="{{ route('alat-bahan', ['major' => $major, 'filter' => 'alat']) }}"
                            class="w-[280px] mt-2 px-4 py-2 border-[3px] border-[#343C53] text-white text-2xl rounded-xl flex items-center gap-4 absolute bg-[#343C53] hover:bg-white hover:text-[#343C53]">
                            <span>
                                Alat Praktikum
                            </span>
                        </a>
                    @endif
                </div>
            </div>
            <div class="mt-12 max-md:mt-40 max-md:max-w-full">
                <div class="w-full flex flex-wrap gap-12 max-md:flex-col max-md:gap-0 justify-between">
                    {{-- Daftar Detail Alat/Bahan --}}
                    @foreach ($details as $detail)
                        <article class="flex flex-col w-[300px] max-md:ml-0 max-md:w-full">
                            <section
                                class="flex overflow-hidden relative flex-col grow justify-center text-center aspect-[0.67] max-md:mt-10">
                                <img loading="lazy" src="/assets/img/Rectangle 2.png"
                                    class="object-cover absolute inset-0 size-full" alt="Image description" />
                                <div class="flex relative flex-col px-9 pb-14 rounded-2xl max-md:px-5"
                                    style="background: linear-gradient(180deg, rgba(140, 54, 54, 0.00) 0%, #F25E5E 89.5%); height: 100%;">
                                    <h3 class="mt-20 text-2xl font-bold text-white max-md:mt-10">
                                        {{-- Menampilkan Detail Berdasarkan Filter --}}
                                        @if ($filter == 'material')
                                            {{ $detail->material->material_name }} {{-- Nama material --}}
                                            <br>
                                            Karakter : {{ $detail->material->character }} {{-- Karakter material --}}
                                            <br><br>
                                            <span class="text-xl">
                                                {{ $detail->material->condition }} {{-- Kondisi material --}}
                                            </span>
                                        @else
                                            {{ $detail->tool->tool_name }} {{-- Nama alat --}}
                                            <br>
                                            Merk : {{ $detail->tool->merk }} {{-- Merk alat --}}
                                            <br><br>
                                            Kondisi
                                            {{ $detail->tool->condition }} {{-- Kondisi alat --}}
                                        @endif
                                    </h3>
                                    <button
                                        class="justify-center self-center px-10 py-3 mt-12 text-xl text-red-400 whitespace-nowrap bg-white rounded-3xl max-md:px-5 max-md:mt-10 hover:bg-[#343C53] add-to-cart"
                                        data-id="{{ $filter == 'material' ? $detail->material->id : $detail->tool->id }}"
                                        {{-- ID item --}}
                                        data-type="{{ $filter == 'material' ? 'material' : 'tool' }}" tabindex="0">
                                        {{-- Tipe item --}}
                                        PINJAM
                                    </button>
                                </div>
                            </section>
                        </article>
                    @endforeach
                    @include('vendor.tailwind') {{-- Menyertakan template tailwind vendor --}}
                </div>
            </div>
        </section>
    @endif

    {{-- Menyertakan pustaka jQuery versi 3.7.1 dari CDN --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        // Menunggu hingga seluruh dokumen siap sebelum menjalankan script
        $(document).ready(function() {
            // Mengatur AJAX dengan menyertakan header CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Menambahkan event listener untuk tombol "add-to-cart"
            $('.add-to-cart').click(function(e) {
                // Mencegah perilaku default dari tombol, yaitu pengiriman formulir
                e.preventDefault();

                // Mengambil data ID dan tipe item dari atribut data pada tombol yang diklik
                var itemId = $(this).data('id');
                var itemType = $(this).data('type'); // Ambil tipe item (material atau tool)

                // Menampilkan ID dan tipe item di konsol untuk debugging
                console.log('Item ID:', itemId);
                console.log('Item Type:', itemType);

                // Melakukan request AJAX untuk menambahkan item ke keranjang
                $.ajax({
                    type: 'POST', // Metode pengiriman POST
                    url: '{{ route('cart.add') }}', // URL endpoint untuk menambahkan item ke keranjang
                    data: {
                        item_id: itemId, // Mengirim ID item
                        type: itemType, // Mengirim tipe item (material atau tool)
                        amount: 1 // Set jumlah item menjadi 1
                    },
                    success: function(response) {
                        // Jika request berhasil, tampilkan response di konsol dan munculkan alert
                        console.log('Response:', response);
                        alert(response.success);
                    },
                    error: function(xhr, status, error) {
                        // Jika request gagal, tampilkan kesalahan di konsol
                        console.error('AJAX Error:', error);
                        console.error('Status:', status);
                        console.error('Response:', xhr.responseText);
                    }
                });
            });
        });
    </script>




@endsection
