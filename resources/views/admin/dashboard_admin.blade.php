

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
  <h2>Semua Barang</h2>
  <p>Seluruh barang yang dimiliki user</p> 
    @if(session('status'))
                <div class="alert alert-success"> {{session('status')}}</div>
            @endif  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nama Barang</th>
        <th>Kuantitas</th>
        <th>Harga</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($barangs as $barang)
      <tr>
        <td>{{$barang->foto_barang}}</td>
          <td><a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}">{{$barang->nama_barang}}</a></td>
        <td>{{$barang->kuantitas_barang}}</td>
        <td>{{$barang->harga_barang}}</td>
        <td>{{$barang->created_at}}</td>
        @if($barang->konfirmasi_admin==1)
        <td>Confirmed</td>
        <td><a href="{{route('cancel_barang',['id_barang'=>$barang->id_barang])}}">Batal</a></td>
         <td><a href="{{route('delete_barang',['id_barang'=>$barang->id_barang])}}">Hapus</a></td>
        @elseif($barang->konfirmasi_admin==2)
        <td>Rejected</td>
        @else
        <td>Unconfirmed</td>
          <td><a href="{{route('konfirm_barang',['id_barang'=>$barang->id_barang])}}">Konfirm</a></td>
          <td><a href="{{route('delete_barang',['id_barang'=>$barang->id_barang])}}">Hapus</a></td>
          
        @endif
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>


@endsection