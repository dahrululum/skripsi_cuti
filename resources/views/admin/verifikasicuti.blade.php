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
                            <h3 class="card-title">Daftar FPPC</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addfppc')}}"><i class="fa fa-user"></i> Tambah FPPC</a>
                        <br><br>

                            <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
                                <thead class="bg-info">
                                <tr>
                                     
                                    
                                    <th> No. & Tgl FPPC </th>
                                    <th> ID Pegawai </th>
                                    <th> Jenis cuti </th>
                                    <th> Periode Cuti </th>
                                    <th> Catatan cuti </th>
                                    <th> Atasan langsung </th>
                                    <th> Catatan Atasan </th>
                                    <th> #  </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fppc as $fppc)
                                    <?php 
                                       
                                    ?>
                                    <tr>
                                       
                                        
                                        <td>{{ $fppc->no_fppc }}</td>
                                        <td>
                                            
                                            <div>{{ $fppc->getPC->nama_pegawai }}</div>
                                            <div>{{ $fppc->getPC->nip }}</div>
                                            

                                        </td>
                                        <td>{{ $fppc->getJC->nm_jenis_cuti }} </td>
                                        <td>{{ $fppc->tgl_mulai }} </td>
                                        <td>{{ $fppc->tgl_selesai }}</td>
                                        <td>{{ $fppc->alasan }}</td>
                                         
                                        <td class="text-center">
                                            <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/verfppc/'.$fppc->no_fppc) }}"><i class="fa fa-edit"></i> Verifikasi</a>
                                            <a class="btn btn-dark btn-xs" href="{{ URL::to('/admin/printfppc/'.$fppc->no_fppc) }}" target="_blank"><i class="fa fa-print"></i> Print</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
