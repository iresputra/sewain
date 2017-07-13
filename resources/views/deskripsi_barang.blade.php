@extends('templates.header')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


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

<style>
    
    .clickable
{
    cursor: pointer;
}
</style>

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



@section('konten')
</div>
<div class="product">
	 <div class="container">
		 <div class="ctnt-bar cntnt">
			 <div class="content-bar">
				 <div class="single-page">
					 <div class="product-head">
                         @if(session('status'))
                            <div class="alert alert-success"> {{session('status')}}</div>
                         @elseif(session('warning'))
                            <div class="alert alert-warning"> {{session('warning')}}</div>
                         @else
                          @endif
                         
                         @if($errors->has('tanggalpeminjaman'))
                            <div class="alert alert-warning"> Harap memasukan tanggal penyewaan dengan benar</div>
                         @endif
                         @if($errors->has('tanggalpengembalian'))
                            <div class="alert alert-warning"> Harap memasukan tanggal pengembalian dengan benar</div>
                         @endif
                         @if($errors->has('fotoktp'))
                           <div class="alert alert-warning"> Harap perhatikan ukuran/jenis gambar yang anda upload</div>
                         @endif
                        
                         
                        
                         
                         <a href="{{route('index')}}">Home</a> <span>:: <a href="{{route('katalog_barang')}}">Katalog</a> </span>:: <a>{{$data->nama_barang}}</a>	
						</div>
					 <!--Include the Etalage files-->
						<link rel="stylesheet" href="/css/etalage.css">
						<script src="/js/jquery.etalage.min.js"></script>
				<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 400,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
              
		</script>
                     
                     <!-- <a>width="300" height="300" style="margin:0px 0px 0px 120px</a> -->
							
					 <div class="details-left-info">
                         <img class="col-md-6 img-responsive" src="{{ asset('image/' . $data->foto_barang) }}" style=" border: 1px solid #ccc; background:#fcfdff; box-shadow:0px 2px 3px 0px rgba(0,0,0,0.2); margin-bottom:20px;border-radius:4px;"s/> 
                            <div class="col-md-6 cart-total">
			  <h3>{{$data->nama_barang}}</h3>
			  <h5>Biaya sewa per hari : </h5>
  
         <label>Rp.</label> <b>{{$data->harga_barang}}</b><br>
        Jumlah Unit :: <a>{{$data->kuantitas_barang}}</a><br>
        Pemilik :: <a href="{{route('show_user',['id'=>$data->user->id])}}">{{$data->user->name}}</a>
        <h5>Deskripsi  ::</h5>
        <p class="desc">{{$data->deskripsi_barang}}</p>
                                <h2>Tertarik untuk menyewa?</h2>
        <table class="rapih">
        <tr>
            <td><div class="btn_form"> <a data-toggle="modal" data-target="#myModal">Sewa</a> </div></td>
            </tr>
        </table>
        <span>*Pastikan barang ini tersedia pada tanggal yang kamu ajukan</span>
        <div class="panel panel-success autocollapse">
    					<div class="panel-heading clickable">
                            
    						<h5 class="panel-title">
    							 Cek Ketersediaan Barang
    						</h5>
    					</div>
    					<div class="panel-body">
    						<table class="table table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal Penyewaan</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Qty</th>
                        </tr>
                        </thead>
                    <tbody>
                         @foreach($data->status as $set)
                        
                    @if($set->status_peminjaman == 1)
                    
                    <tr>
                    <td>{{$no++}}</td>
                        @foreach($data->transaksi as $histori)
                        @if($histori->id_transaksi == $set->transaksi_id)
                            <td>{{$histori->tanggal_peminjaman}}</td>
                            <td>{{$histori->tanggal_pengembalian}}</td>
                            <td>{{$histori->kuantitas_sewa}}</td>
                        @endif
                        @endforeach
                    </tr>
                    @endif
                        @endforeach   </tbody>
                            </table>
                            
    					</div>
         </div>     
     <div class="col-md-6">
    				
         </div>
                         </div>
        <!--Trigger the modal with a button -->
        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sewa</button>-->
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Form Permintaan Sewa</h2> </div>
                    <div class="modal-body">
                        <form method="post" id="formSewa" role="form" action="sewa-barang" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input type="hidden" value="{{$data->id_barang}}" name="id_barang">
                                <input type="hidden" value="{{$data->harga_barang}}" name="harga_barang">
                                <input class="display:none" id="jumlah" type="hidden" value="{{$data->user_id}}" name="pemilik_id"> Jumlah Barang Yang Tersedia : {{$data->kuantitas_barang}}
                                <br>
                                <h4><div id="biayaBarang" value="{{$data->harga_barang}}">Biaya satuan perhari : {{$data->harga_barang}}</div></h4> Jumlah yang dipinjam : <br>
                                
                                <input id="myNumber" type="number" max="{{$data->kuantitas_barang}}" value="1"min="1" max="{{$data->kuantitas_barang}}" name="kuantitas_sewa" value="1" required> </div>
                                
                            
                            
                            Tanggal Peminjaman 
                            
                            <div class="input-group date" data-date="" data-date-format="dd-mm-yyyy">
	                                               <input class="form-control" type="date" id="tanggalpeminjaman" name="tanggalpeminjaman" value="{{Carbon\Carbon::today()->format('m/d/Y')}}" readonly>
	                                               <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
<script type="text/javascript">
    $.noConflict();
    jQuery(document).ready(function($) {
        $('.input-group date').datepicker();
    });
</script>
             
                            Tanggal Pengembalian
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
	                                               <input class="form-control" type="date" id="tanggalpengembalian" name="tanggalpengembalian" value="{{Carbon\Carbon::tomorrow()->format('m/d/Y')}}" readonly>
	                                               <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>  
                            
                            
                            
                            <label for="exampleInputFile">Upload KTP </label>
                                <input type="file" value="{{ old('fotoktp') }}" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="fotoktp" required> 
                            <small id="fileHelp" class="form-text text-muted">Dengan format file jpeg,png,jpg</small><br>
                            
                           
                            <h5>Total Biaya :</h5> <h2><div id="totalbiaya"></div> </h2>
                            
                            
                            <div class="modal-footer">
        
       
                                <a onclick="totalBiaya()" class="btn btn-primary" href="#"><font color="white">Cek Biaya</font></a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                
      </div>
            <div id="totalbiaya"></div>     
    <script>
                            
    
                            </script>                        
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>              
                 
                  
       
        <div class="form-group{{ $errors->has('no_ktp') ? ' has-error' : '' }}">
            
          
                                    </div>
</div>
<div class="clearfix"></div>
</div>  
</div>
</div>
<script>
    $(".input-group.date").datepicker({
        format: "mm/dd/yyyy",
        autoclose: true,
        todayHighlight: true
    });
</script> 
<script type="text/javascript">
    
    function totalBiaya() {
    var jumlahUnit = document.getElementById('myNumber').value;
        
    var biaya = document.getElementById('biayaBarang').getAttribute('value');

    var date1 = new Date(document.getElementById('tanggalpeminjaman').value);
   
    var date2 = new Date(document.getElementById('tanggalpengembalian').value);
    

        
    var timeDiff = (date2.getTime() - date1.getTime());
    if(timeDiff < 0){
         document.getElementById("totalbiaya").innerHTML = "Cek kembali periode penyewaan";
    }
    
        else{
        
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));   
    
  
    
    document.getElementById("totalbiaya").innerHTML = "Rp. "+diffDays*biaya*jumlahUnit;
            }
    }   
    
   
   
    
</script>
</div>


@endsection





