<?php
// update all dependencies with cfg files and setups: ouputs client code


$code='helper';
$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>