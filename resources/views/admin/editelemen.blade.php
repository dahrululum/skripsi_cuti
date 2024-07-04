@extends($layout)
@section('styles')
 
  <link rel="stylesheet" href="{{url('lte/plugins/select2/css/select2.min.css') }}">
@endsection
@section('javascripts')
  <script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('lte/plugins/select2/js/select2.full.js') }}"></script>
  <script> 
  $ ( function () {
      $('.select2').select2();
  })
  </script>

@endsection
@section('content')
<div class="">
    <div class="row justify-content-center">
	
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header"><b>Edit Elemen Data</b></div>
                <form action="{{url('admin/post-editelemen')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
                   {{ csrf_field() }}
                   <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-danger" for="alias">ID Uniq</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm " id="alias" type="text"  name="alias" value="{{ $pel->alias }}" readonly />
                        </div>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-sm-3">Pilih Induk Elemen 
                            <p class="small text-primary">*) jika ada/subelemen</p>

                        </label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm select2" name="id_induk" id="id_induk"  >
                                <option value="0">Pilih Elemen Induk </option>
                                <?php 
                                $level = 0;
                                $strip = "--"; 
                                ?>
                                @foreach($elemens as $el)  
                                
                                @include('admin/select-elemen-edit ',[
                                'els'     => $el,
                                'level'   => $level,
                                'strip'   => $strip,
                                ])
                            
                                </option>
                                @endforeach
                            </select>
                        </div>
                                
                                
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="id_jenis">Jenis Elemen</label>
                        <div class="col-sm-3">
                            <select class="form-control form-control-sm select2" name="id_jenis" id="id_jenis"  required>
                                <option value="">Pilih Jenis Elemen </option>
                                <?php 
                                  $level = 0;
                                  $strip = "--"; 
                                ?>
                                @foreach ($jenis as $pd)
                                    <option value="{{ $pd->id }}" @if($pd->id == $pel->id_jenis) selected @endif>  {{ $pd->id }}. {{ $pd->namajenis }}</option>
                                @endforeach
                            </select>
                        
                        </div>
    
                        </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="namaelemen">Nama Elemen Data</label>
                      <div class="col-sm-9">
                      <input class="form-control form-control-sm" id="nama" type="text" name="nama" placeholder="Nama Elemen" value="{{ $pel->nama }}" required />
                       
                      </div> 
                    </div>
                                             
                    
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="sumberdata">Sumber</label>
                      <div class="col-sm-4">
                        <input class="form-control form-control-sm" id="sumber" type="text"   name="sumber" placeholder="Masukan Sumber Data" value="{{ $pel->sumber }}" />
                        
                    </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="ket">Keterangan</label>
                        <div class="col-sm-6">
                          <input class="form-control form-control-sm" id="ket" type="text"  name="ket" placeholder="Masukan Keterangan jika ada" value="{{ $pel->ket }}" />
                          
                        </div>
                    </div>
                     
                     
                </div>
                <div class="card-footer">
                    <input type="hidden" id="idna" name="idna" value="{{ $pel->id }}">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 