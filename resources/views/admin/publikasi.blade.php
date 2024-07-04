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
 
@endsection

 

@section('content')
 
 

     
    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Daftar Publikasi  </h3>
                        </div>    
                    <div class="card-body">
                        <a class="btn btn-success" href="{{ URL::to('/admin/addpublikasi')}}"><i class="fa fa-plus"></i> Tambah Publikasi</a>
                        <br><br>
                        <div class="card-body table-responsive p-0">
                          
                            <table class="table table-sm table-hover table-bordered" id="tablena">
                                <thead class="bg-primary">
                                <tr>
                                    <th> ID</th>
                                    
                                    <th> Judul Publikasi </th>
                                    <th> Deskripsi</th>
                                    <th> Tanggal</th>
                                    <th> File Cover</th>
                                    <th> File Unduh</th>
                                    <th> Status </th>
                                    <th> # </th> 

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pub as $pub)
                                    <?php 
                                       if ($pub->status=="1"){
                                           $namastatus="aktif";
                                        }else{
                                           $namastatus="tidak aktif"; 
                                        }
                                         
                                    ?>
                                    <tr>
                                        <td>{{ $pub->id }}</td>
                                       
                                        <td>{{ $pub->judul }}</td>
                                        <td>{!! $pub->deskripsi !!}</td>
                                        <td>{{ $pub->tglinput }}</td>
                                        <td class="text-center">
                                            @if(empty($pub->file_foto))
                                                <img src="{{ asset('images/noimage.jpg') }}" alt="">
                                            @else
                                            <img src="{{ asset('downloads/'.$pub->file_foto) }}" width="140px" alt="" class="">
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(empty($pub->file_download))
                                                <span class="text-danger">Tidak ada file download</span>
                                            @else
                                                <a href="{{ asset('downloads/'.$pub->file_download) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download File</a>
                                            @endif
 
                                        </td>
                                        <td>{{ $namastatus }}</td>
                                         
                                        <td>
                                            <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editpublikasi/'.$pub->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/delpublikasi/'.$pub->id) }}" onClick="if(!confirm('Anda yakin Akan Hapus Data Publikasi ini !'))return false;"><i class="fa fa-trash"></i> Delete</a>
                                             
                                         </td>
                                         
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
