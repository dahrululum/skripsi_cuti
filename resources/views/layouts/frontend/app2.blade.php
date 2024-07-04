<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIKEPANG :: PROV BANGKA BELITUNG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  {{-- <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/jqvmap/jqvmap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('lte/dist/css/facebox.css') }}">
  <link rel="stylesheet" href="{{url('lte/plugins/jquery-ui/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ url ('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- datatables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ url ('lte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ url ('lte/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('styles')

  <!-- jQuery -->
<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ url('lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

{{-- <!-- ChartJS -->


<script src="{{ url('lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url ('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- daterangepicker -->
<script src="{{ url('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ url('lte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('lte/dist/js/adminlte.js') }}"></script>
<script src="{{ url('lte/dist/js/facebox.js') }}" type="text/javascript" ></script>
<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
 
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('lte/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('lte/dist/js/demo.js') }}"></script> --}}
<script language="javascript">
  $(function () {
    //Initialize Select2 Elements
    bsCustomFileInput.init();

    //Date picker
    $('#datepicker').datepicker({
      format:'yyyy-mm-dd',	
      autoclose: true
    })
    //datatables
   
 
  })
  
  
</script>
<script language="javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox();
})
function getSKPD(kdcab,kduptd,kdsubskpd,kdskpd,namapd){
   //$('#resultna').load('files/list_upload_detail.php?getskpd='+kdskpd+'&getmod='+mod+'&getsec='+sec+'&getcat='+cat+'&getjp='+jp + '&getper='+periode +'&getthnp='+thnp);
   $('#ress-kdskpd').html("<input type='hidden' name='kdcab' id='kdcab' value='"+kdcab+"' class='form-control'  readonly /> <input type='hidden' name='kduptd' id='kduptd' value='"+kduptd+"' class='form-control'  readonly /> <input type='hidden' name='kdsubskpd' id='kdsubskpd' value='"+kdsubskpd+"' class='form-control'  readonly /> <input type='hidden' name='kdskpd' id='kdskpd' value='"+kdskpd+"' class='form-control'  readonly /> ");

   $('#ress-namaskpd').html("<input type='text' name='namaskpd' id='namaskpd' value='"+namapd+"'class='form-control'  readonly /> ");
		 
 	 $(document).trigger('close.facebox');
 } 


$(document).ready(function(){
	//define config object
   var dialogOpts = {
		modal: true,
		bgiframe: true,
		autoOpen: false,
		height: 500,
		width: 800,
		draggable: true,
		resizeable: true,
		open: function() {
		//display correct dialog content
		$("#refskpd").load("{{url('/usulan/dialogskpd')}}");}
		};
	
	 
			
    $("#refskpd").dialog(dialogOpts);	//end dialog
	  $('#showdialog_skpd').click(
       function (){
		   $("#refskpd").dialog("open");
			return false;
			});
	
           
		
});
</script>
@yield('javascripts')
</head>
<body class="layout-top-nav text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand text-sm navbar-dark navbar-info">
    @include('layouts/frontend/main-header')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
        <?php if(@$this->title!=null) { ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1><?= @$this->title; ?></h1>
                </div>
            </div>
        </div>
        <?php } ?>
        @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert" data-card-widget="remove">×</button> 
          <strong>{{ $message }}</strong>
      </div>
	   
       @endif

    </section>
         
    <section class="content" id="content">
    <div class="container">
        @if(Auth::check())
         
        <div class="row">
              <div class="col-lg-2 col-xs-6">
                <!-- small box -->
               

                <div class="small-box bg-green">
                  <div class="inner">
                  <a href="{{url('/usulan/biodata')}}" class="text-warning">
                    <h4>BIODATA</h4>

                    <p>Lengkapi Biodata</p>
                    </a>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{url('/usulan/biodata')}}" class="small-box-footer">Klik disini <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                

              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                  <a href="{{url('/usulan/syarat')}}" class="text-warning">
                    <h4>File/Berkas</h4>

                    <p>Upload Berkas</p>
                  </a>
                  </div>
                  <div class="icon">
                    <i class="ion ion-upload"></i>
                  </div>
                  <a href="{{url('/usulan/syarat')}}" class="small-box-footer">Klik disini <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col 
              <div class="col-lg-2 col-xs-6">
                 
                <div class="small-box bg-yellow">
                  <div class="inner">
                  <a href="{{url('/usulan/formasi')}}" class="text-danger">
                    <h4>Formasi </h4>

                    <p>Formasi SSCPTK</p>
                  </a>
                  </div>
                  <div class="icon">
                    <i class="ion ion-document"></i>
                  </div>
                  <a href="{{url('/usulan/formasi')}}" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              -->
              <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-gray ">
                  <div class="inner">
                  <a href="{{url('/usulan/resume')}}" class="text-warning">
                    <h4>Resume </h4>

                    <p>Kelengkapan Data</p>
                  </a>
                  </div>
                  <div class="icon">
                    <i class="ion ion-compose"></i>
                  </div>
                  <a href="{{url('/usulan/resume')}}" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
              <div class="col-lg-3 col-xs-6">
                
                <div class="small-box bg-purple">
                  <div class="inner">
                  <a href="{{url('/usulan/cetakkartu')}}" class="text-warning">
                    <h4>Cetak Bukti</h4>

                    <p>Usulan Kenaikan Pangkat</p>
                  </a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-print"></i>
                  </div>
                  <a href="{{url('/usulan/cetakkartu')}}" class="small-box-footer">Klik disini <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                
                <div class="small-box bg-info">
                  <div class="inner">
                  <a href="{{url('/usulan/pengumuman')}}" class="text-warning">
                    <h4>Pengumuman</h4>

                    <p>Cek Hasil Verifikasi</p>
                  </a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bullhorn"></i>
                  </div>
                  <a href="{{url('/usulan/pengumuman')}}" class="small-box-footer">Klik disini <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>  
              <!-- ./col 
              <div class="col-lg-3 col-xs-6">
                
                <div class="small-box bg-info">
                  <div class="inner">
                  <a href="{{url('/usulan/pengumuman')}}" class="text-warning">
                    <h4>Pengumuman</h4>

                    <p>Cek Hasil Verifikasi</p>
                  </a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bullhorn"></i>
                  </div>
                  <a href="{{url('/usulan/pengumuman')}}" class="small-box-footer">Klik disini <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
               -->
        </div>  
        @endif    
        @yield('content')
    </div>
    </section>
          
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('layouts/frontend/footer')
  </footer>
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



</body>
</html>
