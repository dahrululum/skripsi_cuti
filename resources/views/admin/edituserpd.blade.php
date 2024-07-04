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
                <div class="card-header"><b>Edit User Operator Wilayah</b></div>
                <form action="{{url('admin/post-edituserpd')}}" method="POST" id="regForm" class="form-horizontal">
                  <div class="card-body">
                   {{ csrf_field() }}
                   <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3">Wilayah</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm select2" name="id_wilayah" id="id_wilayah"  required>
                            <option value="">Pilih Wilayah / Daerah </option>
                            <?php 
                              $level = 0;
                              $strip = "--"; 
                            ?>
                            @foreach ($insta as $pd)
                                <option value="{{ $pd->id }}" @if($pd->id==$user->id_wilayah) selected @endif>  {{ $pd->kdwilayah }}. {{ $pd->namawilayah }}</option>
                            @endforeach
                        </select>
                    </div>
                              
                              
                </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Lengkap</label>
                      <div class="col-sm-6">
                      <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $user->name }}" />
                        
                      </div> 
                    </div>
                                             
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputEmailAddress">Email</label>
                      <div class="col-sm-6">
                        <input class="form-control form-control-sm " id="email" type="email" aria-describedby="emailHelp" name="email" value="{{ $user->email }}" />
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputusername">Username</label>
                      <div class="col-sm-4">
                        <input class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" type="text" name="username" value="{{ $user->username }}" />
                       
                      </div>
                    </div>
                   
                     
                </div>
                <div class="card-footer">
                    <input class="form-control" id="level" type="hidden" name="level" value="2" />
                    <input class="form-control" id="idna" type="hidden" name="idna" value="{{ $user->id }}" />
                    
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 