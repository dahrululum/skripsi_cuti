    <?php $ynow=date('Y');?>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a href="{{ url('/') }}" class="navbar-brand text-sm">
                <img src="{{ asset('/images/logo_sikepang.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .9">
                <span class="brand-text font-weight-bold">SIKEPANG BKPSDMD Provinsi Kepulauan Bangka Belitung   </span>
            </a>
        </li>
         
      </ul>
  
      
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
         
        <!-- Notifications Dropdown Menu -->
         
        <li class="nav-item d-none d-sm-inline-block nav-item d-none d-sm-inline-block  mr-1"><a class="nav-link bg-primary" href="<?= url('/'); ?>"><i class="nav-icon fas fa-home"></i>  Home</a></li>
        <li class="nav-item d-none d-sm-inline-block nav-item d-none d-sm-inline-block  mr-1"><a class="nav-link bg-success" href="<?= url('/usulan/petunjuk'); ?>"><i class="nav-icon fas  fa-life-ring"></i>  Petunjuk Penggunaan</a></li>
        <li class="nav-item d-none d-sm-inline-block nav-item d-none d-sm-inline-block  mr-5"><a class="nav-link bg-teal" href="<?= url('/usulan/downloadpernyataan'); ?>"><i class="nav-icon fas  fa-download"></i>  Download Surat Pernyataan</a></li>
         
        <li class="nav-item d-none d-sm-inline-block nav-item d-none d-sm-inline-block  mr-1"><a class="nav-link bg-danger" href="{{url('/usulan/logout')}}"><i class="nav-icon fas fa-power-off"></i>  Logout</a></li>
        <!--
        <li class="nav-item d-none d-sm-inline-block nav-item d-none d-sm-inline-block"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item d-none d-sm-inline-block nav-item d-none d-sm-inline-block"><a class="nav-link" href="#">Contact</a></li>
        !-->
         
      </ul>