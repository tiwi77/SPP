@extends('dashboard.dashboard')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        {{-- <h2>DATA POST BERITA</h2>
                        Login Aktif : {{Auth::user()->name}} <strong> ({{Auth::user()->role}}) </strong> --}}
                        <a href="/logout" class="btn btn-md btn-outline-danger mb-3 float-right" onclick="return confirm('Apakah Anda Yakin Keluar dari sistem ?');">Logout</a>
                        <a href="{{ route('siswa.create')}}" class="btn btn-md btn-success mb-3 mr-3 float-right">New
                            Post</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nisn</th>
                                    <th scope="col">Nis</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">kelas</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No. Telepon</th>
                                    <th scope="col">spp</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa as $index => $item)
                                <tr class="text-center">
                                    {{-- <th scope="row"class="text-center">{{ $index + $siswa->firstItem() }}</th> --}}
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->id_kelas }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->id_spp }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('siswa.destroy', $item->nisn) }}" method="POST">
                                            <a href="{{ route('siswa.edit', $item->nisn) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            @can('isAdmin')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data Siswa tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

