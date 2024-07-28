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
        $namalevel="Pegawai";
    } 
    ?>
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">
                 
                
                    Halo {{Auth::guard('admin')->user()->username}} Sebagai {{$namalevel}}
                

            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                 
                <div class="col-sm-12">
                    
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
