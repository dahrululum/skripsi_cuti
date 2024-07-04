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
        $('#tablena').DataTable({ "pageLength": 500 });
    })
</script>

@endsection

 

@section('content')
 
  
     
    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Instrumen Data</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addelemen')}}"><i class="fa fa-plus"></i> Tambah Elemen</a>
                        <br><br>

                            <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
                                <thead class="bg-info">
                                <tr>
                                    <th> ID</th>
                                    <th> Alias </th>
                                    <th> Nama Elemen </th>
                                    <th> Jenis Elemen </th> 
                                    <th> Sumber </th> 
                                    <th> Ket </th> 
                                    <th> #  </th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; $level = 0; ?>
                                    @foreach ($el as $el)
                                    @include('admin/subelemen',[
                                        'el' =>  $el,
                                        'level' => $level
                                    ])
                                    {{-- <tr>
                                        <td>{{ $el->id }}</td>
                                        <td>{{ $el->alias }}</td> 
                                        <td>{{ $el->getJenis->namajenis }}</td>
                                        <td>{{ $el->nama }}</td> 
                                        <td></td>
                                        
                                        <td>
                                            <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editelemen/'.$el->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/delelemen/'.$el->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                         </td>
                                    </tr> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
