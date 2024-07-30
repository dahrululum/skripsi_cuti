              
 @extends('layouts.backend.preview')
 @section('styles')
   <!-- DataTables -->
   <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
   <style>
    @media print{
        @page {size: portrait}
        .printna {
             display:none;
            }
    }
  </style>
 @endsection


 @section('content')
<?php 
$tglayena=date('d-m-Y');
$tglna=Carbon::parse($tglayena)->isoFormat('DD MMMM YYYY');  
?>
 <div class="row printna">
    <div class="col-12 p-2 bg-dark border">
       <a href="#" class="btn btn-primary float-right mx-2" onclick="window.print();return false;"><i class="fa fa-print"></i> Print</a>
       
    </div>
    <!-- /.col -->
  </div>
 <div class="row">
    <div class="col-12 border-bottom p-2">
        <table class="text-center">
            <tr>
                <td class="col-1 "><img src="{{ asset('/images/logobabel.png') }}" width="80" alt="Survei" class="brand-image" ></td>
                <td class="col-11"> <h1 class="font-weight-bold">DINAS PENDIDIKAN  </h1> 
                    <h3>PROVINSI KEPULAUAN BANGKA BELITUNG</h3>
                </td>
            </tr>
        </table>
      
    </div>
    
    <div class="col-12 text-center mt-4">
        <h4 class="font-weight-bold ">REKAP CUTI PEGAWAI   </h4> 
    </div>
    <!-- /.col -->
  </div>
 
   
  <div class="row p-2">
    
    <!-- /.col -->
    <div class="col-sm-12 "> 
        <table class="table table-sm table-hover table-bordered" id="tablena">
            <thead class="bg-info">
            <tr class="text-center">
                 
                
                <th rowspan="2"> No. </th>
                <th rowspan="2"> Nama Pegawai </th>
                <th colspan="2" > Cuti </th>
                <th colspan="2"> Periode Cuti </th>
                <th rowspan="2"> Ket  </th>

            </tr>
            <tr class="text-center">
                <th>Jumlah Hari</th>
                <th>Jenis Cuti</th>
                <th>Mulai (Tanggal Awal)</th>
                <th>Selesai (Tanggal Akhir)</th>
                
            </tr>
            </thead>
            <tbody>
                @foreach ($fppc as $fppc)
                <?php 
                 $tglfppc=Carbon::parse($fppc->tgl_fppc)->isoFormat('DD MMMM YYYY');  
                ?>
                <tr >
                   
                    
                    <td class="text-center">{{ $loop->iteration }}  </td>
                    <td>
                        
                        <div>{{ $fppc->getPC->getPEG->nama_pegawai }}</div>
                        <div>{{ $fppc->getPC->getPEG->nip }}</div>
                        

                    </td>
                    <td class="text-center">{{ $fppc->getPC->lama_cuti }} </td>
                    <td> <b>{{ $fppc->getPC->getJC->kd_jenis_cuti }}.</b>  {{ $fppc->getPC->getJC->nm_jenis_cuti }} </td>
                    <td>{{ $fppc->getPC->tgl_mulai }}     </td>
                    <td>{{ $fppc->getPC->tgl_selesai }}</td>
                    <td>{{ $fppc->getPC->alasan }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
     
    <!-- /.col -->
  </div>
   

  <div class="row my-2  " style="height: 20px;">&nbsp;</div>
  <div class="row my-4 p-2">
    <div class="col-sm-6  ">
        <table class="text-center col-12">
            <tr>
                <td>Mengetahui, <br> KEPALA DINAS PENDIDIKAN <br> PROVINSI KEPULAUAN BANGKA BELITUNG </td>
            </tr>
            <tr>
                <td>  <p>&nbsp;</p> <p>&nbsp;</p></td>
            </tr>
            <tr>
                <td> ( ................................ )</td>
            </tr>
        </table>
    </div>
    <div class="col-sm-6   ">
        <div class="text-center mb-2">Pangkalpinang, {{ $tglna }}</div>
        <table class="text-center col-12">
            <tr>
                <td>Mengetahui, <br> Atasan Langsung </td>
            </tr>
            <tr>
                <td>  <p>&nbsp;</p> <p>&nbsp;</p></td>
            </tr>
            <tr>
                <td> ( ................................ )</td>
            </tr>
        </table>
    </div>
    <div class="col-sm-4  "></div>
    <div class="col-sm-2  ">
       
    </div>
  </div>
   
 
@endsection