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

    var appurl = {!! json_encode(url('/admin/dialog_uploadpub/')) !!};
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
                <div class="card-header"><b>Edit Informasi (Weblink)</b></div>
                <form action="{{url('admin/post-editweblink')}}" method="POST" id="regForm" class="form-horizontal">
                <div class="card-body">
                   {{ csrf_field() }}
                    
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="judul">Alias/UniqID</label>
                    <div class="col-sm-2">
                    <input class="form-control form-control-sm " id="alias" type="text" name="alias" value="{{ $alias }}"  readonly/>
                       
                    </div> 
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="judul">Nama Informasi</label>
                      <div class="col-sm-9">
                      <input class="form-control form-control-sm " id="nama" type="text" name="nama" value="{{ $pub->nama }}" />
                         
                      </div> 
                    </div>
                                             
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="desk">Deskripsi</label>
                      <div class="col-sm-9">
                        <textarea name="ket" id="ket" cols="30" rows="10" class="form-control form-control-sm ket">{{ $pub->ket }}</textarea>
                         
                      </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Upload Foto/Gambar </label>
                            <div class="col-sm-2">
                                <a href="#modal_upload" data-toggle="modal" class="btn btn-sm btn-primary" data-jenis="foto" ><i class="fa fa-search"></i> Pilih File</a>
                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_upload" data-jenis="asdasd">Open modal for @mdo</button> --}}

                            </div>
                            
                            <div class="col-sm-5">
                                File Cover: 
                                <span id="ressnamafilefoto">
                                    @if(!empty($pub->file_foto))  
                                    <input type="text" class="form-control form-control-sm col-7 mb-2" id="namafilecover" name="namafilecover" value="{{ $pub->file_foto }}" readonly /> 
                                    <img src="{{ url('downloads/'.$pub->file_foto) }}" width="80" alt=""> 
                                    @else File kosong 
                                    @endif
    
                                </span>
                                </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="judul">Link URL Informasi</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm " id="urlna" type="text" name="urlna" placeholder="masukan Alamat URL" value="{{ $pub->urlna }}" />
                            <p class="text-primary">ex. https://www.babelprov.go.id</p>
                        </div>

                      </div>
                     
                </div>
                <div class="card-footer"> 
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <input type="hidden" class="form-control" name="idna" id="idna" value="{{ $pub->id }}" readonly>
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 