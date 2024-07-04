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
        $('#tablena').DataTable({ "pageLength": 500 });
    })
</script>
 
@endsection

 

@section('content')
 
    <?php
        
    ?>
    @if($levuser==1)
    <form method="GET" id="FormCari" enctype="multipart/form-data">    
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Filter Wilayah</h3>
        </div>    
        <div class="card-body">
                <div class="row">
                    
                    <div class="col-lg-5 border-right">
                        <div class="form-group">
                            <label id="wilayah">Wilayah</label>
                            <select class="form-control form-control-sm " name="id_wilayah" id="id_wilayah"  required>
                                <option value="">Pilih Wilayah </option>
                                
                                @foreach ($wilayah as $wil)
                                    <option value="{{ $wil->id }}" @if(@$params['id_wilayah']==$wil->id) selected @endif>  {{ $wil->id }}. {{ $wil->namawilayah }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                  
                     
                </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <button class="btn btn-success" type="submit" id="getdataElemen">
                        <i class="fa fa-search"></i> Filter
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endif
    @if(!empty(@$params['id_wilayah']) or !empty($idwilayah) )
    
    <div class="card card-primary" id="resultna">
       
        {{-- {{ $arrpar }} --}}
        <div class="card-header">
            <h3 class="card-title">Daftar Elemen Data   </h3>
        </div> 
        <div class="card-body table-responsive p-2">
            @if($levuser==1)
            <?php 
                $refj=App\Models\Refjenis::where('id',@$params['id_jenis'])->first(); 
                $refw=App\Models\Refwilayah::where('id',@$params['id_wilayah'])->first();     
            ?>
            
            <div class="row p-0 mb-3">
                <div class="col-sm-2 text-center bg-dark border-bottom p-1">Wilayah</div>
                <div class="col-sm-4 bg-light border p-1">{{ @$params['id_wilayah'] }}. {{ $refw->namawilayah }}</div>
            </div>
            @else
            <?php 
            $refj=App\Models\Refjenis::where('id',@$params['id_jenis'])->first(); 
            $refw=App\Models\Refwilayah::where('id',$idwilayah)->first();     
        ?>
        
        <div class="row p-0 mb-3">
            <div class="col-sm-2 text-center bg-dark border-bottom p-1">Wilayah</div>
            <div class="col-sm-4 bg-light border p-1">{{ $idwilayah }}. {{ $refw->namawilayah }}</div>
        </div>

            @endif
            <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
                <thead class="bg-info">
                <tr>
                    <th> ID</th>
                    <th> Nama Elemen </th>
                    @for ($i = $periode->thnawal; $i <= $periode->thnakhir; $i++)
                        <th> Tahun {{ $i }}  </th>
                    @endfor
                    

                </tr>
                </thead>
                <tbody>
                    <?php $no=0; $level = 0; ?>
                    @foreach ($el as $el)
                    
                    @include('admin/subelemen_report',[
                        'el' =>  $el,
                        'level' => $level
                    ])
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
          <a href="#" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
        </div>
       
    </div>
   
    @endif
@endsection
