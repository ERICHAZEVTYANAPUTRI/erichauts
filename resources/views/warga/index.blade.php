@extends('layouts.main')

  @section('content')
  <head>
        <title>Halaman Admin</title>
    </head>
    <body>
    <style>body{
    background-color: rgb(173, 132, 185);
    }
</style>
    <h1>Data Penduduk </h1>
    <h3>Kecamatan Rogojampi</h3>
  <div class="container">
    <a class="btn btn-secondary" href="/warga/create">Add Data</a>
<table class="table table-info table-striped">
<tr>
    <th>id</th>
    <th>NAMA</th>
    <th>NO_KTP</th>
    <th>NIK</th>
    <th>JENIS KELAMIN</th>
    <th>ALAMAT</th>
    <th>OPSI</th>
</tr>

@foreach($warga as $w)
<tr>
    <td>{{$w->id}}</td>
    <td>{{$w->nama}}</td>
    <td>{{$w->no_ktp}}</td>
    <td>{{$w->nik}}</td>
    <td>{{$w->jenis_kelamin}}</td>
    <td>{{$w->alamat}}</td>
    <td>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a class="btn btn-success" href="/warga/{{$w->id}}/edit">Update</a>
        <form action="/warga/{{$w->id}}" method="POST">
            @csrf
            @method('delete')
            <input class="btn btn-danger"type="submit" value="Delete" >
            </form>
            </div>
    </td>
</tr>
@endforeach
</table>
</div>
@endsection