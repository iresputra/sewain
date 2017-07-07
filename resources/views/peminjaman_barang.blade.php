



@extends('templates.header')

@section('konten')

</div>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>
                <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>
        <script type='text/javascript' src='script.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    
    
</head>
<body>

<div class="container">
    @if(session('status'))
        <div class="alert alert-success"> {{session('status')}}</div>
    @endif
    @if($transaksis != NULL)
    <h2>Log User yang ingin meminjam barang anda</h2>
  <p>Seluruh permohonan penyewaan</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama barang</th>
        <th>Peminjam</th>
        <th>Kuantitas</th>
          <th>Biaya sewa</th>
        <th>Tanggal Permohonan Sewa</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach($transaksis as $transaksi)
        
      <tr>
          <td><a href="{{route('show.barang',['id_barang'=>$transaksi->barang->id_barang])}}">{{$transaksi->barang->nama_barang}}</a></td>
        <td><a href="{{route('show_user',['id'=>$transaksi->user->id])}}" >{{$transaksi->user->name}}</a></td>
        <td>{{$transaksi->kuantitas_sewa}}</td>
        <td>Rp. {{$transaksi->biaya_sewa}}</td>
        <td>{{$transaksi->tanggal_transaksi}}</td>
        <td>{{$transaksi->tanggal_peminjaman}}</td>
        <td>{{$transaksi->tanggal_pengembalian}}</td>
          
          @if($transaksi->status->status_penolakan != 1 )
          @if($transaksi->status->status_konfirmasi==0)
          <td>Belum dikonfirmasi</td>
          <td><a href="{{route('konfirmasi_permohonan_peminjaman',['transaksi_id'=>$transaksi->id_transaksi])}}">Setujui Permohonan</a><br></td>
          <td><a href="{{route('tolak_permohonan_peminjaman',['transaksi_id'=>$transaksi->id_transaksi])}}">Tolak Permohonan</a></td>
          
          
          @elseif($transaksi->status->status_konfirmasi==1 && $transaksi->status->status_peminjaman == 0)
          <td>Permohonan sudah kamu setujui </td>

          <td><a href="{{route('tolak_permohonan_peminjaman',['transaksi_id'=>$transaksi->id_transaksi])}}">Batalkan persetujuan</a></td>
          
          @elseif($transaksi->status->status_konfirmasi == 1 && $transaksi->status->status_peminjaman==1)
          <td>Barang sudah diterima</td>
          @endif
          @else
           <td>Permohonan sudah kamu tolak!</td>
          @endif
        <td><a data-toggle="modal" data-target="#gambar"><img id="myImg" class="img-responsive" src="{{ asset('image/ktp/' . $transaksi->foto_ktp_penyewa) }}" /></a></td>
          
          
      </tr>
      
        @endforeach
         <center>{{$transaksis->links()}}</center>
        @else
            <h1>Sayang sekali, belum ada yang meminjam barang kamu</h1>
        @endif
       
    </tbody>
  </table>
</div>
 
    
    
    
    
    <div class="modal fade" id="gambar" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content" id="img01">
        
        
       
      </div>
      
    </div>
  </div>
</div>
    
    
    
<script type="text/javascript">
$(document).ready(function() {
        $('img').on('click', function() {
           $("#img01").empty();
          var image = $(this).attr("src");
          $("#img01").append("<img class='img-responsive' src='" + image + "' />");
           
          //alert(image);
              // Get the <span> element that closes the modal
         
          
        });

      });





    
    </script>
</body>
</html>


@endsection