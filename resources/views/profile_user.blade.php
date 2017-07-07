@extends('templates.header')
@section('konten')
</div>
@if($user != null)
<h1>Personal Information</h1>
<h2>{{$user->name}}</h2>
<h4>Alamat :: {{$user->alamat}}</h4>
<h4>Email :: {{$user->email}}</h4>
 <h4>No. Hp :: {{$user->no_hp}}</h4>
<h3>Barang yang dimiliki : </h3>
@if(count($barangs))
@foreach($barangs as $barang)
@if($barang->konfirmasi_admin==1)
<a href="{{route('show.barang',['id_barang' => $barang->id_barang]) }}"><li>{{$barang->nama_barang}}</li></a>
@endif
@endforeach

@else
tidak punya barang untuk disewakan
@endif

@else
user tidak ditemukan
@endif
@endsection