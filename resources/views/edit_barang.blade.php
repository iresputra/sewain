@extends('templates.header')

@section('konten')
</div>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
   $(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
    
</script>

<style type="text/css">
    body {
    padding-top: 0px;
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    margin-top: 100px;
    margin-bottom: 100px;
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
    
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

    </style>




<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="center">
								<a href="#" id="register-form-link"><h3>Tambah Barang</h3> </a>
							</div>
						</div>
						<hr>
					</div>
                    <div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								 <form method="post" role="form" action="{{route('update.barang',['id_barang'=>$data->id_barang])}}"> 
                                    {{ csrf_field() }}
									<div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">

                                    <label for="nama_barang">Nama Barang</label>
                                    <input value="{{$data->nama_barang}}" id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}" required autofocus readonly   >

                                @if ($errors->has('nama_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_barang') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
									<div class="form-group{{ $errors->has('kuantitas_barang') ? ' has-error' : '' }}">

                                    <label for="kuantitas_barang">Kuantitas barang</label>
                                    <input value="{{$data->kuantitas_barang}}" name="kuantitas_barang" type="number" min="1"  class="form-control" id="exampleInputPassword1" placeholder="Masukan Jumlah Barang" required> 

                                @if ($errors->has('kuantitas_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kuantitas_barang') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
									
                        <div class="form-group{{ $errors->has('harga_barang') ? ' has-error' : '' }}">

                                    <label for="harga_barang">Harga barang</label>
                                    <input name="harga_barang" type="number" min="10000" max="10000000" value="{{$data->harga_barang}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga Barang" required> 

                                @if ($errors->has('harga_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga_barang') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                                    
                        <div class="form-group">
                    <label for="exampleTextarea">Deskripsi Barang</label>
                    <textarea name="deskripsi_barang" value="{{$data->deskripsi_barang}}" class="form-control" id="exampleTextarea" rows="6" required></textarea>
                    
                    @if ($errors->has('deskripsi_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi_barang') }}</strong>
                                    </span>
                                @endif
                </div>
                                    
                        <div class="form-group">
                    <label for="exampleInputFile">Upload Gambar Barang</label>
                    <input type="file" value="{{ old('fotobarang') }}" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="fotobarang" required> <small id="fileHelp" class="form-text text-muted">Ukuran tidak boleh lebih dari 500kb</small> 
                
                        @if ($errors->has('fotobarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fotobarang') }}</strong>
                                    </span>
                                @endif
                </div>

									<div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" required> Check me out </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection





























































