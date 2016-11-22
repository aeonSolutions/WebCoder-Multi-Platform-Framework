<?php
if (isset($_GET['cfg'])):
	$cfg=$_GET['cfg'];
else:
$code=('missing var');
endif;

$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>