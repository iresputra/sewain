@extends('templates.header')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript"></script>




<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
                            <div class="alert alert-warning"> Harap memasukan tanggal peminjaman dengan benar</div>
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
                     <img class="img-responsive" src="{{ asset('image/' . $data->foto_barang) }}" /> 
                     <!-- <a>width="300" height="300" style="margin:0px 0px 0px 120px</a> -->
							
					 <div class="details-left-info">
    <h3>{{$data->nama_barang}}</h3>
                         
    <h4></h4>
    <h4></h4>
                         <h5>Biaya sewa per hari : </h5>
    <p>
         <label>Rp.</label> <b>{{$data->harga_barang}}</b>
        
        
        <table>
        <tr>
            <td><div class="btn_form"> <a data-toggle="modal" data-target="#tanggal">Cek</a> </div></td>
            <td><div class="btn_form"> <a data-toggle="modal" data-target="#myModal">Sewa</a> </div></td>
            </tr>
        </table>
                        
                         
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
                        <form method="post" role="form" action="sewa-barang" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input type="hidden" value="{{$data->id_barang}}" name="id_barang">
                                <input type="hidden" value="{{$data->harga_barang}}" name="harga_barang">
                                <input id="jumlah" type="hidden" value="{{$data->user_id}}" name="pemilik_id"> Jumlah Barang Yang Tersedia : {{$data->kuantitas_barang}}
                                <br>
                                <h4>Biaya satuan perhari : {{$data->harga_barang}}</h4> Jumlah yang dipinjam : <br>
                                <input type="number" max="{{$data->kuantitas_barang}}" min="1" max="{{$data->kuantitas_barang}}" name="kuantitas_sewa" value="1" required> </div>
                                
                            
                            
                            Tanggal Peminjaman 
                            
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
	                                               <input class="form-control" type="text" name="tanggalpeminjaman">
	                                               <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                    <script>
                                            $(".input-group.date").datepicker({
                                                format: "dd/mm/yyyy",
                                                autoclose: true, 
                                                todayHighlight: true
                                            });
                                    </script>
                            Tanggal Pengembalian
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
	                                               <input class="form-control" type="text" name="tanggalpengembalian">
	                                               <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>  
                            
                            <label for="exampleInputFile">Upload KTP </label>
                                <input type="file" value="{{ old('fotoktp') }}" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="fotoktp" required> 
                            <small id="fileHelp" class="form-text text-muted">Ukuran tidak boleh lebih dari 500kb</small><br>
                            <h2>Total Biaya :</h2> 
                            <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        
                            
    <script>
                            
    
                            </script>                        
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
                         
         <div id="tanggal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Cek Tanggal Peminjaman</h2> </div>
                    <div class="modal-body">
                        <?php $no=1;
$i=0;?>
           
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal peminjaman</th>
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
                    @endforeach   
                        
                    
                        
                            
                            
                    </tbody>
                        
                        
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>                
                 
                  
        <div class="bike-type">
            <p>JUMLAH BARANG ::{{$data->kuantitas_barang}}</a>
            </p>
            <p>PEMILIK ::<a href="{{route('show_user',['id'=>$data->user->id])}}">{{$data->user->name}}</a></p>
        </div>
        <h5>Deskripsi  ::</h5>
        <p class="desc">{{$data->deskripsi_barang}}</p>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

</div>
@endsection





