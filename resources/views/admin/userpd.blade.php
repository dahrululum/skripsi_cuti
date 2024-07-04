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
 
    <?php if ($message = Session::get('success')) { ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?= $message ?></strong>
        </div>
    <?php  } ?>

     
    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Operator PD</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/adduserpd')}}"><i class="fa fa-user"></i> Tambah User</a>
                        <br><br>

                            <table class="table table-sm table-hover text-nowrap" id="tablena">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Nama Lengkap </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Wilayah </th>
                                    
                                    <th> Proses </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelamars as $pelamar)
                                    <?php 
                                       
                                    ?>
                                    <tr>
                                        <td>{{ $pelamar->id }}</td>
                                        <td>{{ $pelamar->username }}</td>
                                        <td>{{ $pelamar->name }}</td>
                                        <td>{{ $pelamar->email }}</td>
                                        <td>
                                            {{$pelamar->getWil->namawilayah}}
                                        </td>
                                        
                                        <td><a class="btn btn-success btn-xs" href="{{ URL::to('/admin/edituserpd/'.$pelamar->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                         
                                        <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/deluser/'.$pelamar->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
