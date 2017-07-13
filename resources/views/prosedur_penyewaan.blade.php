@extends('templates.header')




@section('konten')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

</div>


<script type="text/javascript">

$(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this); //Heading
    var $panel = $this.parent('.panel');
    var $panel_body = $panel.children('.panel-body');
    var $display = $panel_body.css('display');

    if ($display == 'block') {
        $panel_body.slideUp();
    } else if($display == 'none') {
        $panel_body.slideDown();
    }
});

$(document).ready(function(e){
    var $classy = '.panel.autocollapse';

    var $found = $($classy);
    $found.find('.panel-body').hide();
    $found.removeClass($classy);
});
</script>
	 <div class="container">
         <h1 style="margin-top: 40px;margin-bottom:50px;" align="center">Prosedur Penyewaan</h1>

<h3>Bagaimana cara menyewa barang di situs sewain?</h3>
  <div class="panel panel-success autocollapse">
    					<div class="panel-heading clickable">
                            
    						<h3 class="panel-title">
    							   Show
    						</h3>
    					</div>
    					<div class="panel-body">
    						
                             <h3>1. Sebelum kamu menyewa, pastikan kamu sudah melakukan login terlebih dahulu(memiliki akun sewain)</h3>
                             <h3>2. Pilih barang yang ingin kamu sewa</h3>
                             <h3>3. Sebelum menyewa, pastikan barang tersebut tersedia dengan melihat jadwal ketersediaan barang</h3> 
                             <h3>4. Mengisi form penyewaan</h3>
                             <h3>5. Tunggu sampai permohonan sewa kamu diterima oleh pemilik barang </h3>
                             <h3>6. Jika permohonan kamu diterima, segera unduh checkout dan tentukan tanggal dan lokasi COD dengan pemilik barang</h3>
                             <h3>7. Lakukan konfirmasi ketika barang sudah kamu terima</h3>
                             <h3>8. Jika permohonan kamu ditolak, ada beberapa sebab seperti</h3><ul>
                            <li>
                            Barang tidak tersedia pada tanggal yang kamu ajukan
                            </li>
                            <li>
                            Identitas kamu tidak meyakinkan bagi pemilik barang
                            </li>
                            <li>
                            Orang lain sudah menyewa terlebih dahulu barang tersebut sebelum kamu
                            </li>
                            </ul>
    					</div>
         </div>   
<h3>Bagaimana cara mengajukan barang mu agar dapat disewa orang lain?</h3>
 <div class="panel panel-success autocollapse">
    					<div class="panel-heading clickable">
                            
    						<h3 class="panel-title">
    							Show
    						</h3>
    					</div>
    					<div class="panel-body">
    						<h3>1. Login</h3>
                            <h3>2. Klik Sewakan Barang </h3>
                            <h3>3. Mengisi permohonan pengajuan barang</h3>
                            <h3>4. Setelah barang kamu dikonfirmasi oleh admin, maka barang mu akan langsung tersedia di katalog</h3>
                            <h3>5. Jika ditolak, maka ada beberapa sebab seperti :  identitas kamu tidak meyakinkan, kamu tidak mengisi dengan benar dan form pengajuan</h3>
    					</div>
         </div> 
<h3>(PEMILIK BARANG)Melakukan konfirmasi terhadap permohonan sewa yang diajukan penyewa</h3>
 <div class="panel panel-success autocollapse">
    					<div class="panel-heading clickable">
                            
    						<h3 class="panel-title">
    							 Show
    						</h3>
    					</div>
    					<div class="panel-body">
    						<h3>1. Klik "namamu" di pojok kanan</h3>
                            <h3>2. Pilih Log Peminjaman Barang </h3>
                            <h3>3. Konfirmasi/Menolak Permohonan sewa</h3>
                            <h3>4. Dengan mengkonfirmasi "setuju" terhadap permohonana penyewa, maka penyewa akan langsung mendapatkan checkout untuk dicetak</h3>
                            <h3>5. Tentukan jadwal dan lokasi COD untuk pemberian barang dan pembayaran</h3>
                            <h3>6. Setelah pembyaran dilakukan, penyewa akan melakukan konfirmasi terhadap pembayaran</h3>
                            <span>Barang yang sudah kamu setujui permohonan, masih dapat kamu batalkan ketika penyewa melakukan pembatalan</span>
    					</div>
         </div>  



</div>
@endsection