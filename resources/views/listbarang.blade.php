






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
    @if(session('status'))
                <div class="alert alert-success"> {{session('status')}}</div>
            @endif  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Foto Barang</th>
        <th>Nama barang</th>
        <th>Kuantitas</th>
        <th>Harga</th>
        <th>Deskripsi Barang</th>
        <th>Status Barang</th>
          <th>Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($barangs as $barang)
        @if((Auth::user()->id) == $barang->user_id)
      <tr>
          <td style="vertical-align: middle;"><a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}"><img src="{{ asset('image/' . $barang->foto_barang) }}" width="100" height="100"/> </a></td>
          <td style="vertical-align: middle;">{{$barang->nama_barang}}</td>
          <td style="vertical-align: middle;">{{$barang->kuantitas_barang}}</td>
          <td style="vertical-align: middle;">{{$barang->harga_barang}}</td>
          <td style="vertical-align: middle;">{{$barang->deskripsi_barang}}</td>
          
          @if($barang->konfirmasi_admin==0)
          <td style="vertical-align: middle;">Barang belum disetujui</td>
          <td style="vertical-align: middle;"><a href="{{route('edit_barang',['id_barang'=>$barang->id_barang])}}">Edit</a></td>
          <td style="vertical-align: middle;"><a href="{{route('hapus_barang',['id_barang'=>$barang->id_barang])}}">Hapus</a></td>
          
          @elseif($barang->konfirmasi_admin==1)
          <td style="vertical-align: middle;">Barang sudah dikonfirmasi</td>
          <td style="vertical-align: middle;"><a href="{{route('edit_barang',['id_barang'=>$barang->id_barang])}}">Edit</a></td>
          <td style="vertical-align: middle;"><a href="{{route('hapus_barang',['id_barang'=>$barang->id_barang])}}">Hapus</a></td>
          @else
          <td style="vertical-align: middle;">Barang kamu ditolak!</td>
          
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




