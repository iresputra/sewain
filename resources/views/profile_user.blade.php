@extends('templates.header')
@section('konten')
</div>
@if($user != null)
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Profile</h1>
  <div class="row">
    <!-- left column -->
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="float: none;  margin: 0 auto;">
      <br><br>
      
      <form class="form-horizontal" role="form">
          <div class="form-group">
          <label class="col-lg-3 control-label">User ID:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$user->id}}" type="text" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$user->name}}" type="text" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$user->email}}" type="text" readonly>
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-3 control-label">No KTP:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$user->no_ktp}}" type="text" readonly>
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-3 control-label">No HP:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$user->no_hp}}" type="text" readonly>
          </div>
        </div> 
       
        
            
      
      </form>
    </div>
      <h1 class="page-header">Barang yang dimiliki </h1>  
     
 
  </div>
    @if(count($barangs))
@foreach($barangs as $barang)
@if($barang->konfirmasi_admin==1)

    
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Fotp barang</th>
        <th>Nama Barang</th>
        <th>Kuantitas</th>
        <th>Harga</th>
        
        
        <th>Aksi</th>
                </tr>
    </thead>
    <tbody class="rowlink">
        
      <tr>
          <td style="vertical-align: middle;"><a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}"><img src="{{ asset('image/' . $barang->foto_barang) }}" width="100" height="100"/> </a></td>
        <td style="vertical-align: middle;" >{{$barang->nama_barang}}</td>
        <td style="vertical-align: middle;" >{{$barang->kuantitas_barang}}</td>
        <td style="vertical-align: middle;">{{$barang->harga_barang}}</td>
        <td style="vertical-align: middle;" ><a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}">View </a></td>
        
       
      </tr>
       
    </tbody>
  </table>
@endif
@endforeach 

@else
tidak punya barang untuk disewakan
@endif

@else
user tidak ditemukan
@endif
</div>


@endsection

