@extends('templates.header')

@section('konten')

</div>

<script language="Javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script language="Javascript" type="text/javascript" src="mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>


<div class="cart">
	 <div class="container">
		 
		 <div class="col-md-9 cart-items">
             <h1>Transaksi Penyewaan </h1>
             @if($transaksis != NULL)
                @foreach($transaksis as $transaksi)
                @if($transaksi->barang->konfirmasi_admin == 1)  
             
             
             
             
			 <div class="cart-header" style="margin-top: 20px;">
                 
				 <div> {{$transaksi->tanggal_transaksi}}</div>
				 <div class="cart-sec1" style=" border: 1px solid #ccc; background:#fcfdff; box-shadow:0px 2px 3px 0px rgba(0,0,0,0.2); margin-top: 20px;margin-bottom: 50px;border-radius:4px;" >
						<div class="cart-item cyc">
							
                            <img src="{{ asset('image/' . $transaksi->barang->foto_barang) }}" />
						</div>
					   <div class="cart-item-info">
							 <h3><a href="{{route('show.barang',['id_barang'=>$transaksi->barang_id])}}">{{$transaksi->barang->nama_barang}}</a><span>Pemilik :: <a href="{{route('show_user',['id'=>$transaksi->pemilik->id])}}"> {{$transaksi->pemilik->name}}</a><br>No Hp   :: {{$transaksi->pemilik->no_hp}} </span></h3>
							 <br>
							 Jumlah yang disewa:: {{$transaksi->kuantitas_sewa}}<br>
                           Biaya harian : {{$transaksi->barang->harga_barang}}<br>
                            Tanggal peminjaman : {{$transaksi->tanggal_peminjaman}}<br>
                           Tanggal pengembalian : {{$transaksi->tanggal_pengembalian}}<br>
                           
                           <h4 align ="right" >Total : <span>Rp. </span>{{$transaksi->biaya_sewa}}</h4>
                           
							 
					   </div>
					   <div class="clearfix"></div>	
                     <div class="delivery"> 
                         
                    @if($transaksi->status->status_penolakan == 0)     
                        @if($transaksi->status->status_konfirmasi == 1)
				            @if($transaksi->status->status_peminjaman == 0)
                         <br>
                            <span><font color="black">Permohonan sudah disetujui pemilik</font>
                         <div class="btn_form" align="right"><a href="{{route('detail_transaksi',['id_transaksi'=>$transaksi->id_transaksi])}}">Details</a>
                            
                             </div>   </span>
                         
                            @elseif($transaksi->status->status_peminjaman == 1 )
                         <br>
                         <span><font color="black">Barang sudah kamu pinjam</font>
                              <div class="btn_form" align="right"><a href="{{route('detail_transaksi',['id_transaksi'=>$transaksi->id_transaksi])}}">Details</a>
                         </div>
                        </span>
                         
                            @endif
                         @elseif($transaksi->status->konfirmasi ==0)
                         <br>
                         <span><font color="black">Permohonan belum disetujui pemilik</font></span>
                         @endif
                    @else
                         <br>
                        <span><font color="red">Permohonan ditolak pemilik</font></span>
                     
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
        
                
    </div>
		




    
</div>
<script type="text/javascript">

function demoFromHTML() {
    var pdf = new jsPDF('l', 'pt', 'A5');
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
        top: 5,
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
