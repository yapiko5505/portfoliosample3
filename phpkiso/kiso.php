<?php
    $start=1;
    $end=100;
    $total=0;
    while($start<=$end){
        $total+=$start;
        $start++;
    }
    echo $total;
    
    $start=1;
    $end=100;
    $total=0;
    for($i=$start; $i<=$end; $i++) {
        $total+=$i;
    }
    echo $total;

?>