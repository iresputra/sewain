



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
    <span><a href="{{route('show_all_transaction')}}">Semua transaksi</a></span><br>
      <span><a href-"{{route('dashboard_admin')}}">Semua barang</a></span><br>
  <h2>Semua User</h2>
  <p>Seluruh user</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Tgl Lahir</th>
        <th>No.KTP</th>
        <th>No.HP</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
          <td><a href="{{route('show_user',['id'=>$user->id])}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->alamat}}</td>
        <td>{{$user->tanggal_lahir}}</td>
        <td>{{$user->no_ktp}}</td>
          <td>{{$user->no_hp}}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>


@endsection