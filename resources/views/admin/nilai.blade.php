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
<script>
       
    //    $("#getdataElemen").click(function(e){
    //         e.preventDefault();
    //         alert("Proses GetData Elemen akan segera berlangsung");

    //         var idinstansi = $("#idpd").val();
    //         let token   = $("meta[name='csrf-token']").attr("content");

    //         $.ajax({
    //             type: 'POST',
    //             url: "{{url('admin/post-getdataelemen')}}",
    //             async: true,  
    //             //data: data,
    //             data: {
                  
    //                 "idinstansi": idinstansi,
    //                 "_token": token
    //             },
    //             beforeSend: function() {
    //                 $(".spinner-border").show();
    //             },
    //             success: function (response) {
    //                 alert("sukses "+response.message);
    //                 console.log(response.message);
    //                 $(".spinner-border").hide();
    //                 // var appurl = {!! json_encode(url('/admin/detail_indikatorninebox')) !!};
    //                 // var deturl = appurl+"/"+response.data;
                    
    //                 // $("#result").show();
    //                 // $("#result").load(deturl, function() {
    //                 //     //alert( "The last 25 entries in the feed have been loaded" );
    //                 //     $(".spinner-border").hide();
    //                 // });
    //                 window.location.reload();
    //                 //$("#resultna").show();


    //             }, 
    //             error: function(xhr, status, error){
    //                     alert('error '+error);
                        
    //             }
    //         });

    //     });
</script>
@endsection

 

@section('content')
 
    <?php
        
    ?>

    <form method="GET" id="FormCari" enctype="multipart/form-data">    
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Filter Data Jenis, Periode Tahun   </h3>
        </div>    
        <div class="card-body">
                <div class="row">
                    @if($levuser==1)
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
                    @else
                    <div class="col-lg-5 border-right">
                        <div class="form-group">
                            <label id="wilayah">Wilayah</label>
                             <input type="hidden" class="form-control form-control-sm " id="id_wilayah" name="id_wilayah" value="{{ $idwilayah }}" readonly >
                             <div class="border p-1">
                                {{ $nmwilayah }}
                             </div>
                             {{-- <input type="text" class="form-control form-control-sm " id="nama_wilayah" name="nama_wilayah" value="{{ $nmwilayah }}" readonly > --}}
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-3 border-right">
                        <div class="form-group">
                            <label id="jenisdata">Jenis Data</label>
                            <select class="form-control form-control-sm " name="id_jenis" id="id_jenis"  required>
                                <option value="">Pilih Jenis Elemen </option>
                                <?php 
                                    $level = 0;
                                    $strip = "--"; 
                                ?>
                                @foreach ($jenis as $pd)
                                    <option value="{{ $pd->id }}" @if(@$params['id_jenis']==$pd->id) selected @endif>  {{ $pd->id }}. {{ $pd->namajenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="form-group">
                            <label id="periode">Periode Aktif Tahun {{ $periode->thnawal }} s/d {{ $periode->thnakhir }}</label>
                            <select class="form-control form-control-sm " name="tahun" id="tahun"  required>
                                <option value="">Pilih periode tahun </option>
                                    
                                @for ($i = $periode->thnawal; $i <= $periode->thnakhir; $i++)
                                    <option value="{{ $i }}"  @if(@$params['tahun']==$i) selected @endif >Tahun {{ $i }}</option>
                                @endfor
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
    @if(!empty(@$params['id_jenis']))
    <form method="POST" action="{{url('admin/post-nilaielemen')}}" id="FormNilai" enctype="multipart/form-data">     
        {{ csrf_field() }}
    <div class="card card-primary" id="resultna">
       
        {{-- {{ $arrpar }} --}}
        <div class="card-header">
            <h3 class="card-title">Daftar Elemen Data   </h3>
        </div> 
        <div class="card-body table-responsive p-2">
            <?php 
                $refj=App\Models\Refjenis::where('id',@$params['id_jenis'])->first(); 
                $refw=App\Models\Refwilayah::where('id',@$params['id_wilayah'])->first();     
            ?>
            <div class="row p-0 ">
                <div class="col-sm-2 text-center bg-dark border-bottom p-1">Jenis</div>
                <div class="col-sm-4 bg-light border-bottom p-1">{{ @$params['id_jenis'] }}. {{ $refj->namajenis }}</div>
            </div>
            <div class="row p-0 ">
                <div class="col-sm-2 text-center bg-dark border-bottom p-1">Wilayah</div>
                <div class="col-sm-4 bg-light border-bottom p-1">{{ @$params['id_wilayah'] }}. {{ $refw->namawilayah }}</div>
            </div>
            <div class="row p-0 mb-4">
                <div class="col-sm-2 text-center bg-dark border-bottom p-1">Tahun</div>
                <div class="col-sm-4 bg-light border-bottom p-1">{{ @$params['tahun'] }}</div>
            </div>
            <table class="table table-sm table-hover text-nowrap table-bordered" id="tablena">
                <thead class="bg-info">
                <tr>
                    <th> ID</th>
                    <th> Nama Elemen </th>
                    <th> Tahun {{ @$params['tahun'] }}</th>
                    <th> Sumber Data </th>
                    <th> Ket </th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=0; $level = 0; ?>
                    @foreach ($el as $el)
                    
                    @include('admin/subelemen_nilai',[
                        'el' =>  $el,
                        'level' => $level
                    ])
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <input type="hidden" id="id_wilayah" name="id_wilayah" value="{{ @$params['id_wilayah'] }}">
            <input type="hidden" id="id_jenis" name="id_jenis" value="{{ @$params['id_jenis'] }}">
            <input type="hidden" id="tahun" name="tahun" value="{{ @$params['tahun'] }}">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
       
    </div>
    </form>
    @endif
@endsection
