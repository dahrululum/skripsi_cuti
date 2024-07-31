              
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

     $nofppc=sprintf("%04d", $hs->no_fppc);
     $nopc=sprintf("%04d", $hs->no_pc);
     $un=sprintf("%02d", $hs->getPC->getPEG->kd_unitkerja);
     
     $blnfppc=Carbon::parse($hs->tgl_fppc)->isoFormat('MM');
     $thnfppc=Carbon::parse($hs->tgl_fppc)->isoFormat('YYYY');
 ?>
 <div class="row printna">
    <div class="col-12 p-2 bg-dark border">
       <a href="#" class="btn btn-primary float-right mx-2" onclick="window.print();return false;"><i class="fa fa-print"></i> Print</a>
       
    </div>
    <!-- /.col -->
  </div>
 <div class="row">
    <div class="col-12 p-2">
        <h1 class="font-weight-bold text-center">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI  </h1> 
                    <h5 class="text-center">Nomor: {{ $nofppc }}/{{ $nopc }}/{{ $un }}/{{ $blnfppc }}/{{ $thnfppc }} </h5>

        
    </div>
    
   
    <!-- /.col -->
  </div>
 
  <div class="row p-2">
    <div class="col-12 bg-dark p-1">
        A. Detail Pegawai 
    </div>
    <div class="col-6 border">
        <table class=" col-12">
            <tr>
                <td class="col-sm-4">Nama   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPC->getPEG->nama_pegawai }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">NIP   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPC->getPEG->nip }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Unit Kerja   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPC->getPEG->getUN->nm_unitkerja }}</td>
            </tr>
             
             
            
        </table>
    </div>
    <div class="col-6 border">
        <table class=" col-12">
            
            <tr>
                <td class="col-sm-4">Jabatan   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPC->getPEG->getJAB->nm_jabatan }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Pangkat/Gol   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPC->getPEG->getPANG->nm_pangkat }} {{ $hs->getPC->getPEG->getGOL->nm_golongan }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">No.HP   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $hs->getPC->getPEG->nohp }}</td>
            </tr>
             
             
            
        </table>
    </div>
    <div class="col-12 bg-dark p-1 mt-2">
       B. Jenis Cuti Yang diambil 
    </div>
    <div class="col-12 border p-2">
        Jenis Cuti : <b>{{ $hs->getPC->getJC->kd_jenis_cuti }}. {{ $hs->getPC->getJC->nm_jenis_cuti }}</b>
    </div>
    <div class="col-12 bg-dark p-1 mt-2">
        C. Alasan Cuti 
    </div>
    <div class="col-12 border p-2">
          <h6>{{ $hs->getPC->alasan }} </h6>
    </div>
    <div class="col-12 bg-dark p-1 mt-2">
        D. Lama Cuti 
    </div>
    <div class="col-2 border p-2">
          Lama : <b>{{ $hs->getPC->lama_cuti }}</b>  hari 
    </div>
    <div class="col-2 bg-light border p-2 text-center">
       Periode
    </div>
    <div class="col-8 border p-2">
        <div class="row text-center p-0">
            <div class="col-5 border-bottom border-right">Tanggal Mulai</div>
            <div class="col-2   ">s/d</div>
            <div class="col-5 border-bottom border-left">Tanggal Selesai</div>
        </div>
        <div class="row text-center p-0">
            <div class="col-5 border-right "><b>{{ $tglawalna }}</b> </div>
            <div class="col-2  "> </div>
            <div class="col-5 border-left "><b> {{ $tglakhirna }}</b></div>
        </div>
        
    </div>
    <div class="col-12 bg-dark p-1 mt-2">
        E. Alamat Selama Cuti 
    </div>
    <div class="col-8 border p-2">
           {{ $hs->getPC->alamat_cuti }} 
    </div>
    <div class="col-4 border p-2">
        <div class="row text-center p-0">
            <div class="col-12   ">No.HP : <b>{{ $hs->getPC->getPEG->nohp }}</b> </div>
        </div>
        <div class="row text-center p-0">
            <div class="col-12   ">
                Hormat Saya, <br><br><br><br>  {{ $hs->getPC->getPEG->nama_pegawai }} 
            </div>
        </div>
    </div>
    <div class="col-12 bg-dark p-1 mt-2">
        F. Riwayat Cuti 
    </div>
    <div class="col-12 border p-2"> 
        <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
            <thead class="">
            <tr>
                 
                
                <th> No.</th>
                
                <th> Jenis cuti </th>
                <th> No & Tgl Permohonan cuti </th>
                <th> Tanggal Awal Cuti </th>
                <th> Tanggal Akhir Cuti </th>
                <th> Ket </th>
                <th> #  </th> 
                

            </tr>
            </thead>
            <tbody>
                @foreach ($aju as $aju)
                <?php 
                   $nopcr=sprintf("%04d", $aju->no_pc);
                ?>
                <tr>
                   
                    
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $aju->getJC->nm_jenis_cuti }} </td>
                    <td>{{ $nopcr }}  <span class="small">[ {{ $aju->tgl_pc }} ]</span></td>
                    <td>{{ $aju->tgl_mulai }} </td>
                    <td>{{ $aju->tgl_selesai }}</td>
                    <td>{{ $aju->alasan }}</td>
                    <td>
                        
                        @if(empty($aju->getFPPC->atasan_langsung))
                            <div class="text-danger small">Belum Verifikasi Atasan</div> 
                        @else
                            <div>{{ $aju->getFPPC->atasan_langsung }}</div> 
                            <div>No. & Tgl. FPPC : {{ $aju->getFPPC->no_fppc }} / {{ $aju->getFPPC->tgl_fppc }}</div> 
                        
                        @endif
                    </td> 
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-12 bg-dark p-1 mt-2">
        G. Pertimbangan Atasan Langsung 
    </div>
    <div class="col-8 border p-2">
        <div><b>Catatan :</b> </div> 
        <div>{{ $hs->catatan_cuti }}</div>
    </div>
    <div class="col-4 border p-2">
        <div class="text-center"><b>Atasan Langsung, </b> 
        <br><br><br><br>
        (.........................)
        
        </div> 

    </div>
    <div class="col-12 bg-dark p-1 mt-2">
        H. Keputusan Pejabat Yang Berwenang 
    </div>
    <div class="col-8 border p-2">
        <div><b>Catatan :</b> </div> 
        <div>{{ $hs->catatan_atasan }}</div>
    </div>
    <div class="col-4 border p-2">
        <div class="text-center"><b>Kepala Dinas Pendidikan <br> Provinsi Kepulauan Bangka Belitung </b> 
            <br><br><br><br>
            (.........................)
            
            </div> 
    </div>
  </div>






   
   

 
   
@endsection