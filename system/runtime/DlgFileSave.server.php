<?php
if (isset($_GET['cfg'])):
	$cfg=$_GET['cfg'];
else:
	exit('missing var');
endif;
$path='';
$remove='';
if (isset($_GET['path'])):
	$path=$_GET['path'];
	$remove='';
	$DirStore=$path;
elseif (isset($_GET['remove'])):
	$remove=$_GET['remove'];
	$path='';
	$DirStore=$remove;
else:
	exit('missing var');
endif;


$DirStore=str_replace('-', '/', $DirStore);

$possible_cfg[]='ImgIcoListCfg';
$possible_cfg[]='EmbBinListCfg';
$possible_cfg[]='LinkLibListCfg';
$possible_cfg[]='LinkWidgetListCfg';
$possible_cfg[]='LinkWappListCfg';

if (!in_array($cfg, $possible_cfg)):
	exit('Invaid cfg placehorder');
endif;

// find array keyword for access
if ($cfg=='ImgIcoListCfg'):
	$ArrIdx='IcoImg';
	$empty_content='Add Graphics and Icon external folders here';
elseif ($cfg=='EmbBinListCfg'):
	$ArrIdx='EmbbededBin';
	$empty_content='Add Embedded Binaries here';
elseif ($cfg=='LinkLibListCfg'):
	$ArrIdx='LinkedLib';
	$empty_content='Add Linked Libraries here';
elseif ($cfg=='LinkWidgetListCfg'):
	$ArrIdx='LinkedWidget';
	$empty_content='Add Linked widgets here';
elseif ($cfg=='LinkWappListCfg'):
	$ArrIdx='LinkedWApp';
	$empty_content='Add Linked Web Applications here';
endif;

$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

include($server['root']['path'].'system/dll/config_builder.class');
include($server['root']['path'].'system/dll/live_debug.class');
include($server['root']['path'].'system/config/paths.cfg');
include($server['root']['path'].'system/config/status.cfg');
// load from cfg file all paths stored
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');

// initializing debug system
$debug = new live_debug;
$debug->file_line_debug=true;
$debug->headers_reload_debug=true;
$debug->file=__FILE__;
$debug->code=rand(100, 500);
$debug->stop_at_bug=false;

// initializing system live file management system
$configB= new configuration_files_builder;
$configB->file_line_debug=$debug->file_line_debug;
$configB->filename=$workvars['project']['directory'].'.proj';
$configB->cfg_directory='workplace/projects/'.$workvars['project']['directory'].'/';

//check if its repeated
if(isset($properties['folders'][$ArrIdx][0])):
	$array=$properties['folders'][$ArrIdx];
else:
	$array['folders'][$ArrIdx][0]=' you will never cacth on this one ever!!!!!';
endif;
$is_repeated = in_array($DirStore,$array);	

// add new to list if not repeated
if (($remove=='' and $is_repeated===false) or $array['folders'][$ArrIdx][0]==' you will never cacth on this one ever!!!!!'):
	if(!isset($properties['folders'][$ArrIdx][0])):
		$properties['folders'][$ArrIdx][0]=$DirStore;		
	elseif ($properties['folders'][$ArrIdx][0]=='' and !isset($properties['folders'][$ArrIdx][1])):
		$properties['folders'][$ArrIdx][0]=$DirStore;	
	else:
		$properties['folders'][$ArrIdx][]=$DirStore;
	endif;
elseif($path=='' and $is_repeated)://delete if resquested to
	$pos=array_search($DirStore, $properties['folders'][$ArrIdx]);
	//delete from list
	
	unset($properties['folders'][$ArrIdx][$pos]);
	$properties['folders'][$ArrIdx] = array_values($properties['folders'][$ArrIdx]);
	if (!isset($properties['folders'][$ArrIdx][0])):
		$properties['folders'][$ArrIdx][0]='';
	endif;
endif;

//store new cfg setup
$configB->project_properties($properties);

//build new html code
if ($properties['folders'][$ArrIdx][0]==''):
	$code='<p class="">'.$empty_content.'</p>';
else:
	$code='<select name="'.$cfg.'-select" id="'.$cfg.'-select" size="7" class="ms-files">';
	for ($i = 0; $i < count($properties['folders'][$ArrIdx]); $i++):
		$code .='<option>'.$properties['folders'][$ArrIdx][$i].'</option>';
	endfor;
	$code .='</select>';

endif;

$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>