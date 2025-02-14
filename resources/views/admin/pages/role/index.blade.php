@extends('admin.layouts.main')
@section('title-content')
    <div class="flex items-center gap-4">
        <div>
            Role dan Pengguna
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
            Daftar Pengguna Tamu
        </h2>
    </div>
    @if ($guests->isEmpty())
        <div class="w-full h-48 flex justify-center items-center bg-slate-100 rounded-xl mb-8">
            <p class="text-2xl font-bold text-bold-blue">
                Data Saat Ini Kosong
            </p>
        </div>
    @else
        <div class="space-y-5 w-full text-lg mb-8">
            <table class="w-full border rounded-xl">
                <thead>
                    <tr align="center" class="text-[#515769]">
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guests as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <form action="{{ route('roles.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role_id" onchange="this.form.submit()"
                                        class="w-full bg-slate-100 px-2 py-2 rounded-xl text-[#343C53] text-xl hover:opacity-80">
                                        <option disabled selected>{{ $user->role->name }}</option>
                                        @foreach ($roles as $role)
                                            @if (in_array($role->id, [1, 2]))
                                                <option value="{{ $role->id }}"
                                                    {{ $user->role_id === $role->id ? 'hidden' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="flex justify-between items-center w-full p-2 mb-4 bg-slate-100 rounded-xl">
        <h2 class="text-2xl font-bold text-bold-blue leading-none">
            Daftar Mahasiswa
        </h2>
    </div>
    @if ($students->isEmpty())
        <div class="w-full h-48 flex justify-center items-center bg-slate-100 rounded-xl mb-8">
            <p class="text-2xl font-bold text-bold-blue">
                Data Saat Ini Kosong
            </p>
        </div>
    @else
        <div class="space-y-5 w-full text-lg mb-8">
            <table class="w-full border rounded-xl">
                <thead>
                    <tr align="center" class="text-[#515769]">
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <form action="{{ route('roles.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role_id" onchange="this.form.submit()"
                                        class="w-full bg-slate-100 px-2 py-2 rounded-xl text-[#343C53] text-xl hover:opacity-80">
                                        <option disabled selected>{{ $user->role->name }}</option>
                                        @foreach ($roles as $role)
                                            @if (in_array($role->id, [1, 2]))
                                                <option value="{{ $role->id }}"
                                                    {{ $user->role_id === $role->id ? 'hidden' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="flex justify-between items-center w-full p-2 mb-4 bg-slate-100 rounded-xl">
        <h2 class="text-2xl font-bold text-bold-blue leading-none">
            Daftar Pegawai
        </h2>
    </div>
    @if ($employees->isEmpty())
        <div class="w-full h-48 flex justify-center items-center bg-slate-100 rounded-xl mb-8">
            <p class="text-2xl font-bold text-bold-blue">
                Data Saat Ini Kosong
            </p>
        </div>
    @else
        <div class="space-y-5 w-full text-lg">
            <table class="w-full border rounded-xl">
                <thead>
                    <tr align="center" class="text-[#515769]">
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <form action="{{ route('roles.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role_id" onchange="this.form.submit()"
                                        class="w-full bg-slate-100 px-2 py-2 rounded-xl text-[#343C53] text-xl hover:opacity-80">
                                        <option disabled selected>{{ $user->role->name }}</option>
                                        @foreach ($roles as $role)
                                            @if (in_array($role->id, [3, 4, 5]))
                                                <option value="{{ $role->id }}"
                                                    {{ $user->role_id === $role->id ? 'hidden' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
