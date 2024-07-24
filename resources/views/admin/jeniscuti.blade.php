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
                            <h3 class="card-title">Daftar jenis cuti</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addjeniscuti')}}"><i class="fa fa-building"></i> Tambah jenis cuti</a>
                        <br><br>

                            <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
                                <thead class="bg-info">
                                <tr>
                                     
                                    <th> Kode jenis cuti </th>
                                    <th> Nama jenis cuti </th>
                                    
                                    <th> #  </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($un as $un)
                                    <?php 
                                       
                                    ?>
                                    <tr>
                                        <td>{{ $un->kd_jenis_cuti }}</td>
                                        
                                        <td>{{ $un->nm_jenis_cuti }}</td>
                                     
                                        <td>
                                            <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editjeniscuti/'.$un->kd_jenis_cuti) }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/deljeniscuti/'.$un->kd_jenis_cuti) }}"><i class="fa fa-trash"></i> Delete</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
