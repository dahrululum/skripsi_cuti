@extends($layout)
@section('styles')
 
  <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts') 
  <script> 
  
   //dialog
   $('#modal_upload').on('show.bs.modal', function(e) {

    var jenis = $(e.relatedTarget).data('jenis');
    $(e.currentTarget).find('input[name="jenis"]').val(jenis);

    var button = $(e.relatedTarget) // Button that triggered the modal
    var recipient = button.data('jenis') // Extract info from data-* attributes
    var uniqid = $("#alias").val(); 
     
    var modal = $(this)
    modal.find('.modal-title').text('Dialog Upload ' + jenis)

    var appurl = {!! json_encode(url('/admin/dialog_uploadwl/')) !!};
        var deturl = appurl+'/'+uniqid+'/'+jenis;
        
        $("#viewupload").load(deturl);    

    //   if($("#uniqid").val() == null){
    //     $("#viewupload").html("<h4 class='text-danger text-center'><i class='fa fa-exclamation'></i> Uniq ID tidak boleh kosong</h4>");
      
    //   }else{
       
    //     $("#viewupload").load("dialog_upload/"+uniqid);
    //   }
 
    });  

    function getBACK(namafile,label){
        if(label=="foto"){
            $('#ressnamafilefoto').html(" <input type='text' class='form-control form-control-sm' id='namafilecover' name='namafilecover' value='"+namafile+"' readonly required>  ");
        }
        if(label=="file"){
            $('#ressnamafileunduh').html(" <input type='text' class='form-control form-control-sm' id='namafileunduh' name='namafileunduh' value='"+namafile+"' readonly required>");
        }
       
        
            $('#modal_upload').modal('hide');
           
           // console.log();  
        
        
    }

  </script>

@endsection
@section('content')
<div class="modal fade"id="modal_upload" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Dialog Upload File</h4>
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
                <div class="card-header"><b>Edit Unitkerja</b></div>
                <form action="{{url('admin/post-editunitkerja')}}" method="POST" id="regForm" class="form-horizontal">
                <div class="card-body">
                   {{ csrf_field() }}
                    
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="judul">Kode Unitkerja</label>
                    <div class="col-sm-2">
                    <input class="form-control form-control-sm " id="kd_unitkerja" type="text" name="kd_unitkerja" value="{{ $un->kd_unitkerja }}"  readonly/>
                       
                    </div> 
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="judul">Nama Unitkerja</label>
                      <div class="col-sm-9">
                      <input class="form-control form-control-sm " id="nm_unitkerja" type="text" name="nm_unitkerja" value="{{ $un->nm_unitkerja }} " />
                         
                      </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="desk">Alamat</label>
                    <div class="col-sm-9">
                      <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control form-control-sm ket">
                        {!! $un->alamat !!}
                      </textarea>
                       
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
 