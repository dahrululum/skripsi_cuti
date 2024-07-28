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
                <div class="card-header"><b>Tambah Permohonan Cuti Pegawai</b> {{ $iduser }} {{ Auth::guard('admin')->user()->id_admin }}</div>
                <form action="{{url('admin/post-addajucuti')}}" method="POST" id="regForm" class="form-horizontal">
                <div class="card-body">
                   {{ csrf_field() }}
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label " for="judul">No Permohonan Cuti (PC)</label>
                        <div class="col-sm-2">
                        <input class="form-control form-control-sm " id="nopc" type="text" name="nopc" value="{{ $nourut }}"  readonly/>
                        
                        </div> 
                        <label class="col-sm-3 col-form-label text-right" for="judul">Tanggal Permohonan Cuti (PC)</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm datepicker" id="tglpc" type="text" name="tglpc" placeholder="" />
                            
                        </div> 
                    </div>
                     
                    <hr>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Jenis Cuti</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" name="jenis_cuti" id="jenis_cuti"  required>
                                <option value="">Pilih Jenis Cuti </option>
                                <?php 
                                  $level = 0;
                                  $strip = "--"; 
                                ?>
                                @foreach ($jc as $jc)
                                    <option value="{{ $jc->kd_jenis_cuti }}">  {{ $jc->kd_jenis_cuti }}. {{ $jc->nm_jenis_cuti }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($levuser==1)
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2">Pilih Pegawai</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm select2" name="id_pegawai" id="id_pegawai"  required>
                                <option value="">Pilih Pegawai </option>
                                <?php 
                                  $level = 0;
                                  $strip = "--"; 
                                ?>
                                @foreach ($peg as $pd)
                                    <option value="{{ $pd->id_pegawai }}">  {{ $pd->nip }}. {{ $pd->nama_pegawai }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="card card-dark">
                                <div class="card-header">Detail Pegawai</div>
                                <div class="card-body bg-light">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="judul">ID Pegawai</label>
                                        <div class="col-sm-5">
                                        <input class="form-control form-control-sm " id="id_pegawai" type="text" name="id_pegawai" value="{{ $peg->id_pegawai  }}"  readonly/>
                                        
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="judul">NIP Pegawai</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm " id="nip" type="text" name="nip" value="{{ $peg->nip }}" readonly />
                                            
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="judul">Nama Pegawai</label>
                                        <div class="col-sm-5">
                                            <input class="form-control form-control-sm " id="nama_pegawai" type="text" name="nama_pegawai" value="{{ $peg->nama_pegawai }}" readonly />
                                            
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2">Unit Kerja</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-control-sm " name="kd_unitkerja" id="kd_unitkerja"  readonly>
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
                                        <div class="col-sm-4">
                                            <select class="form-control form-control-sm " name="kd_jabatan" id="kd_jabatan"  readonly>
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
                                        <label for="inputEmail" class="col-sm-2">Pangkat/Golongan</label>
                                        <div class="col-sm-4">
                                            <select class="form-control form-control-sm " name="kd_pangkat" id="kd_pangkat"  readonly>
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
                                        <div class="col-sm-2">
                                            <select class="form-control form-control-sm " name="kd_golongan" id="kd_golongan"  readonly>
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
                                        <label class="col-sm-2 col-form-label" for="judul">Alamat</label>
                                        <div class="col-sm-9">
                                            <input class="form-control form-control-sm " id="alamat" type="text" name="alamat" value="{{ $peg->alamat }}" readonly />
                                            
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="judul">No. HP</label>
                                        <div class="col-sm-2">
                                            <input class="form-control form-control-sm " id="nohp" type="text" name="nohp" value="{{ $peg->nohp }}" readonly />
                                            
                                        </div> 
                                    </div>
                                     
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    @endif
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
                            <input class="form-control form-control-sm " id="lamacuti" type="number" name="lamacuti" value=" "  />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Alamat Cuti</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm " id="alamatcuti" type="text" name="alamatcuti" value=" "  />
                            
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="judul">Alasan</label>
                        <div class="col-sm-10">
                            <input class="form-control form-control-sm " id="alasancuti" type="text" name="alasancuti" value=" "   />
                            
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
 