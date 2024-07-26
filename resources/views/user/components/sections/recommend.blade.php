<section x-data="{ open: @isset($words) true @else false @endisset }" class="h-full w-full p-20">
    <div class="z-20 h-[640px] w-full bg-[#F25E5E] rounded-[36px] relative">
        <div class="h-full flex justify-between items-end px-20">
            <img src="/assets/img/door-of-recommend.png" alt="">
            <div class="h-full flex flex-col items-end justify-center text-end gap-12 text-white font-bold text-[44px]">
                <p>
                    Belum mengetahui apa saja diperlukan untuk praktikum?
                </p>
                <p>
                    Cari tahu dengan menggunakan sistem rekomendasi disini!
                </p>
                <button x-on:click="open = !open"
                    class="py-2 px-4 text-2xl rounded-xl text-[#F25E5E] bg-white hover:bg-[#343C53]">
                    Lihat Lebih Lanjut
                </button>
            </div>
        </div>
    </div>
    <div id="recommendation" x-show="open"
        class="z-10 w-full h-full bg-[#F25E5E] p-20 rounded-b-[36px] relative top-[-32px] transition-all">
        <div
            class="w-full h-full shadow-xl bg-white rounded-3xl flex flex-col justify-center items-center py-16 gap-12">
            <div class="w-full h-full flex justify-between px-16">
                <img class="w-[30%] shadow-xl object-cover rounded-full" src="assets/img/recommendation-logo.png"
                    alt="">
                <form action="{{ route('recommend') }}" method="POST"
                    class="flex flex-col w-[65%] gap-4 text-[#343C53]">
                    @csrf
                    <label for="helper" class="text-2xl font-bold">
                        Beritahu Kami Praktikum Apa yang Akan Anda Lakukan!
                    </label>
                    @isset($sentence)
                        <textarea class="shadow-xl border-2 rounded-xl w-full h-full p-8 text-xl" name="helper" id="helper">{{ $sentence }}</textarea>
                    @else
                        <textarea class="shadow-xl border-2 rounded-xl w-full h-full p-8 text-xl" name="helper" id="helper"
                            placeholder="Masukan praktikum yang akan dilakukan disini!"></textarea>
                    @endisset
                    <div class="flex justify-end">
                        <button
                            class="py-2 px-12 text-white font-bold text-2xl bg-[#F25E5E] rounded-xl hover:bg-[#343C53]"
                            type="submit">Submit</button>
                    </div>
                </form>
            </div>
            @isset($words)
                <div class="w-full h-full pl-16 flex flex-col gap-8">
                    <span class="font-bold text-3xl text-[#343C53]">
                        Rekomendasi Material dari Kami
                    </span>
                    <div class="w-full flex overflow-x-scroll scrollbar-hide gap-12">
                        @foreach ($materials as $match)
                            <div>
                                <div class="w-[264px] h-[336px] relative flex flex-col justify-center items-center">
                                    <img src="/assets\img\laboratory-worker-examining-substance-petri-dish-while-conducting-coronavirus-research-1.jpeg"
                                        class="w-[264px] h-[336px] rounded-2xl object-cover" />
                                    <div class="w-[264px] h-[336px] absolute rounded-2xl flex flex-col items-center justify-center pt-12 gap-12"
                                        style="background: linear-gradient(to bottom, rgba(140,54,54,0) 5%, #f25e5e 92.5%);">
                                        <p class="w-[224px] z-10 text-2xl font-bold text-center text-white">
                                            {{ $match->material_name }}
                                            <br><br>
                                            {{ $match->character }}
                                        </p>
                                        <a
                                            class="h-[50px] px-6 p-3 z-10 rounded-3xl bg-white hover:bg-[#343C53] flex justify-center items-center text-[20px] text-[#f25e5e] add-to-cart cursor-pointer" data-id="{{ $match->id }}" {{-- ID item --}}
                                            data-type="material" tabindex="0">
                                            PINJAM
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <span class="font-bold text-3xl text-[#343C53]">
                        Rekomendasi Alat dari Kami
                    </span>
                    <div class="w-full flex overflow-x-scroll scrollbar-hide gap-12">
                        @foreach ($tools as $match)
                            <div>
                                <div class="w-[264px] h-[336px] relative flex flex-col justify-center items-center">
                                    <img src="/assets\img\laboratory-worker-examining-substance-petri-dish-while-conducting-coronavirus-research-1.jpeg"
                                        class="w-[264px] h-[336px] rounded-2xl object-cover" />
                                    <div class="w-[264px] h-[336px] absolute rounded-2xl flex flex-col items-center justify-center pt-12 gap-12"
                                        style="background: linear-gradient(to bottom, rgba(140,54,54,0) 5%, #f25e5e 92.5%);">
                                        <p class="w-[224px] z-10 text-2xl font-bold text-center text-white">
                                            {{ $match->tool_name }}
                                            <br><br>
                                            Merk: {{ $match->merk }}
                                        </p>
                                        <a
                                            class="h-[50px] px-6 p-3 z-10 rounded-3xl bg-white hover:bg-[#343C53] flex justify-center items-center text-[20px] text-[#f25e5e] add-to-cart cursor-pointer" data-id="{{ $match->id }}" {{-- ID item --}}
                                            data-type="tool" tabindex="0">
                                            PINJAM
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endisset
    </div>
</section>

{{-- Menyertakan pustaka jQuery versi 3.7.1 dari CDN --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Scroll to the recommendation section if $words is set
        @if (isset($words))
            $('html, body').animate({
                scrollTop: $("#recommendation").offset().top
            }, 1000);
        @endif

        // Checkbox functionality
        $("#flagLabel").on('click', function() {
            var checkbox = $("#flagCheckbox");
            checkbox.prop("checked", !checkbox.prop("checked"));
            if (checkbox.prop("checked")) {
                $(this).css("border", "1px solid #000");
            } else {
                $(this).css("border", "none");
            }
        });
    });
</script>

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
