

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
    @for ($i = $periode->thnawal; $i <= $periode->thnakhir; $i++)
    <?php 
    if($levuser==1){
        $cekn=App\Models\Nilai::where(
        [
            ['id_jenis','=',$el->id_jenis],
            ['id_wilayah','=',@$params['id_wilayah']],
            ['id_elemen','=',$el->id],
            ['tahun','=',$i],
        ]
        )->count(); 
        //dd($cekn);
        
    if($cekn != 0 ){
        $nilaina=App\Models\Nilai::where(
        [
            ['id_jenis','=',$el->id_jenis],
            ['id_wilayah','=',@$params['id_wilayah']],
            ['id_elemen','=',$el->id],
            ['tahun','=',$i],
        ]
        )->first(); 
        
        


        $nilaielement=$nilaina->nilai;
    }else{
        $nilaielement=0;
    }
    }else{
        $cekn=App\Models\Nilai::where(
        [
            ['id_jenis','=',$el->id_jenis],
            ['id_wilayah','=',$idwilayah],
            ['id_elemen','=',$el->id],
            ['tahun','=',$i],
        ]
        )->count(); 
        //dd($cekn);
        
    if($cekn != 0 ){
        $nilaina=App\Models\Nilai::where(
        [
            ['id_jenis','=',$el->id_jenis],
            ['id_wilayah','=',$idwilayah],
            ['id_elemen','=',$el->id],
            ['tahun','=',$i],
        ]
        )->first(); 
        
        


        $nilaielement=$nilaina->nilai;
    }else{
        $nilaielement=0;
    }
    }
    
    
?>

    <td class="text-right">   {{ number_format($nilaielement,2) }} </td>
    @endfor  
     
    {{-- <td class="text-center col-sm-2">
        <input type="hidden" id="id_elemen{{ $el->id }}" name="id_elemen{{ $el->id }}" value="{{ $el->id }}" class="form-control form-control-sm"> 
        <input type="number" id="nilai{{ $el->id }}" name="nilai{{ $el->id }}" class="form-control form-control-sm" value="{{$nilaielement}}">
    </td> --}}
</tr>
<?php
    $level++;
     
?>
<?php 
 
foreach($el->manySub as $subel) { 
       
    ?>
    @include('admin/subelemen_report',[
        'el' => $subel
    ])
    
<?php  }  $no++; ?>