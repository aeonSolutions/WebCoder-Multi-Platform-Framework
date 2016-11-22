<?php
// list warnings and erros in project

if (isset($_GET['what'])):
	$what=$_GET['what'];
else:
	exit('missing var');
endif;

$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path
$loaded='Error on loading';
if ($what=='asciitable'):
	$loaded=file_get_contents($server['root']['path'].'system/widgets/AsciiTable.widget.html');
else:
	exit('error on request');
endif;

$code='<div id="WindowPopUp" class="SanFrancisco TextS1">
	<div id="WindowClose">
		<a href="#" onclick="javascript: CloseWindowPopUp();"><i class="fa fa-times"></i></a>
	</div>';
$code.=$loaded;
$code.='</div>';

$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length

echo $code;
?>