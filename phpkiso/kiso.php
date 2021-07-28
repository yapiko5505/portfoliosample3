<?php
$skip = 33;
$count = 0;
while($count<100) {
    if($count == $skip){
        $count++;
        continue;
    }
    echo "{$count}.\n";
    $count++;   
}

echo "\n";
echo "処理終了";

?>