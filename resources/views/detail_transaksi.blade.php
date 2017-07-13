@extends('templates.header')

@section('konten')
</div>

<script language="Javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script language="Javascript" type="text/javascript" src="mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
</div>
<div class="cart">
	 <div class="container">
		 
		 <div class="col-md-9 cart-items">
			 <h2>Detail Transaksi</h2>
            
              
             
             
             
             
			 <div class="cart-header">
                 
				 <div> {{$data->tanggal_transaksi}}</div>
				 <div class="cart-sec1">
						<div class="cart-item cyc">
							
                            <img src="{{ asset('image/' . $data->barang->foto_barang) }}" />
						</div>
					   <div class="cart-item-info">
							 <h3><a href="{{route('show.barang',['id_barang'=>$data->barang_id])}}">{{$data->barang->nama_barang}}</a><span>Pemilik :: <a href="{{route('show_user',['id'=>$data->pemilik->id])}}"> {{$data->pemilik->name}}</a><br>No Hp   :: {{$data->pemilik->no_hp}} </span></h3>
                           <h4>Total : <span>Rp. </span>{{$data->biaya_sewa}}</h4><br>
							 Jumlah yang disewa:: {{$data->kuantitas_sewa}}<br>
                            Biaya harian : {{$data->barang->harga_barang}}<br>
                            Tanggal peminjaman : {{$data->tanggal_peminjaman}}<br>
                           Tanggal pengembalian : {{$data->tanggal_pengembalian}}<br>
                           
							 
					   </div>
					   <div class="clearfix"></div>	
                     <div class="delivery"> 
                         
                    @if($data->status->status_penolakan == 0)     
                        @if($data->status->status_konfirmasi == 1)
				            @if($data->status->status_peminjaman == 0)
                            <span><div align="right"><font color="black"> Permohonan sudah disetujui pemilik</font></div>
                         <div class="btn_form" style="cursor:pointer"><a href="javascript:demoFromHTML();">Unduh Transaksi</a>
                             <a href="{{route('konfirmasi_penerimaan',['transaksi_id'=>$data->id_transaksi])}}"> konfirmasi Penerimaan </a></div></span>
                            @elseif($data->status->status_peminjaman == 1 )
                         <span><font color="black">Barang sudah kamu pinjam</font>
                             <div class="btn_form" style="cursor:pointer"><a href="#" class="unduh">Unduh Transaksi</a></div></span>
                            @endif
                         @elseif($data->status->konfirmasi ==0)
                         <span><font color="black">Permohonan belum disetujui pemilik</font></span>
                         @endif
                    @else
                        <span><font color="red">Permohonan ditolak pemilik</font></span>
                         <span><div class="btn_form"><a href="{{route('detail_transaksi',['id_transaksi'=>$data->id_transaksi])}}"> Detail</a></div></span>
                    @endif
				        <div class="clearfix"></div>
				    </div>		
				  </div>
                   
				  </div>
                 
            
              </div>
    </div>
</div>

  <div id="transaksi" style="display:none">
    
   
    <span>transaksi via sewain</span><br>
    <span>tanggal : </span>
    <h2> PIHAK PENYEWA</h2>
    <div class="display:none">Nama Penyewa : {{$data->user->name}}</div>
    <div class="display:none"> Alamat Penyewa : {{$data->user->alamat}}</div>
    <div class="display:none"> No Handphone : {{$data->user->no_hp}}</div>
    <div class="display:none">Email : {{$data->user->email}}</div>
    <div class="display:none">No. KTP {{$data->user->no_ktp}}</div>
    <div>---------------------------------</div>
    
    <h2>TRANSAKSI DENGAN</h2>
    
    <div>Nama Pemilik : {{$data->pemilik->name}}</div>
    <div>Barang : {{$data->barang->nama_barang}}</div>
    <div>Jumlah Unit : {{$data->kuantitas_sewa}}</div>
    <div>Biaya Unit Perhari : Rp. {{$data->barang->harga_barang}}</div>
    <div>Tanggal penyewaan : {{$data->tanggal_peminjaman}}</div>
    <div>Tanggal pengembalian : {{$data->tanggal_pengembalian}}</div>
    <h2>TOTAL : Rp. {{$data->biaya_sewa}}</h2>
  
    <div align="left">Pihak Pemilik</div>
    
     </div>



<script type="text/javascript">

$('.unduh').on('click touchstart', demoFromHTML);

    function demoFromHTML() {
    var pdf = new jsPDF('l', 'pt', 'A5');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#transaksi').on('click touchstart')[0];

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


</script>


@endsection