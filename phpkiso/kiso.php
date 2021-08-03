<?php

$array = array(
    '名前' => '山田',
    '住所' => '愛媛',
    '年齢' => '20歳',
);

foreach($array as $key => $val) {
    echo $key.':';
    echo $val.'<br>';
}
?>