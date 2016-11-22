<?php
if (isset($_GET['cfg'])):
	$cfg=$_GET['cfg'];
else:
	exit('missing var');
endif;

$possible_cfg[]='ImgIcoListCfg';
$possible_cfg[]='EmbBinListCfg';
$possible_cfg[]='EngineListCfg';
$possible_cfg[]='AssocDomainsListCfg';
$possible_cfg[]='LinkframewListCfg';

if (!in_array($cfg, $possible_cfg)):
	exit('Invaid cfg placehorder');
endif;

if (isset($_GET['what'])):
	$what=$_GET['what']; 		//what accepts dlg or proj
else:
	$what='DlgLF-Dtree';
endif;

if (isset($_GET['lim'])):
	//what accepts img , bin , widget, lib, wapp
	$lim=$_GET['lim'];
else:
	$lim='';
endif;

$disable_files='';
if (isset($_GET['TypeofDlg'])):
	$worktype=$_GET['TypeofDlg'];
	if ($worktype=='folder'):
		$disable_files='';
	elseif ($worktype=='file'):
		$disable_files='';
	endif;
endif;

$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

include($server['root']['path'].'system/config/status.cfg');
include($server['root']['path'].'system/config/paths.cfg');
include($server['root']['path'].'system/config/browse_tree.cfg');
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');
include($server['root']['path'].'system/dll/DlgLocalHD.lib.php');

$html_template=file_get_contents($server['root']['path'].'system/GUI/Dialogs/DlgFileOpen.html');

if($lim='img'):
	$ShowOnlyExt=$ImgFilesAllowed;
elseif($lim='bin'):
	$ShowOnlyExt=$OSXBinFilesAllowed;
elseif($lim='widget'):
	$ShowOnlyExt=$WidgetFilesAllowed;
elseif($lim='lib'):
	$ShowOnlyExt=$LibrariesFilesAllowed;
elseif($lim='wapp'):
	$ShowOnlyExt=$WebAppFilesAllowed;
else:
	$ShowOnlyExt=false;
endif;

if ($what=='dlg'):
	$what='DlgLF-Dtree';
	$JsVar='DlgLFTree';
	$place=$JsVar.'-place';
else:
	$what='DlgLF-Dtree'; // ERROR change 
	$JsVar='ProjTree';
	$place=$JsVar.'-place';
endif;

$code='';
$code= '<script type="text/javascript">';
$code .= $disable_files;
$code .= $JsVar." = new dTree('".$JsVar."','".$place."','".$server['address']['root']."/');".chr(13);
$code .= $JsVar.".add(0,-1,'".gethostname()."','javascript:Clean();');".chr(13);
$idx=1;
$dir=substr($server['root']['path'], 0, strlen($server['root']['path'])-1);

$out=RecursiveTree(1, 0, $JsVar, $dir, $hide_ext, $no_link_ext, $what,$ShowOnlyExt,true);
$code .= $out[1];
$code .= "document.getElementById('".$what."').innerHTML  = ".$JsVar.";".chr(13);
$code .= "document.getElementById('".$place."').style.height='280px';";
$code .= "document.getElementById('".$place."').style.width='270px';";
$code .='</script>'.chr(13);

$code=str_replace("{directory_tree}", $code, $html_template);
$code=str_replace("{cfg}", "javascript:DlgFileSave('".$cfg."');", $code);

$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>