@extends($layout)
@section('styles')
  <!-- DataTables !-->
  <link rel="stylesheet" href="{{url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('javascripts')
<!-- DataTables !-->
<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Bootstrap Switch !-->
<script src="{{url('lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script> 
    $ ( function () {
        $('#tablena').DataTable();
    })
</script>
<script>
       
    
    $("[name='response']").on('change.bootstrapSwitch', function(e) {
        var idna = $(this).attr("value");
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'get',
            url: "{{url('admin/status-periode')}}",
            data: {
                'statuspage': e.target.checked,
                'idna'  : idna
                
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                window.location.reload();
            }
        });
    });

//$("[name='response']").bootstrapSwitch();
 
</script>
@endsection

 

@section('content')
 
    <?php if ($message = Session::get('success')) { ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?= $message ?></strong>
        </div>
    <?php  } ?>

     
    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Tahun Periode  </h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                          
                            <table class="table table-sm table-hover table-bordered" id="tablena">
                                <thead class="bg-primary">
                                <tr>
                                    <th> ID</th>
                                    
                                    <th> Nama Periode</th>
                                    <th> Tahun Awal</th>
                                    <th> Tahun Akhir</th>
                                    <th> Ket</th>
                                    
                                    <th> Status </th>
                                    <th> # </th> 

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periode as $per)
                                    <?php 
                                       if ($per->status=="1"){
                                           $namastatus="Default";
                                        }else{
                                           $namastatus="Not Default"; 
                                        }
                                         
                                    ?>
                                    <tr>
                                        <td>{{ $per->id }}</td>
                                       
                                        <td>{{ $per->namaperiode }}</td>
                                        <td>{{ $per->thnawal }}</td>
                                        <td>{{ $per->thnakhir }}</td>
                                        <td>{{ $per->ket }}</td>
                                        <td>{{ $namastatus }}</td>
                                         
                                        <td>
                                            {{-- <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editperiode/'.$per->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/delperiode/'.$per->id) }}"><i class="fa fa-trash"></i> Delete</a> --}}
                                            <input id="toggle-event" name="response" type="checkbox" data-toggle="toggle" data-on-color="Aktif" data-off-color="Non Aktif" data-onstyle="success" data-offstyle="danger" data-width="100" data-size="small" @if($per->status==1) checked @endif value="{{ $per->id }}" >
                                         </td>
                                         
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
