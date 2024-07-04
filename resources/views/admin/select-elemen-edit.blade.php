<option value="{{$el->id}}" @if($el->id == $pel->id_induk) selected @endif>
    <?php 
        if($level!=0){
           
            for ($x = 1; $x <= $level; $x++){
                echo $strip;
            }
        }
             
        ?>
        {{-- {{ $pd->id }} --}}
        @if(!empty($el->nama))
        {{ ucwords(strtolower($el->nama)) }}
     
    @else

    -
    @endif ::    </option> 


    <?php 
    $level++;
    $strip++;
    ?>
    <?php
   
    foreach($el->manySub as $subel) {  
    ?>
        @include('admin/select-elemen-edit',[
            'el' =>  $subel,
        ])
    <?php
    }
     ?>