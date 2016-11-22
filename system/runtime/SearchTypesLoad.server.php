<?php
$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

$ScopeTypes='';

if (isset($_GET['NewScope'])):
	$ContentSize=strlen($searchScope);
	header ( "Pragma: no-cache" );
	header ( "Cache-Control: no-cache" );
	header("Content-Length: ".$ContentSize);//set header length
	echo $ScopeTypes;
endif;

?>
