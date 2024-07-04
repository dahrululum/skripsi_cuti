<option value="{{$el->id}}" >
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
    @endif ::   {{ $el->id }} </option> 


    <?php 
    $level++;
    $strip++;
    ?>
    <?php
   
    foreach($el->manySub as $subel) {  
    ?>
        @include('admin/select-elemen',[
            'el' =>  $subel,
        ])
    <?php
    }
     ?>