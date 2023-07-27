<?php 

$hash=123;

$ayer=date("Y-m-d");

$gg='hash='.$hash.'&title=Informe%20de%20evento&trackers='.$ids.'&from='.$ayer.'%2000%3A00%3A00&to='.$ayer.'%2023%3A59%3A59';

echo $gg;
echo "<br>";

echo urldecode($gg);