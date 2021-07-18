<?php

require_once('gengo.php');

$seireki=$_POST['seireki'];

$wareki=gengo($seireki);
print $wareki;


?>
