
<tr bgcolor="#eee">
    
     
    <td>{{ $el->id }}</td>
    <td>{{ $el->alias }}</td>
    <td style="padding-left:<?= 7 + $level * 20; ?>px">
        <span class="@if($level==0 or $level==1 or $level==2) font-weight-bold @else font-weight-normal @endif "> 
            @if(!empty($el->nama))
              {{ ucwords(strtolower($el->nama)) }}
        
             @else

            -
            @endif 
        </span></td>
    <td class="text-center">{{ $el->id_jenis }}. {{ $el->getJenis->namajenis }}</td>
    <td class="text-center">{{ $el->sumber }}</td>
    <td class="text-center">{{ $el->ket }}</td>
    
    
    
     
    <td class="text-center col-sm-2">
        <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/editelemen/'.$el->id) }}"><i class="fa fa-edit"></i> Edit</a>    
        <a class="btn btn-danger btn-xs" href="{{ URL::to('/admin/delelemen/'.$el->id) }}" onClick="if(!confirm('Anda yakin Akan Hapus Data Elemen ini !'))return false;"><i class="fa fa-trash"></i> Del</a>
    </td>
</tr>
<?php
    $level++;
     
?>
<?php 
 
foreach($el->manySub as $subel) { 
       
    ?>
    @include('admin/subelemen',[
        'el' => $subel
    ])
    
<?php  }  $no++; ?>