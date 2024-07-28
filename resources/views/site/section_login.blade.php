<section class="welcome " id="login">
    
    <div class="container">
      <h2 class="text-center">
        Login Pegawai
      </h2>
      <div class="row">
        <div class="login-box col-md-12">
          <div class="card blur border-light mb-2">
              
  <div class="card-header bg-dark">
    <h3 class="text-center text-light mt-2">  SIMTI 2024 </h3>
  </div>
              <div class="card-body ">
                  <form method="POST" action="{{url('pegawai/postlogin')}}" class="form">
                      @csrf
  
                      <div class="form-group">
                          <label for="email" class="text-light">{{ __('Username ') }}</label>
  
                          <div class="">
                              <input id="username" type="text" class="form-control " name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="username" autofocus>
  
                              
                          </div>
                      </div>
  
                      <div class="form-group">
                          <label for="password" class="text-light">{{ __('Password') }}</label>
  
                          <div class="">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
  
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
  
                       
                      <div class="form-group mt-3">
                          
                              <button type="submit" class="btn"><i class="fa fa-lock"></i>
                                  {{ __('Login') }}
                              </button>
  
                              @if (Route::has('password.request'))
                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                      {{ __('Forgot Your Password?') }}
                                  </a>
                              @endif
                          
                      </div>
                  </form>
              </div>
               
          </div>
        </div>
      </div>
      
       

       
    </div>

  </section><!-- End Features Section -->