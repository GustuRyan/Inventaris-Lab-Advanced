<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <link rel="icon" href="/assets/img/SIIL-Rounded.png" type="image/x-icon">

    <title>SIIL - Admin</title>
</head>
@php
    $user = Auth::user();

if (!$user) {
    abort(403, 'User not authenticated.');
}

$menus = [
    [
        'title' => 'Alat dan Bahan',
        'icon' => '',
        'route' => 'admin.alat-bahan.index',
        'root' => 'admin.alat-bahan.*',
    ],
    [
        'title' => 'Transaksi',
        'icon' => '',
        'route' => 'admin.transaksi.index',
        'root' => 'admin.transaksi.*',
    ],

    [
        'title' => 'Ruangan',
        'icon' => '',
        'route' => $user->role_id == 3 ? 'admin.ruangan.detail.index' : 'admin.ruangan.index',
        'root' => 'admin.ruangan.*',
    ],

    [
        'title' => 'Pegawai',
        'icon' => '',
        'route' => 'admin.pegawai.index',
        'root' => 'admin.pegawai.*',
    ],
    [
        'title' => 'Role',
        'icon' => '',
        'route' => 'admin.role.index',
        'root' => 'admin.role.*',
    ],
    [
        'title' => 'Dashboard',
        'icon' => '',
        'route' => 'dashboard',
        'root' => 'dashboarde',
    ],
];

@endphp

<body>
    <div class="flex bg-bold-blue">
        <div class="relative w-[24%] h-screen">
            <div
                class="absolute left-0 top-0 w-full h-screen bg-gradient-to-b from-[#292F3E] to-[#343C53] via-[#292F3E_24%] text-white p-4 space-y-6">
                <div class="w-full flex justify-center">
                    <img class="h-12" src="/assets/img/SIIL-Light.svg" alt="SIIL Logo">
                </div>
                <h2 class="text-xl">
                    WEBSITE Inventaris Laboratorium
                </h2>
                <ul class="space-y-3">
                    @foreach ($menus as $item)
                        @if (request()->routeIs($item['root']))
                            <li class="bg-bold-blue rounded-lg hover:opacity-85 border-2">
                                <a href="{{ route($item['route']) }}" class=" font-bold flex items-center gap-3 p-3">
                                    <div class="rounded-full w-4 h-4 bg-white"></div>
                                @else
                            <li class="text-bold-blue bg-white rounded-lg hover:bg-blue-100">
                                <a href="{{ route($item['route']) }}" class=" font-bold flex items-center gap-3 p-3">
                                    <div class="rounded-full w-4 h-4 bg-bold-blue"></div>
                        @endif
                        <p>{{ $item['title'] }}</p>
                        </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="w-full">
            <div class="w-full h-[8vh]">

            </div>
            <div class="bg-white w-full h-[92vh] rounded-tl-[36px] px-8 pt-8">
                <div class="w-full h-[8vh] border-b-4 pb-4">
                    <h1 class="text-[40px] font-bold text-bold-blue leading-none">
                        @yield('title-content')
                    </h1>
                </div>
                <div class="mt-4 w-full h-[76vh] overflow-y-scroll scrollbar-hide">
                    @yield('main-content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
