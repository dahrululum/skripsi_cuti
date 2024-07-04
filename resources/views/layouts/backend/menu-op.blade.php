<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard {{ Auth::guard('admin')->user()->id_instansi }}</p>
        </a>
    </li>
    <li class="nav-header">Instrumen Data</li>
     @php 
        $idwilayah=Auth::guard('admin')->user()->id_wilayah;
        if(!empty(Auth::guard('admin')->user()->id_wilayah)){
            $idwilayah=Auth::guard('admin')->user()->id_wilayah;
        }else{
            $idwilayah=1;
        }

     @endphp
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='nilai'){echo 'active';} ?>" href="<?= url('/admin/nilai/'.$idwilayah) ?>">
            <i class="nav-icon fas fa-table"></i>  <p> Nilai Elemen Data</p>
        </a>
    </li>
    
    <li class="nav-header">Report</li>
     
   
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='laporan'){echo 'active';} ?>" href="<?= url('/admin/laporan/'.$idwilayah); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Laporan Elemen Data</p>
        </a>
    </li>
     

    <li class="nav-header">UTILITAS</li>
     
    {{-- <li class="nav-item has-treeview <?php if(Request::segment(2)=='users' or Request::segment(2)=='adduser'){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-user"></i>  <p>Users <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
            <!--<li class="nav-item"><a class="nav-link " href="<?= url('/user/index?id_user_role=1'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Admin</p></a></li>
            !-->
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='users' or Request::segment(2)=='adduser'){echo 'active';} ?>" href="<?= url('/admin/users'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Administrator</p></a></li>

        </ul>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
