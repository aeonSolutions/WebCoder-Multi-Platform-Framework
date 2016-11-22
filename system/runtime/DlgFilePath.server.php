<?php
$code='<div id="DlgSelectedPath">';
if (isset($_GET['p'])):
	$AddrPath = $_GET['p']; 
	$AddrPath = ($AddrPath[0]=='-') ? substr($AddrPath, 1, strlen($AddrPath)) : $AddrPath;
	$AddrPath=explode("-", $AddrPath);
	$path='';
	for ($i = 0; $i < count($AddrPath); $i++):
		$path= ($i>0) ? $path.'-'.$AddrPath[$i] : '-'.$AddrPath[$i];
		$code .='<a href="javascript: DlgDirSelect(\'DlgLFAddrBarPath\', \'DlgLFFiles\', \''.$path.'\');" class="AddrPathLink">'.$AddrPath[$i].'</a>';
		$code .= ($i==count($AddrPath)-1) ? '' : '&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;';
	endfor;
	$code .='<input type="hidden" name="DlgPath" id="DlgPath" value="'.$_GET['p'].'" /></div>';
else:
	$code='Select a directory folder';
endif;
$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>