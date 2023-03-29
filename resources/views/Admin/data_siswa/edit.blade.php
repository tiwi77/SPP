@extends('dashboard.dashboard')

<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>SPP | EDIT SISWA</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
 <div class="container mt-5">
  <div class="row justify-content-center">
   <div class="col-md-6">
    <!-- Notifikasi menggunakan flash session data -->
    @if (session()->has('success'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-success alert-dismissible fade show mb-3" style="width: 18rem;" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger alert-dismissible fade show mb-3" style="width: 18rem;" role="alert">
            {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="card">
     <div class="card-body">
      <h3 class="fw-bold text-center pb-2">Perbarui Data Siswa</h3>
      <hr>
       <form action="{{ route('siswa.update', $siswa->nisn) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
         <label for="nisn">NISN:</label>
         <input type="number" class="form-control" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" required>
        </div>
        <br>
        <div class="form-group">
         <label for="nisn">NIS:</label>
         <input type="number" class="form-control" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
        </div>
        <br>
        <div class="form-group">
         <label for="nisn">Nama:</label>
         <input type="text" class="form-control" name="nama" value="{{ old('nama', $siswa->nama) }}" required>
        </div>
        <br>
        <div class="form-group">
         <label for="id_kelas">Kelas:</label>
         <select name="id_kelas" class="form-control" required>
             <option value="1" {{ $siswa->id_kelas == 1 ? 'selected':'' }}>XII RPL</option>
             <option value="2" {{ $siswa->id_kelas == 2 ? 'selected':'' }}>XII TKJ</option>
             <option value="3" {{ $siswa->id_kelas == 3 ? 'selected':'' }}>XII MM</option>
         </select>
        </div>
        <br>
        <div class="form-group">
         <label for="alamat">Alamat:</label>
         <textarea
             name="alamat" id="alamat"
             class="form-control" name="alamat" id="alamat" required>{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>
        <br>
        <div class="form-group">
         <label for="nisn">No. Telepon:</label>
         <input type="number" class="form-control" name="no_telp" value="{{ old('no_telp', $siswa->no_telp) }}" required>
        </div>
        <br>
        <div class="form-group">
         <label for="id_spp">ID. SPP:</label>
         <select name="id_spp" class="form-control" required>
             <option value="1" {{ $siswa->id_spp == 1 ? 'selected':'' }}>2021</option>
             <option value="2" {{ $siswa->id_spp == 2 ? 'selected':'' }}>2022</option>
             <option value="3" {{ $siswa->id_spp == 3 ? 'selected':'' }}>2023</option>
         </select>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-primary">PERBARUI</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-outline-dark">KEMBALI</a>
       </form>
     </div>
   </div>
   </div>
  </div>
 </div>
 <br><br><br>
 @yield('content')
 <br><br><br>
 <div class="container">
  <div class="col text-center">
   <div class="row justify-content-center">
    <div class="jumbotron">
     <p class="lead"><small>Livia's Project</small></p>
      <hr class="my-2">
     <p>&copy; Copyright 2023</p>
    </div>
   </div>
  </div>
 </div>
</body>
</html>

