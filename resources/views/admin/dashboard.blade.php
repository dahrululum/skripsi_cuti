<?php

use App\Components\Helper;
 

?>


@extends($layout)

@section('content')
<?php 
    if(Auth::guard('admin')->user()->level=="1")
    {
        $namalevel="Admin";
    }else{
        $namalevel="Operator";
    } 
    ?>
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">
                 
                
                    Halo {{Auth::guard('admin')->user()->name}} Sebagai {{$namalevel}}
                

            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                         
                            <p>Wilayah / Perangkat Dinas </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <a href="<?= url('/admin/wilayah') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                           

                            <p>Jenis Elemen</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <a href="<?= url('/admin/jenis'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- <div class="col-sm-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                           

                            <p style="color: #ffffff">UPTB</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <a href="<?= url('/admin/uptb'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="small-box bg-red">
                        <div class="inner">
                          

                            <p style="color: #ffffff">CABDIN</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <a href="<?= url('/admin/cabdin'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}
                 
                
            </div>
        </div><!-- .card-body -->
    </div>

@stop
