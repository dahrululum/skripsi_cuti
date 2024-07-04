<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin'); ?>">
            <i class="nav-icon fas fa-home"></i>  <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-header">Instrumen Data </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='elemen'){echo 'active';} ?>" href="<?= url('/admin/elemen'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Data Elemen</p>
        </a>
    </li>  
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='nilai'){echo 'active';} ?>" href="<?= url('/admin/nilai'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Nilai Elemen</p>
        </a>
    </li>
    <li class="nav-header">Report</li>
     
   
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='laporan'){echo 'active';} ?>" href="<?= url('/admin/laporan/'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Laporan Elemen Data</p>
        </a>
    </li>
    <li class="nav-header">Publikasi & Informasi</li>
     
   
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
    <li class="nav-header">Indikator Kinerja</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='laporan'){echo 'active';} ?>" href="<?= url('/admin/laporan/'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Indikator Kinerja  </p>
        </a>
    </li>

    {{-- 
    
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='uraianjabatan'){echo 'active';} ?>" href="<?= url('/admin/uraianjabatan/'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p> Uraian Jabatan</p>
        </a>
    </li>
    <li class="nav-header">Analisa Kebutuhan Jabatan</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='analisajabatan'){echo 'active';} ?>" href="<?= url('/admin/analisajabatan/1'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Analisa Beban Kerja</p>
        </a>
    </li> 
   
    <li class="nav-header">Usul Formasi Jabatan</li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='jabatan'){echo 'active';} ?>" href="<?= url('/admin/usulformasi/1'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Usul Kebutuhan Formasi ASN</p>
        </a>
    </li> 
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='jabatan'){echo 'active';} ?>" href="<?= url('/admin/verusulformasi/1'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Penetapan Formasi ASN</p>
        </a>
    </li> 
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='jabatan'){echo 'active';} ?>" href="<?= url('/admin/distribusiformasi/1'); ?>">
            <i class="nav-icon fas fa-table"></i>  <p>Redistribusi Pegawai ASN</p>
        </a>
    </li>  --}}
    <li class="nav-header">UTILITAS</li>
     
    <li class="nav-item has-treeview <?php if(Request::segment(2)=='useradmin' or Request::segment(2)=='userpd' or Request::segment(2)=='adduseradmin' or Request::segment(2)=='edituseradmin' or Request::segment(2)=='adduserpd' or Request::segment(2)=='edituserpd' ){echo 'menu-open';} ?>"><a class="nav-link " href="#"><i class="nav-icon fa fa-user"></i>  <p>User <i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview">
            <!--<li class="nav-item"><a class="nav-link " href="<?= url('/user/index?id_user_role=1'); ?>"><i class="nav-icon fa fa-circle-o"></i>  <p>Admin</p></a></li>
            !-->
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='useradmin' or Request::segment(2)=='adduseradmin' or Request::segment(2)=='edituseradmin'){echo 'active';} ?>" href="<?= url('/admin/useradmin'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Administrator</p></a></li>
            <li class="nav-item"><a class="nav-link <?php if(Request::segment(2)=='userpd' or Request::segment(2)=='adduserpd' or Request::segment(2)=='edituserpd'){echo 'active';} ?>" href="<?= url('/admin/userpd'); ?>"><i class="far fa-circle nav-icon"></i>  <p>Operator</p></a></li>

        </ul>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='wilayah' or Request::segment(2)=='addwilayah' or  Request::segment(2)=='editwilayah'  ){echo 'active';} ?>" href="<?= url('/admin/wilayah'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Wilayah</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='jenis' or Request::segment(2)=='addjenis' or  Request::segment(2)=='editjenis'  ){echo 'active';} ?>" href="<?= url('/admin/jenis'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Jenis</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if(Request::segment(2)=='periode' or Request::segment(2)=='addperiode' or  Request::segment(2)=='editperiode'  ){echo 'active';} ?>" href="<?= url('/admin/periode'); ?>">
            <i class="nav-icon fas fa-list-ol"></i>  <p>Periode</p>
        </a>
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
