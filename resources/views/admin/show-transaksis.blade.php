
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    
    <span><a href="{{route('dashboard_admin')}}">Semua barang</a></span><br>
    <span><a href="{{route('show_all_user')}}">Semua user</a></span>
    <h2>List Transaksi </h2>
  <p></p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama barang</th>
        <th>Peminjam</th>
        <th>Pemilik</th>
        <th>Kuantitas</th>
        <th>Total Biaya</th>
        <th>Tanggal Permohonan</th>
        <th>Tanggal Pengambilan</th>
        <th>Tanggal Pengembalian</th>
        <th>KTP Penyewa</th>
        <th>Status</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $transaksi)

      <tr>
        <td>{{$transaksi->barang->nama_barang}}</td>
        <td>{{$transaksi->user->name}}</td>
        <td>{{$transaksi->pemilik->name}}</td>
        <td>{{$transaksi->kuantitas_sewa}}</td>
        <td>{{$transaksi->biaya_sewa}}</td>
        <td>{{$transaksi->tanggal_peminjaman}}</td>
        <td>{{$transaksi->tanggal_peminjaman}}</td>
        <td>{{$transaksi->tanggal_pengembalian}}</td>
        <td><a data-toggle="modal" data-target="#gambar"><img id="myImg" width="100px" height="100px" class="img-responsive" src="{{ asset('image/ktp/' . $transaksi->foto_ktp_penyewa) }}" /></a></td>
        @if($transaksi->status->status_konfirmasi == 1 && $transaksi->status->status_penolakan == 1)
          <td>Permohanan ditolak oleh pemilik</td>
        @else
            @if($transaksi->status->status_konfirmasi ==0 && $transaksi->status_peminjaman == 0)
                <td>Permohonan belum dikonfirmasi oleh pemilik  </td>
            @elseif($transaksi->status->status_konfirmasi == 1 && $transaksi->status->status_peminjaman==0)
                <td>Permohonan sudah disetujui oleh pemilik</td>
            @elseif($transaksi->status->status_konfirmasi == 1 && $transaksi->status->status_peminjaman ==1)
                <td>Barang sudah dipinjam oleh penyewa</td>
            @else  
          
            @endif
        @endif
      </tr>

        @endforeach
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
