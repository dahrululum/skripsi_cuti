
<?php 
    $cekn=App\Models\Nilai::where(
        [
            ['id_jenis','=',@$params['id_jenis']],
            ['id_wilayah','=',@$params['id_wilayah']],
            ['id_elemen','=',$el->id],
            ['tahun','=',@$params['tahun']],
        ]
        )->count(); 
        //dd($cekn);

        
    if($cekn != 0 ){
        $nilaina=App\Models\Nilai::where(
        [
            ['id_elemen','=',$el->id],
            ['id_jenis','=',@$params['id_jenis']],
            ['id_wilayah','=',@$params['id_wilayah']],
            ['tahun','=',@$params['tahun']],
        ]
        )->first(); 
        
        


        $nilaielement=$nilaina->nilai;
        $sumberelement=$nilaina->sumber;
        $ketelement=$nilaina->ket;
    }else{
        $nilaielement=0;
        $sumberelement="";
        $ketelement="";
    }
    
?>
<tr bgcolor="#eee">
    
     
    <td>{{ $el->id }}</td>
     
    <td style="padding-left:<?= 7 + $level * 20; ?>px">
        <span class="@if($level==0 or $level==1 or $level==2) font-weight-bold @else font-weight-normal @endif "> 
            @if(!empty($el->nama))
              {{ ucwords(strtolower($el->nama)) }}
        
             @else

            -
            @endif 
        </span>
        {{-- <span class="badge badge-dark">{{ $el->alias }}</span> --}}
       
    </td>
     
     
    <td class="text-center col-sm-2">
        <input type="hidden" id="id_elemen{{ $el->id }}" name="id_elemen{{ $el->id }}" value="{{ $el->id }}" class="form-control form-control-sm"> 
        <input type="number" id="nilai{{ $el->id }}" name="nilai{{ $el->id }}" class="form-control form-control-sm" value="{{$nilaielement}}">
    </td>
    <td class="text-center col-sm-3">
        <input type="text" id="sumber{{ $el->id }}" name="sumber{{ $el->id }}" class="form-control form-control-sm" value="{{$sumberelement}}">
    </td>
    <td class="text-center col-sm-2">
        <input type="text" id="ket{{ $el->id }}" name="ket{{ $el->id }}" class="form-control form-control-sm" value="{{$ketelement}}">
    </td>
</tr>
<?php
    $level++;
     
?>
<?php 
 
foreach($el->manySub as $subel) { 
       
    ?>
    @include('admin/subelemen_nilai',[
        'el' => $subel
    ])
    
<?php  }  $no++; ?>