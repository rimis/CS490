<?php

$data=array("uid"=>"rs334","password"=>"password");
$string = http_build_query($data);

$ch=curl_init("https://web.njit.edu/~rs334/cs490/data05.php");

curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

//echo curl_exec($ch);
$res = curl_exec($ch);
echo $res;
curl_close($ch);

?>