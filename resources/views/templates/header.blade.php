


<!DOCTYPE html>
<html>
<head>
<title>SEWA.IN</title>
<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src"js/jspdf.min.js"></script>
<script type="text/javascript" src="js/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
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
<script src="/js/jquery.easydropdown.js"></script>
<link href="/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="/js/scripts.js" type="text/javascript"></script>
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
		</script>
    
    
    
<!---- start-smoth-scrolling---->
@if(Auth::check())
    <script>
     $(document).ready(function () {
       
    $('#noti_Button').click(function () {

            $('#noti_Counter').fadeOut('fast');                 // HIDE THE COUNTER.
             
            window.location.href = "{{route('transaksi.user',['user_id'=>Auth::user()->id])}}";
             
            return false;
    
        });
    });
    
    </script>
    
    @endif
<style>
    #noti_Counter {
        display:block;
        position:absolute;
        background:#E1141E;
        color:#FFF;
        font-size:12px;
        font-weight:normal;
        padding:1px 3px;
        margin:-2px 0 10px 102px;
        border-radius:2px;
        -moz-border-radius:2px; 
        -webkit-border-radius:2px;
        z-index:1;
        
    }
     
    
    </style>

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
<div class="banner-bg banner-sec">	
	  <div class="container">
			 <div class="header">
			       <div class="logo">
						 <a href="{{route('index')}}"><img src="/images/logos.png" alt=""/></a>
				   </div>							 
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
						  <li class="dropdown1"><a href="{{route('show_prosedur')}}">PROSEDUR PENYEWAAN</a>
							  <ul class="dropdown2">
																					
							  </ul>
						  </li>
                           
                
						<!--  <li class="dropdown1"><a href="parts.html">PARTS</a>
							 <ul class="dropdown2">
									<li><a href="parts.html">CHAINS</a></li>
									<li><a href="parts.html">TUBES</a></li>
									<li><a href="parts.html">TIRES</a></li>
									<li><a href="parts.html">DISC BREAKS</a></li>
							  </ul>
						 </li>      
						 <li class="dropdown1"><a href="accessories.html">ACCESSORIES</a>
							 <ul class="dropdown2">
									<li><a href="accessories.html">LOCKS</a></li>
										<li><a href="accessories.html">HELMETS</a></li>
										<li><a href="accessories.html">ARM COVERS</a></li>
										<li><a href="accessories.html">JERSEYS</a></li>
							  </ul>
						 </li>-->
                           @if(Auth::guest())
                         <li class="dropdown1"><a href="{{route('login')}}">Login</a>
                            
							
						 </li>
                           @else
                        <li id="noti_Button" class="dropdown1">
                            <div id="noti_Counter">
                            @foreach($datas as $notif)
                                @if($notif->user_id == Auth::user()->id)
                                <?php $jumnotifikasi= $jumnotifikasi+1; ?>
                                @endif
                            @endforeach
                            @if($jumnotifikasi>0)
                            {{$jumnotifikasi}}
                            @endif
                            
                            </div><a href="{{route('transaksi.user',['user_id'=>Auth::user()->id])}}">TRANSAKSI</a>
                            
              
                              

						  </li>

						  </li>
                           <li><a class="page-scroll" href="{{route('tambah_barang')}}">Sewakan Barang</a> </li>
                          
                           <li class="dropdown1"><a href="#">{{Auth::user()->name}}</a>
							 <ul class="dropdown2">
									<li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <font color="black"> Logout </font>
                                        </a>
									<li><a href ="{{route('barang_anda')}}"><font color="black">Barang Anda</font></a></li>
                                        <li><a href="{{route('show_my_profile')}}"><font color="black">Profil Anda</font></a></li>
                                        <li><a href="{{route('cek_peminjaman')}}"><font color="black">Log Peminjaman Barang</font></a></li>
							  </ul>
						 </li>
                           @endif
						  <!--<a class="shop" href="cart.html"><img src="images/cart.png" alt=""/></a>-->
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
					  </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div>
                     
                     @yield('konten')
    
    
<div class="footer">
	 <div class="container wrap">
		<div class="logo2">
			 <a href="{{route('index')}}"><img src="/images/logos1.png" alt=""/></a>
		</div>
		<div class="ftr-menu">
			 <ul>
				 <li><a href="#">CONTACT US!</a></li>
				
			 </ul>
		</div>
		<div class="clearfix"></div>
	 </div>
</div>
</body>
</html> 