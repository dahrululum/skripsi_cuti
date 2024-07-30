@extends($layout)
@section('styles')
 
  <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts')  
<script src="{{ url('lte/plugins/select2/js/select2.full.js') }}"></script>

 
 
<script> 
$ ( function () {
    $('.select2').select2();
     
})
</script>
  <script> 
  
   //dialog
   $('#modal_upload').on('show.bs.modal', function(e) {

    var jenis = $(e.relatedTarget).data('jenis');
    $(e.currentTarget).find('input[name="jenis"]').val(jenis);

    var button = $(e.relatedTarget) // Button that triggered the modal
    var recipient = button.data('jenis') // Extract info from data-* attributes
    var uniqid = $("#alias").val(); 
     
    var modal = $(this)
    modal.find('.modal-title').text('Dialog Cari Nomor Permohonan Cuti ')

    var appurl = {!! json_encode(url('/admin/dialog_cari_nopc/')) !!};
        // var deturl = appurl+'/'+uniqid+'/'+jenis;
        
        $("#viewupload").load(appurl);    

    
 
    });  
    //riwayat
    $('#modal_riwayatcuti').on('show.bs.modal', function(e) {

        var idpegawai = $(e.relatedTarget).data('idpegawai');
        var nopc = $(e.relatedTarget).data('nopc');
        var button = $(e.relatedTarget) // Button that triggered the modal
        
        
        var modal = $(this)
        modal.find('.modal-title').text('Dialog Riwayat Cuti Pegawai ')

        var appurl = {!! json_encode(url('/admin/dialog_riwayatcuti/')) !!};
             var deturl = appurl+'/'+idpegawai+'/'+nopc;
            
            $("#viewriwayat").load(deturl);    



    });  

    function getBACK(nopc,idpegawai){
        $('#modal_upload').modal('hide');
            $('#ressnopc').html(" <input type='text' class='form-control form-control-sm' id='nopc' name='nopc' value='"+nopc+"' readonly required>");
            $("#detailpeg").load("detail_pegawai/"+idpegawai+'/'+nopc);
           
           
           // console.log();  
        
        
    }

  </script>

@endsection
@section('content')
<div class="modal fade"id="modal_upload" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Dialog Cari No. Permohonan Cuti </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="viewupload"></div>
             

        </div>
      </div>
    </div>
</div>
<div class="modal fade"id="modal_riwayatcuti" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Dialog Riwayat Cuti Pegawai </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="viewriwayat"></div>
             

        </div>
      </div>
    </div>
</div>
<div class="">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header"><b>Verifikasi FPPC</b> {{ $iduser }} {{ Auth::guard('admin')->user()->id_admin }}</div>
                <form action="{{url('admin/post-addfppc')}}" method="POST" id="regForm" class="form-horizontal">
                <div class="card-body">
                   {{ csrf_field() }}
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label " for="nofppc">No FPPC</label>
                        <div class="col-sm-2">
                        <input class="form-control form-control-sm " id="nofppc" type="text" name="nofppc" value="{{ $nourut }}"  readonly/>
                        
                        </div> 
                        <label class="col-sm-3 col-form-label text-right" for="judul">Tanggal FPPC</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm datepicker" id="tglfppc" type="text" name="tglfppc" required />
                            
                        </div> 
                    </div>
                     
                    <hr>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Pilih No. Permohonan Cuti</label>
                        <div class="col-sm-1" id="ressnopc">
                            <input class="form-control form-control-sm " id="nopc" type="text" name="nopc" placeholder="No. PC"   readonly />
                            
                        </div> 
                        <div class="col-sm-4">
                            <a href="#modal_upload" data-toggle="modal" class="btn btn-sm btn-primary"  ><i class="fa fa-search"></i> Pilih No. Permohonan Cuti</a>
                        </div>
                    </div>
                    <div id="detailpeg"></div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Catatan Cuti</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm " id="catatan_cuti" type="text" name="catatan_cuti"    />
                            
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Atasan Langsung </label>
                        <div class="col-sm-5">
                            <input class="form-control form-control-sm " id="atasan_langsung" type="text" name="atasan_langsung"  required  />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Catatan Atasan</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm " id="catatan_atasan" type="text" name="catatan_atasan"    />
                            
                        </div> 
                    </div>
                     
                   
                                
                     
                </div>
                <div class="card-footer"> 
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 