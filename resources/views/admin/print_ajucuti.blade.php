              
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
    $tglpc=Carbon::parse($hs->tgl_pc)->isoFormat('DD MMMM YYYY');
     $tglawalna=Carbon::parse($hs->tgl_mulai)->isoFormat('DD MMMM YYYY');
     $tglakhirna=Carbon::parse($hs->tgl_selesai)->isoFormat('DD MMMM YYYY');
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
    
    <div class="col-12 ">
        
        <div class="row">
            <div class="col-9">
               <p class="mt-4">Perihal : Permohonan Cuti</p> 
            </div>
            <div class="col-3 mr-0 p-2   ">
                <table class="  float-right col-12">
                    <tr>
                        <td>Pangkalpinang, {{ $tglpc }} </td>
                    </tr>
                    <tr>
                        <td> Kepada Yth.</td>
                    </tr>
                    <tr>
                        <td> Kepala Dinas Pendidikan <br>
                             Provinsi Kep. Bangka Belitung <br>
                            Di<br>
                            Pangkalpinang
                        </td>
                    </tr>
                </table>

              
            </div>
            
        </div>
        
    </div>
    <!-- /.col -->
  </div>
 
 
  <div class="row p-2">
    
    <!-- /.col -->
    <div class="col-sm-1 "> </div>
    <div class="col-sm-6   my-2">
        <table class=" col-12">
            <tr>
                <td class="col-sm-4">Nama   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPEG->nama_pegawai }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">NIP   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPEG->nip }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Unit Kerja   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPEG->getUN->nm_unitkerja }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Jabatan   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPEG->getJAB->nm_jabatan }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Pangkat/Gol   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPEG->getPANG->nm_pangkat }} - {{ $hs->getPEG->getGOL->nm_golongan }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">No.HP   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPEG->nohp }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Alamat   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPEG->alamat }}</td>
            </tr>
            <tr>
                <td class="col-sm-4" colspan="3"> &nbsp; </td>
                 
            </tr>
            <tr>
                <td class="col-sm-4">Jenis Cuti   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getJC->nm_jenis_cuti }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Tanggal Cuti   </td>
                <td class="col-sm-1">:</td>
                <td> <b>{{ $tglawalna }}</b>  s/d <b> {{ $tglakhirna }}</b></td>
            </tr>
            <tr>
                <td class="col-sm-4">Lama Cuti   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->lama_cuti }} hari</td>
            </tr>
            <tr>
                <td class="col-sm-4">Alasan Cuti   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->alasan }}</td>
            </tr>
            
        </table>
    </div>
    <!-- /.col -->
  </div>
  <div class="row my-4  " style="height: 100px;">&nbsp;</div>
  <div class="row my-4">
    <div class="col-sm-5  ">
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
        <table class="text-center col-12">
            <tr>
                <td>Hormat saya,  </td>
            </tr>
            <tr>
                <td>  <p>&nbsp;</p> <p>&nbsp;</p></td>
            </tr>
            <tr>
                <td> 
                    <div class="border-bottom">{{ $hs->getPEG->nama_pegawai }}</div>
                    <div>{{ $hs->getPEG->nip }}</div>
                    
                </td>
            </tr>
        </table>
    </div>
  </div>
 
@endsection