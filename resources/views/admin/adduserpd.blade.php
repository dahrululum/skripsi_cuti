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
                <div class="card-header"><b>Add User Operator Wilayah</b></div>
                <form action="{{url('admin/post-adduserpd')}}" method="POST" id="regForm" class="form-horizontal">
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
                                <option value="{{ $pd->id }}">  {{ $pd->kdwilayah }}. {{ $pd->namawilayah }}</option>
                            @endforeach
                        </select>
                    </div>
                              
                              
                </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="inputFirstName">Nama Lengkap</label>
                      <div class="col-sm-6">
                      <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Nama Lengkap" />
                        @if ($errors->has('name'))
                          <span class="error">{{ $errors->first('name') }}</span>
                          @endif 
                      </div> 
                    </div>
                                             
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputEmailAddress">Email</label>
                      <div class="col-sm-6">
                        <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" />
                        @if ($errors->has('email'))
                          <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputusername">Username</label>
                      <div class="col-sm-4">
                        <input class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" type="text" aria-describedby="usernamehelp" name="username" placeholder="Enter Username" />
                        @if ($errors->has('username'))
                          <span class="error">{{ $errors->first('username') }}</span>
                                    @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-danger" for="inputPassword">Password</label>
                      <div class="col-sm-4">
                        <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                        @if ($errors->has('password'))
                          <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                      </div>
                    </div>
                     
                </div>
                <div class="card-footer">
                    <input class="form-control" id="level" type="hidden" name="level" value="2" />
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    
                </div>						
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 