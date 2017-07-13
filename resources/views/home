

<!DOCTYPE html>
<html>
<head>
<title>SEWA.IN</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
<!--webfont-->
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/scripts.js" type="text/javascript"></script>
<!--js-->
<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script><script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        
    </script>
<!---- start-smoth-scrolling---->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
  

<!--banner-->
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
@extends('templates.master_home')
    @section('konten') 
     <div class="caption">
		 <div class="slider">
					   <div class="callbacks_container">
						   <ul class="rslides" id="slider">
							    <li><h1>SEWA BARANG JADI LEBIH MUDAH</h1></li>
								
						  </ul>
						  <p>Ngapain<span> beli</span> kalau <span>bisa </span><span>nyewa?</span></p>
						  <a class="morebtn" href="{{route('katalog_barang')}}">SEWA SEKARANG</a>
					  </div>
				  </div>
	 </div>
	 			 
</div>
    
<!--/banner-->
<div id="cate" class="categories">
	 <div class="container">
		 <h3>APA ITU SEWA.IN ? </h3>
		 <div class="categorie-grids">
             <font size"500"><b>SEWA.IN</b> adalah rental marketplace yang mempertemukan pemilik barang dengan penyewa barang. Pengguna dapat hemat uang dengan menyewa barang yang hanya digunakan sementara waktu, dan dapat mendapatkan uang dengan menyewakan barang yang tidak terpakai. Semua dapat dilakukan di SEWA.IN.<br><br>
            SEWA.IN bertujuan untuk menjadi sebuah platform rental marketplace yang  nyaman digunakan bagi para pemilik barang sewaaan dan penyewa dengan memberikan kebebasan bagi para penyewa untuk menentukan sendiri periode penyewaan. <br><br>
         <b>Barang-barang yang tercantum dalam website SEWA.IN tidak dimiliki secara fisik oleh SEWA.IN.</b></font>
			 <!--<a href="bicycles.html"><div class="col-md-4 cate-grid grid1">
				 <h4>FIXED / SINGLE SPEED</h4>
				 <p>Are you ready for the 27.5 Revloution ?</p>
				 <a class="store" href="bicycles.html">GO TO STORE</a>
			 </div></a>
			 <a href="bicycles.html"><div class="col-md-4 cate-grid grid2">
				 <h4>PREMIMUM SERIES</h4>
				 <p>Exclusive Bike Components</p>
				 <a class="store" href="bicycles.html">GO TO STORE</a>
			 </div></a>
			 <a href="bicycles.html"><div class="col-md-4 cate-grid grid3">
				 <h4>CITY BIKES</h4>
				 <p>Street Playground</p>
				 <a class="store" href="bicycles.html">GO TO STORE</a>
			 </div></a>-->
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
    

<!--bikes-->
<div class="bikes">	
    
		 <h3>KATALOG TERBARU</h3>
		 <div class="bikes-grids">			 
			 <ul id="flexiselDemo1">
                 @foreach($barangs as $barang)
    @if($barang->konfirmasi_admin==1)
				 <li>
                     <a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}"><img src="{{ asset('image/' . $barang->foto_barang) }}" width="300" height="300"/></a>
					 <div>
						 <div class="model">
							 <h4><a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}">{{$barang->nama_barang}}</a><span>Rp.{{$barang->harga_barang}}</span></h4>							 
						 </div>
						 				 
						 <div class="clearfix"></div>
					 </div>
					 
				 </li>
                 @endif
    @endforeach
                
		    </ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	</div>
             
</div>
                 
    @endsection
				 
		    </ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	</div>
</div>
    

</body>
</html>
