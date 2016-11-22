<?php
$code='';
if (isset($_GET['p'])):
	$AddrPath = $_GET['p']; 		
	$AddrPath=str_replace("-", "/", $AddrPath);
	if (is_dir($AddrPath)):
		$FilesInDir=glob("*.*");
		$code='<table style="width: 400px; table-layout:fixed;" class="TextS1 SanFrancisco"><tr><td style="width: 70%"><strong>Filename</strong></td><td><strong>Size (bytes)</strong></td></tr>';
		foreach (glob($AddrPath."/*.*") as $filename):
			$StripFile=str_replace("/", "-", $filename);
			$code .='<tr>';
			$code .='<td><img src="system/GUI/graphics/icons/page.gif" height="16px" alt="" /><a href="javascript: AjxSimpleHtml(\'DlgLFFilesSelect\',\'system/runtime/DlgFileToUpload.server.php?p='.$StripFile.'\');" class="AddrPathLink">'.basename($filename).'</a></td>';
			$code .='<td>'.filesize($filename).'</td>';
		endforeach;
		$code .='</table>';	
	else:
		$code='Is not a folder!';
	endif;
else:
	$code='Select a directory folder';
endif;
$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>