@extends('templates.header')

@section('konten')
</div>
<!--/banner-->



<div class="parts">
	 <div class="container">
		 <h2>Katalog Barang</h2>
		 <div class="bike-parts-sec">
		      <div class="bike-parts">
				 <div class="top">
					 <ul>
						 <li><a href="{{route('index')}}">HOME </a>::  KATALOG BARANG</li>
						 
					 </ul>				 
				 </div>
				 <div class="bike-apparels">
					 <div class="parts1">
                         @foreach($barangs as $barang)
                        
						 <a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}"><div class="part-sec">					 
							  <img src="{{ asset('image/' . $barang->foto_barang) }}" width="300" height="300" alt=""/>
							 <div class="part-info">
								 <a href="#"><h5>{{$barang->nama_barang}}<span>Rp.{{$barang->harga_barang}}</span></h5></a>
								 
                                 <a href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}" class="qck">Lihat</a>
                             </div>
                                 
                             </div>
                         
                         </a>
                         @endforeach
						 
                         
					 </div>
					 
					
					 
					
					 
					
					
				 </div>
                 
			 </div>
             
         </div>
         
    </div>
    <div class="clearfix"><center>{{$barangs->links()}}</center></div>
         </div>
    
@endsection       




















































<!--<div class="bikes">		 
	 <div class="mountain-sec">
		 <h2>KATALOG</h2>
         @foreach($barangs as $barang)
		 <a href="single.html"><div class="bike">				 
			 <img src="{{ asset('image/' . $barang->foto_barang) }}" width="300" height="300"/>
		     <div class="bike-cost">
					 <div class="bike-mdl">
                         <h4>{{$barang->nama_barang}}</h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="{{route('show.barang',['id_barang'=>$barang->id_barang])}}">LIHAT</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 
			 </div></a>
         @endforeach
			 <div class="clearfix"></div>
	  </div> 
		 </div>
		 
	 </div>
</div>-->

<!---->









