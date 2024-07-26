<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: left;
        }

        th {}

        .w-full {
            width: 100%;
        }

        .h-full {
            height: 100%;
        }

        .flexed {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-center {
            align-items: center;
        }

        .text-center {
            text-align: center;
        }

        .font-normal {
            font-weight: normal;
        }

        .gap-4>*+* {
            margin-left: 1rem;
            /* Sesuaikan dengan kebutuhan */
        }

        /* Tambahan untuk flex-gap (jika tidak didukung di browser Anda) */
        .flex-gap>*+* {
            margin-left: 1rem;
            /* Sesuaikan dengan kebutuhan */
        }

        /* Untuk mengatur margin dan padding tambahan */
        .mb-4 {
            margin-bottom: 1rem;
            /* Sesuaikan dengan kebutuhan */
        }

        /* Untuk mengatur proporsi gambar (jika diperlukan) */
        .w-[12px] {
            width: 12px;
            /* Sesuaikan dengan kebutuhan */
        }

        .h-[12px] {
            height: 12px;
            /* Sesuaikan dengan kebutuhan */
        }
    </style>
</head>

<body>
    <header class="w-full flex flex-col">
        <div class="w-full flexed">
            <div class="font-bold text-center flex flex-col gap-4">
                <h2>Sistem Informasi Manajamen Inventaris Laboratorium</h2>
                <h2>Universitas Udayana</h2>
                <h3 class="flex gap-4 text-lg font-normal justify-center">
                    <span>
                        alamat: Jl. Cempaka Sari Indah
                    </span>
                    <span>
                        email: siilunud@gmail.com
                    </span>
                    <span>
                        no.telp: +628123456789
                    </span>
                </h3>
            </div>
        </div>
        <div style="width: 100%; height: 1px; background-color: black; margin-bottom: 1.5px;"></div>
        <div style="width: 100%; height: 2px; background-color: black; margin-bottom: 24px;"></div>
    </header>
    <main class="px-2">
        <div class="flex flex-col text-xl gap-4">
            <p>
                Fakultas: {{ $room->faculty_name }}
            </p>
            <p>
                Program Studi: {{ $room->major_name }}
            </p>
            <p>
                Nama Laboratorium: {{ $room->room_name }}
            </p>
            <p>
                Status Laboratorium: {{ $room->status }}
            </p>
            <p>
                Jumlah Bahan: {{ $room->total_materials }}
            </p>
            <p>
                Jumlah Alat: {{ $room->total_tools }}
            </p>
        </div>
        <div class="text-lg mt-2">
            <h2 class="text-xl font-bold mb-2">Daftar Bahan</h2>
            <table style="margin-bottom: 48px;">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Bahan</th>
                        <th>Karakteristik</th>
                        <th>Kondisi</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $index => $material)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $material->material->material_name }}</td>
                            <td>{{ $material->material->character }}</td>
                            <td>{{ $material->material->condition }}</td>
                            <td>{{ $material->amount }}</td>
                            <td>{{ $material->material->in_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2 class="text-xl font-bold mb-2">Daftar Alat</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Alat</th>
                        <th>Karakteristik</th>
                        <th>Kondisi</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tools as $index => $tool)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tool->tool->tool_name }}</td>
                            <td>{{ $tool->tool->merk }}</td>
                            <td>{{ $tool->tool->condition }}</td>
                            <td>{{ $tool->amount }}</td>
                            <td>{{ $tool->tool->in_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
