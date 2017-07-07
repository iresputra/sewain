<!--
<h1>{{$barang}}</h1>

Peminjam : <br>
Pemilik Barang : {{$pemilik}}<br>
Tanggal Peminjaman : {{$tanggal_peminjaman}}<br>
Tanggal pengembalian : {{$tanggal_pengembalian}}
-->

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
  <br><br><br><br>
<h2><p class="text-center">Permohonan Penyewaan Barang</p></h2><br><br><br><br><br><br><br><br>
    <p class="text-right">{{$tanggal_surat}}</p>
<h4>Saya yang bertanda tangan dibawah ini : </h4>
<h4>Nama : {{Auth::user()->name}} </h4>
<h4>E-mail : {{Auth::user()->email}}</h4>
<h4>Alamat : {{$alamat_peminjam}}</h4>
<h4>No. KTP : {{$no_ktp_peminjam}}</h4>
<h4>No. Hp :  {{$no_hp_peminjam}}</h4>

<br><br>
<h4>Dengan ini mengajukan penyewaan barang sebagai berikut: <br><br></h4>
<h4>Pemilik : {{$pemilik}}<br></h4>
<h4>Nama Barang : {{$barang}}<br></h4>
<h4>Jumlah yang disewa : {{$jumlah}}<br></h4>
<h4>Biaya sewa :{{$biaya_sewa}} <br></h4>
<h4>Tanggal Pengambilan : {{$tanggal_peminjaman}}<br></h4>
<h4>Tanggal Pengembalian : {{$tanggal_pengembalian}}<br></h4>
<br><br><br><br><br><br><br><br><br><br>
<h4>Demikian surat permohonan ini saya ajukan,<br></h4>
<table>
    <thead align="left">
        <tr>
            <th align="left">
                Hormat saya,

            </th>
            <th align="right">
               <p class="text-right">Disetujui,</p> 
            </th>
        </tr>
    </thead>
    <tbody>
        <td align="left">
            <br>
            <br>
            <br>____________________________________



        </td>
        <td align="right">
            <br>
            <br>
            <br>
        </td>
    </tbody>
</table>

</body>
</html>
