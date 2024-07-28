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
                <div class="card-header"><b>Edit Pegawai</b></div>
                <form action="{{url('admin/post-editpegawai')}}" method="POST" id="regForm" class="form-horizontal">
                <div class="card-body">
                   {{ csrf_field() }}
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">ID Pegawai</label>
                        <div class="col-sm-2">
                        <input class="form-control form-control-sm " id="id_pegawai" type="text" name="id_pegawai" value="{{ $peg->id_pegawai }}"  readonly/>
                        
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Nama Pegawai</label>
                        <div class="col-sm-5">
                            <input class="form-control form-control-sm " id="nama_pegawai" type="text" name="nama_pegawai" value="{{ $peg->nama_pegawai }}" />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">NIP Pegawai</label>
                        <div class="col-sm-4">
                            <input class="form-control form-control-sm " id="nip" type="text" name="nip" value="{{ $peg->nip }}" />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Unit Kerja</label>
                        <div class="col-sm-3">
                            <select class="form-control form-control-sm select2" name="kd_unitkerja" id="kd_unitkerja"  required>
                                <option value="">Pilih Unitkerja </option>
                                <?php 
                                  $level = 0;
                                  $strip = "--"; 
                                ?>
                                @foreach ($un as $un)
                                    <option value="{{ $un->kd_unitkerja }}" @if($peg->kd_unitkerja==$un->kd_unitkerja) selected @endif>  {{ $un->kd_unitkerja }}. {{ $un->nm_unitkerja }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Jabatan</label>
                        <div class="col-sm-3">
                            <select class="form-control form-control-sm select2" name="kd_jabatan" id="kd_jabatan"  required>
                                <option value="">Pilih Jabatan </option>
                                <?php 
                                  $level = 0;
                                  $strip = "--"; 
                                ?>
                                @foreach ($jab as $jab)
                                    <option value="{{ $jab->kd_jabatan }}" @if($peg->kd_jabatan==$jab->kd_jabatan) selected @endif>  {{ $jab->kd_jabatan }}. {{ $jab->nm_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Pangkat</label>
                        <div class="col-sm-2">
                            <select class="form-control form-control-sm select2" name="kd_pangkat" id="kd_pangkat"  required>
                                <option value="">Pilih Pangkat </option>
                                <?php 
                                  $level = 0;
                                  $strip = "--"; 
                                ?>
                                @foreach ($pa as $pa)
                                    <option value="{{ $pa->kd_pangkat }}" @if($peg->kd_pangkat==$pa->kd_pangkat) selected @endif >  {{ $pa->kd_pangkat }}. {{ $pa->nm_pangkat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Golongan</label>
                        <div class="col-sm-2">
                            <select class="form-control form-control-sm select2" name="kd_golongan" id="kd_golongan"  required>
                                <option value="">Pilih Golongan </option>
                                <?php 
                                  $level = 0;
                                  $strip = "--"; 
                                ?>
                                @foreach ($gol as $gol)
                                    <option value="{{ $gol->kd_golongan }}" @if($peg->kd_golongan==$gol->kd_golongan) selected @endif>  {{ $gol->kd_golongan }}. {{ $gol->nm_golongan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Masa Kerja</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm " id="masa_kerja" type="text" name="masa_kerja" value="{{ $peg->masa_kerja }}" />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Alamat</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm " id="alamat" type="text" name="alamat" value="{{ $peg->alamat }}" />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">No. HP</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm " id="nohp" type="text" name="nohp" value="{{ $peg->nohp }}" />
                            
                        </div> 
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-danger" for="judul">Username</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm " id="username" type="text" name="username" value="{{ $peg->username }}" readonly />
                            
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
 