<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="/assets/img/SIIL-Rounded.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
    <style>
        .font-rhodium {
            font-family: 'Rhodium Libre', serif;
        }
    </style>
</head>

<body>
    @if ($errors->has('credential'))
        <div id="error-message" class="fixed w-full h-[160px] flex items-center justify-center z-50 transition">
            <div class="p-6 rounded-lg shadow-lg bg-red-200">
                <div class="bg-white text-xl font-bold text-red-700 p-4 rounded shadow-md">
                    {{ $errors->first('credential') }}
                </div>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div id="success-message" class="fixed w-full h-[160px] flex items-center justify-center z-50">
            <div class="p-6 rounded-lg shadow-lg bg-green-200">
                <div class="bg-white text-xl font-bold text-green-700 p-4 rounded shadow-md">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="w-full h-screen flex justify-center items-center">
        <div class="relative flex w-[88%] h-[88%] border-2 rounded-3xl shadow-xl overflow-hidden">
            @if ($auth == 'login')
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('move-side').style.left = '50%';
                        setTimeout(function() {
                            document.getElementById('welcoming-regis').style.display = 'none';
                            document.getElementById('welcoming-login').style.display = 'flex';
                        }, 800);
                    });
                </script>
            @else
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('move-side').style.left = '0%';
                        setTimeout(function() {
                            document.getElementById('welcoming-login').style.display = 'none';
                            document.getElementById('welcoming-regis').style.display = 'flex';
                        }, 800);
                    });
                </script>
            @endif
            <div id="move-side" class="absolute w-[50%] h-full bg-[#F25E5E] left-[0%] transition-left">
                <div id="welcoming-regis" class="h-full flex flex-col justify-center items-center text-white gap-12 ">
                    <h1 class="font-bold text-4xl">
                        SELAMAT DATANG
                    </h1>
                    <p class="w-[75%] text-center text-2xl">
                        Silahkan lengkapi data pribadi anda untuk dapat melanjutkan ke tahap berikutnya
                    </p>
                    <div class="flex flex-col mt-32 items-center gap-4">
                        <span class="text-xl">
                            Sudah memiliki akun?
                        </span>
                        <button id="regis"
                            class="bg-white p-2 rounded-2xl w-56 text-2xl text-[#F25E5E] hover:bg-[#343C53]">
                            MASUK
                        </button>
                    </div>
                </div>
                <div id="welcoming-login" class="h-full flex flex-col justify-center items-center text-white gap-12">
                    <h1 class="font-bold text-4xl text-center w-[60%]">
                        SELAMAT DATANG KEMBALI
                    </h1>
                    <p class="w-[65%] text-center text-2xl">
                        Silahkan input data Anda yang sudah terdaftar sebelumnya!
                    </p>
                    <div class="flex flex-col mt-32 items-center gap-4">
                        <span class="text-xl">
                            Belum memiliki akun?
                        </span>
                        <button id="login"
                            class="bg-white p-2 rounded-2xl w-56 text-2xl text-[#F25E5E] hover:bg-[#343C53]">
                            DAFTAR
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-[50%] h-full flex justify-center items-center">
                    <div class=" flex flex-col p-12 items-center gap-10">
                        <span class="text-4xl font-bold text-[#343C53]">
                            MASUK
                        </span>
                        <div class="flex gap-16">
                            <div class="h-[80px] w-[80px] rounded-full bg-slate-300"></div>
                            <div class="h-[80px] w-[80px] rounded-full bg-slate-300"></div>
                            <div class="h-[80px] w-[80px] rounded-full bg-slate-300"></div>
                        </div>
                        <form id="sign-up" action="{{ route('sign-in') }}" method="POST" class="w-full">
                            @csrf
                            <label for="credential" class="text-xl font-bold text-[#343C53]">Username or Email</label>
                            <input type="text" name="credential"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53]  mb-4"
                                placeholder="Masukan Nama Pengguna">
                            <label for="password" class="text-xl font-bold text-[#343C53]">Password</label>
                            <input type="password" name="password"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53] mb-10"
                                placeholder="Masukan Kata Sandi">
                            <div class="flex justify-center">
                                <button
                                    class="w-56 p-2 rounded-xl text-2xl text-white bg-[#F25E5E] hover:bg-[#343C53]">MASUK</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-[50%] flex justify-center items-center">
                    <div class="h-full flex flex-col p-12 items-center gap-10">
                        <span class="text-4xl font-bold text-[#343C53]">
                            DAFTAR
                        </span>
                        <div class="flex gap-16">
                            <div class="h-[80px] w-[80px] rounded-full bg-slate-300"></div>
                            <div class="h-[80px] w-[80px] rounded-full bg-slate-300"></div>
                            <div class="h-[80px] w-[80px] rounded-full bg-slate-300"></div>
                        </div>
                        <form id="sign-up" action="{{ route('sign-up') }}" method="POST"
                            class="w-full overflow-y-scroll scrollbar-hide h-[64%]">
                            @csrf
                            <label for="name" class="text-xl font-bold text-[#343C53]">Nama</label>
                            <input type="text" name="name"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53] mb-4"
                                placeholder="Masukan Nama">
                            <label for="username" class="text-xl font-bold text-[#343C53]">Username</label>
                            <input type="text" name="username"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53]  mb-4"
                                placeholder="Masukan Nama Pengguna">
                            <label for="email" class="text-xl font-bold text-[#343C53]">Email</label>
                            <input type="email" name="email"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53] mb-4"
                                placeholder="Masukan Email">
                            <label for="phone" class="text-xl font-bold text-[#343C53]">Telepon</label>
                            <input type="text" name="phone"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53]  mb-4"
                                placeholder="Masukan Nomor Telepon">
                            <label for="password" class="text-xl font-bold text-[#343C53]">Password</label>
                            <input type="password" name="password"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53] mb-4"
                                placeholder="Masukan Kata Sandi">
                            <label for="password_confirmation" class="text-xl font-bold text-[#343C53]">Konfirmasi
                                Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full h-[56px] border-2 rounded-lg px-4 text-xl text-[#343C53] mb-4"
                                placeholder="Masukan Kata Sandi Ulang">
                            <div class="flex justify-center">
                                <button
                                    class="w-56 p-2 rounded-xl text-2xl text-white bg-[#F25E5E] hover:bg-[#343C53]">DAFTAR
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('regis').addEventListener('click', function() {
            document.getElementById('move-side').style.left = '50%';
            setTimeout(function() {
                document.getElementById('welcoming-regis').style.display = 'none';
                document.getElementById('welcoming-login').style.display = 'flex';
            }, 800);
        });

        document.getElementById('login').addEventListener('click', function() {
            document.getElementById('move-side').style.left = '0%';
            setTimeout(function() {
                document.getElementById('welcoming-login').style.display = 'none';
                document.getElementById('welcoming-regis').style.display = 'flex';
            }, 800);
        });

        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.top = '-200px';
            }

            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</body>

</html>
