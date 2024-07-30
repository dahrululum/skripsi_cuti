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

                            <table class="table table-sm table-hover table-bordered" id="tablena">
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
                                     $tglfppc=Carbon::parse($fppc->tgl_fppc)->isoFormat('DD MMMM YYYY');  
                                    ?>
                                    <tr>
                                       
                                        
                                        <td>{{ $fppc->no_fppc }} / {{ $tglfppc }}</td>
                                        <td>
                                            
                                            <div>{{ $fppc->getPC->getPEG->nama_pegawai }}</div>
                                            <div>{{ $fppc->getPC->getPEG->nip }}</div>
                                            

                                        </td>
                                        <td>{{ $fppc->getPC->getJC->nm_jenis_cuti }} </td>
                                        <td>{{ $fppc->getPC->tgl_mulai }} <b>s/d</b>  {{ $fppc->getPC->tgl_selesai }} </td>
                                        <td>{{ $fppc->catatan_cuti }}</td>
                                        <td>{{ $fppc->atasan_langsung }}</td>
                                        <td>{{ $fppc->catatan_atasan }}</td>
                                        <td class="text-center">
                                            
                                            <a class="btn btn-dark btn-xs" href="{{ URL::to('/admin/printfppc/'.$fppc->no_fppc) }}" target="_blank"><i class="fa fa-print"></i> Print FPPC</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
