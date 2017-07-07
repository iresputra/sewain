@extends('templates.header')

@section('konten')

</div>

<script language="Javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script language="Javascript" type="text/javascript" src="mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>


<div class="cart">
	 <div class="container">
		 
		 <div class="col-md-9 cart-items">
			 <h2>Transaksi Penyewaan </h2>
             @if($transaksis != NULL)
                @foreach($transaksis as $transaksi)
                @if($transaksi->barang->konfirmasi_admin == 1)  
             
             
             
             
			 <div class="cart-header">
                 
				 <div> {{$transaksi->tanggal_transaksi}}</div>
				 <div class="cart-sec1">
						<div class="cart-item cyc">
							
                            <img src="{{ asset('image/' . $transaksi->barang->foto_barang) }}" />
						</div>
					   <div class="cart-item-info">
							 <h3><a href="{{route('show.barang',['id_barang'=>$transaksi->barang_id])}}">{{$transaksi->barang->nama_barang}}</a><span>Pemilik :: <a href="{{route('show_user',['id'=>$transaksi->pemilik->id])}}"> {{$transaksi->pemilik->name}}</a><br>No Hp   :: {{$transaksi->pemilik->no_hp}} </span></h3>
							 <h4>Total : <span>Rp. </span>{{$transaksi->biaya_sewa}}</h4><br>
							 Jumlah yang disewa:: {{$transaksi->kuantitas_sewa}}<br>
                           Biaya harian : {{$transaksi->barang->harga_barang}}<br>
                            Tanggal peminjaman : {{$transaksi->tanggal_peminjaman}}<br>
                           Tanggal pengembalian : {{$transaksi->tanggal_pengembalian}}<br>
                           
							 
					   </div>
					   <div class="clearfix"></div>	
                     <div class="delivery"> 
                         
                    @if($transaksi->status->status_penolakan == 0)     
                        @if($transaksi->status->status_konfirmasi == 1)
				            @if($transaksi->status->status_peminjaman == 0)
                            <span><font color="black">Permohonan sudah disetujui pemilik</font></span>
                         <span><div class="btn_form"><a onclick="javascript:demoFromHTML();">Unduh Transaksi</a>
                            <a href="{{route('konfirmasi_penerimaan',['transaksi_id'=>$transaksi->id_transaksi])}}">Konfirmasi Penerimaan</a>
                             </div>   </span>
                         
                            @elseif($transaksi->status->status_peminjaman == 1 )
                         <span><font color="black">Barang sudah kamu pinjam</font></span>
                            @endif
                         @elseif($transaksi->status->konfirmasi ==0)
                         <span><font color="black">Permohonan belum disetujui pemilik</font></span>
                         @endif
                    @else
                        <span><font color="red">Permohonan ditolak pemilik</font></span>
                         <span><div class="btn_form"><a href="{{route('detail_transaksi',['id_transaksi'=>$transaksi->id_transaksi])}}"> Detail</a></div></span>
                    @endif
				        <div class="clearfix"></div>
				    </div>		
				  </div>
                    @endif 
				  </div>
                     @endforeach
             @else
                <h1>Kamu belum memiliki transaksi apapun</h1>
             @endif
              </div>
            
             
              <div class="col-md-3 cart-total">
			 <div class="price-details">
				 <h3>Barang yang ingin dipinjam</h3>
				 <span>Confirmed</span>
				 <span class="total">-----</span>
				 <span>Unconfirmed</span>
				 <span class="total">-----</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">TOTAL</h4>
			 <span class="total final">{{$transaksis->count()}}</span>
			 <div class="clearfix"></div>
			 
			 
         </div>
                
    </div>
		 </div>


<div id="transaksi">
    TES
</div>
<script type="text/javascript">

function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#transaksi')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        pdf.save('Sewain_Transaksi.pdf');
    }, margins);
}


</script>
		 

@endsection
