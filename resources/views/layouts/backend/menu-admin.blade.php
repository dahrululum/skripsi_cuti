<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    
    <li class="nav-header">Transaksi</li>
     
   
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='ajucuti'){echo 'active';} ?>" href="<?= url('/admin/ajucuti/'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Pengajuan Cuti </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='verifikasicuti'){echo 'active';} ?>" href="<?= url('/admin/verifikasicuti/'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>FPPC  </p>
        </a>
    </li>
    <li class="nav-header">Laporan</li>
     
   
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='publikasi'){echo 'active';} ?>" href="<?= url('/admin/publikasi/'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Publikasi  </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='weblink'){echo 'active';} ?>" href="<?= url('/admin/weblink/'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Informasi  </p>
        </a>
    </li>
    
    <li class="nav-header">MASTER</li>
     
   
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='pegawai'){echo 'active';} ?>" href="<?= url('/admin/pegawai'); ?>">
            <i class="nav-icon fas fa-users"></i>  <p>Data Pegawai</p>
        </a>
    </li>  

    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='unitkerja' or Request::segment(2)=='addunitkerja' or  Request::segment(2)=='editunitkerja'  ){echo 'active';} ?>" href="<?= url('/admin/unitkerja'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Unit Kerja</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='jabatan' or Request::segment(2)=='addjabatan' or  Request::segment(2)=='editjabatan'  ){echo 'active';} ?>" href="<?= url('/admin/jabatan'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Jabatan</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='golongan' or Request::segment(2)=='addgolongan' or  Request::segment(2)=='editgolongan'  ){echo 'active';} ?>" href="<?= url('/admin/golongan'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Golongan</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='pangkat' or Request::segment(2)=='addpangkat' or  Request::segment(2)=='editpangkat'  ){echo 'active';} ?>" href="<?= url('/admin/pangkat'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Pangkat</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='jeniscuti' or Request::segment(2)=='addjeniscuti' or  Request::segment(2)=='editjeniscuti'  ){echo 'active';} ?>" href="<?= url('/admin/jeniscuti'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Jenis Cuti</p>
        </a>
    </li>

    <li class="nav-item has-treeview <?php if(Request::segment(2)=='useradmin' or Request::segment(2)=='userpd' or Request::segment(2)=='adduseradmin' or Request::segment(2)=='edituseradmin' or Request::segment(2)=='adduserpd' or Request::segment(2)=='edituserpd' ){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-user"></i>  <p>Users <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
            <!--<li class="nav-item"><a class="nav-link " href="<?= url('/user/index?id_user_role=1'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Admin</p></a></li>
            !-->
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='useradmin' or Request::segment(2)=='adduseradmin' or Request::segment(2)=='edituseradmin'){echo 'active';} ?>" href="<?= url('/admin/useradmin'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Administrator</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='userpd' or Request::segment(2)=='adduserpd' or Request::segment(2)=='edituserpd'){echo 'active';} ?>" href="<?= url('/admin/userpd'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Operator</p></a></li>

        </ul>
    </li>
    
    {{-- <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='pegawai'  or Request::segment(2)=='addpegawai' or Request::segment(2)=='editpegawai' ){echo 'active';} ?>" href="<?= url('/admin/pegawai'); ?>">
            <i class="nav-icon fas fa-users"></i>  <p> Pegawai </p>
        </a>
    </li> --}}
   
    <li class="nav-header">KELUAR ?</li>
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
