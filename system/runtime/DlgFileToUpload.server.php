<?php
$code='';
if (isset($_GET['p'])):
	$AddrPath = $_GET['p']; 		
	$AddrPath=str_replace("-", "/", $AddrPath);
	if (is_file($AddrPath)):
		$code .='<p><img src="system/GUI/graphics/icons/page.gif" height="16px" alt="" /><a href="javascript: DlgFileSelected(\''.$AddrPath.'\');" class="AddrPathLink">'.basename($AddrPath).'</a></p>';
	else:
		$code='Is not a file!';
	endif;
else:
	$code='Select a file or folder';
endif;
$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>