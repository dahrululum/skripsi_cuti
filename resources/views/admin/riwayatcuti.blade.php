@extends($layout)
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')
<!-- DataTables -->
<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        $('#tablena').DataTable();
    })
</script>

@endsection

 

@section('content')
 
   
     
    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Riwayat Cuti Pegawai</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                         

                            <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
                                <thead class="bg-info">
                                <tr>
                                     
                                    
                                    <th> No.</th>
                                    
                                    <th> Jenis cuti </th>
                                    <th> Tanggal Awal Cuti </th>
                                    <th> Tanggal Akhir Cuti </th>
                                    <th> Ket </th>
                                    <th> Status  </th> 
                                    

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aju as $aju)
                                    <?php 
                                       
                                    ?>
                                    <tr>
                                       
                                        
                                        <td>{{ $loop->iteration}}</td>
                                        
                                        <td>{{ $aju->getJC->nm_jenis_cuti }} </td>
                                        <td>{{ $aju->tgl_mulai }} </td>
                                        <td>{{ $aju->tgl_selesai }}</td>
                                        <td>{{ $aju->alasan }}</td>
                                        <td>
                                            {{-- {{ $aju->getFPPC->no_fppc }} --}}
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
                    </div>
                </div>

@endsection
