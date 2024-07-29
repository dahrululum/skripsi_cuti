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

    //   if($("#uniqid").val() == null){
    //     $("#viewupload").html("<h4 class='text-danger text-center'><i class='fa fa-exclamation'></i> Uniq ID tidak boleh kosong</h4>");
      
    //   }else{
       
    //     $("#viewupload").load("dialog_upload/"+uniqid);
    //   }
 
    });  

    function getBACK(nopc,idpegawai){
        $('#modal_upload').modal('hide');
            $('#ressnopc').html(" <input type='text' class='form-control form-control-sm' id='nopc' name='nopc' value='"+nopc+"' readonly required>");
            $("#detailpeg").load("detail_pegawai/"+idpegawai);
           
           
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

<div class="">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header"><b>Verifikasi FPPC</b> {{ $iduser }} {{ Auth::guard('admin')->user()->id_admin }}</div>
                <form action="{{url('admin/post-addfppc')}}" method="POST" id="regForm" class="form-horizontal">
                <div class="card-body">
                   {{ csrf_field() }}
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label " for="judul">No FPPC</label>
                        <div class="col-sm-2">
                        <input class="form-control form-control-sm " id="nopc" type="text" name="nopc" value="{{ $nourut }}"  readonly/>
                        
                        </div> 
                        <label class="col-sm-3 col-form-label text-right" for="judul">Tanggal FPPC</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm datepicker" id="tglfppc" type="text" name="tglfppc" placeholder="" />
                            
                        </div> 
                    </div>
                     
                    <hr>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Pilih ID Permohonan Cuti</label>
                        <div class="col-sm-1" id="ressnopc">
                            <input class="form-control form-control-sm " id="nopc" type="text" name="nopc" placeholder="No. PC" readonly />
                            
                        </div> 
                        <div class="col-sm-4">
                            <a href="#modal_upload" data-toggle="modal" class="btn btn-sm btn-primary"  ><i class="fa fa-search"></i> Pilih ID Permohonan Cuti</a>
                        </div>
                    </div>
                    <div id="detailpeg"></div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Periode Cuti Pegawai </label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm datepicker" id="tglawal" name="tglawal" value="" placeholder="Tanggal Awal" required >
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="text-center font-weight-bold mt-1">s/d</div>
                            
                       </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm datepicker" id="tglakhir" name="tglakhir" value="" placeholder="Tanggal Akhir" required >
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">lama Cuti</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm " id="lamacuti" type="number" name="lamacuti"    />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Alamat Cuti</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm " id="alamatcuti" type="text" name="alamatcuti"    />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Alasan</label>
                        <div class="col-sm-10">
                            <input class="form-control form-control-sm " id="alasancuti" type="text" name="alasancuti"     />
                            
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
 