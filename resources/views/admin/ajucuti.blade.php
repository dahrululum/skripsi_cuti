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
                            <h3 class="card-title">Daftar Cuti Pegawai</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addajucuti')}}"><i class="fa fa-user"></i> Tambah Permohonan Cuti</a>
                        <br><br>

                            <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
                                <thead class="bg-info">
                                <tr>
                                     
                                    
                                    <th> Nama Pegawai </th>
                                    <th> NIP Pegawai </th>
                                    <th> Jenis cuti </th>
                                    <th> Tanggal Awal Cuti </th>
                                    <th> Tanggal Akhir Cuti </th>
                                    <th> Alasan </th>
                                     
                                    <th> #  </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aju as $aju)
                                    <?php 
                                       
                                    ?>
                                    <tr>
                                       
                                        
                                        <td>{{ $aju->getPEG->nama_pegawai }}</td>
                                        <td>{{ $aju->getPEG->nip }}</td>
                                        <td>{{ $aju->getJC->nm_jenis_cuti }} </td>
                                        <td>{{ $aju->tgl_mulai }} </td>
                                        <td>{{ $aju->tgl_selesai }}</td>
                                        <td>{{ $aju->alasan }}</td>
                                         
                                        <td class="text-center">
                                            <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editajucuti/'.$aju->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-dark btn-xs" href="{{ URL::to('/admin/printajucuti/'.$aju->id) }}" target="_blank"><i class="fa fa-print"></i> Print</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
