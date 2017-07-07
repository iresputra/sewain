






@extends('templates.header')

@section('konten')

</div>
<<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>List Barang Anda</h2>
  <p>Seluruh barang yang sudah disetujui maupun belum oleh admin</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama barang</th>
        <th>Kuantitas</th>
        <th>Harga</th>
        <th>Deskripsi Barang</th>
        <th>Status Barang</th>
                </tr>
    </thead>
    <tbody>
        @foreach($barangs as $barang)
        @if((Auth::user()->id) == $barang->user_id)
      <tr>
        <td>{{$barang->nama_barang}}</td>
        <td>{{$barang->kuantitas_barang}}</td>
        <td>{{$barang->harga_barang}}</td>
          <td>{{$barang->deskripsi_barang}}</td>
          
          @if($barang->konfirmasi_admin==0)
          <td>Barang belum disetujui</td>
          
          @elseif($barang->konfirmasi_admin==1)
          <td>Barang sudah dikonfirmasi</td>
          @else
          <td>Barang kamu ditolak!</td>
          @endif
        
        
      </tr>
        @endif
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>


@endsection




