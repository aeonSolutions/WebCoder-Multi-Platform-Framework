<?php
$possible_cfg[]='LinkLibListCfg';
$possible_cfg[]='LinkWidgetListCfg';
$possible_cfg[]='LinkWappListCfg';
$possible_cfg[]='LinkframewListCfg';
$code='';
$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path
include($server['root']['path'].'system/config/status.cfg');
include($server['root']['path'].'system/config/paths.cfg');
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');
include($server['root']['path'].'system/dll/live_debug.class');
include($server['root']['path'].'system/dll/config_builder.class');
include($server['root']['path'].'system/dll/UpdateInterfaceDependencies.class');

if (isset($_GET['cfg']) and !isset($_GET['file'])): // load dialog
	$cfg=$_GET['cfg'];

	if (!in_array($cfg, $possible_cfg)):
		exit('Invaid cfg placehorder:'.$cfg);
	endif;
	
	if($cfg=='LinkLibListCfg'):
		$file_type='lib.sugar';
		$what='Libraries';
	elseif($cfg=='LinkWidgetListCfg'):
		$file_type='widget.sugar';
		$what='Widgets';
	elseif($cfg=='LinkWappListCfg'):
		$file_type='wapp.sugar';
		$what='Web Applications';
	elseif($cfg=='LinkframewListCfg'):
		$file_type='framework.sugar';
		$what='Frameworks';
	else:
		$what='error';
	endif;
	
	$html_template=file_get_contents($server['root']['path'].'system/GUI/Dialogs/DlgLoadSugar.html');
	//include what type of what is being loaded
	$code=str_replace("{file2type}", $what, $html_template);
	//search for select type .sugar files
	$ext=$server['root']['path'].'packages/*.'.$file_type;
	$list='<select id ="SugarListSelect" name="SugarListSelect" size="7" class="DlgSugarSelect SanFrancisco TextS2" >';
	foreach(glob($ext, GLOB_NOSORT) as $file): 
		//ToDo: check each sugar file for validation 
		$file=explode("/", $file);
		$list.= '<option style="background-image:url(system/GUI/Graphics/icons/briefcase.png); right no-repeat; height: 20px" value="'.$file[count($file)-1].'">'.$file[count($file)-1].'</option>';  
		     
	 endforeach;  
	if($list=='<select id ="SugarListSelect" name="SugarListSelect" size="7" class="DlgSugarSelect SanFrancisco TextS2" >'):
		$list ='<p class="SanFrancisco TextS3" style="text-align:center;"><img src="system/GUI/graphics/icons/wherediditgo.gif" height="200px" /><br>No '.$what.' files found</p>';
		$code=str_replace("{cfg}", "javascript: javascript:DlgAbort();", $code);
	else:
		$list .='</select>';
		$code=str_replace("{cfg}", "javascript:DlgSugarSave('".$cfg."');", $code);
	endif;
	$code=str_replace("{list_files}", $list, $code);
	

elseif(isset($_GET['file']) and isset($_GET['cfg'])): // file selection occured load contents into project and save into proj file
	$file2load=$_GET['file'];
	$cfg=$_GET['cfg'];

	if (!in_array($cfg, $possible_cfg)):
		exit('Invaid cfg placehorder:'.$cfg);
	endif;
	
	if($cfg=='LinkLibListCfg'):
		$file_type='lib.sugar';
		$where='library';
	elseif($cfg=='LinkWidgetListCfg'):
		$file_type='widget.sugar';
		$where='widget';
	elseif($cfg=='LinkWappListCfg'):
		$file_type='wapp.sugar';
		$where='webApp';
	elseif($cfg=='LinkframewListCfg'):
		$file_type='framework.sugar';
		$where='framework';
	else:
		$where='error';
	endif;
	if(isset($properties['resources'][$where][0])):
		$array=$properties['resources'][$where];
	else:
		$array['resources'][$where][0]=' you will never cacth on this one ever!!!!!';
	endif;
	
	if(!in_array($file2load, $array)):
	
		if(is_file($file2load)):
			//ToDo: check sugar file for validation 
			$del='';
		else:
			//ToDo: display error Dialog box
			$del='';
			 
		endif;
		
		$properties=change_status($properties, $file2load, 1);

		$index=isset($properties['resources'][$where]) ? count($properties['resources'][$where]) : 0 ;	
		$properties['resources'][$where][$index]=$file2load;
						
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
		//store new cfg setup
		$configB->project_properties($properties);
	else: // already installed 
		$code="<script>
			document.getElementById('".$cfg."-wait').innerHTML='<p class=\"fade-in TextS0\" style=\"color:red;\"><img src=\"system/GUI/graphics/icons/Warning.png\" height=\"10px\" class=\"fade-in\" alt=\"\" /> Already installed!</p>';
		</script>";
	endif;
	
	$code.='<select id ="'.$cfg.'Select" name="'.$cfg.'Select" size="7" class="ms-files" >';
	
	$empty=true;
	if (isset($properties['resources'][$where][0])):
		for ($i = 0; $i < count($properties['resources'][$where]); $i++):
			$code.='<option>'.$properties['resources'][$where][$i].'</option>';
			$empty=false;
		endfor;		
	endif;
	
	if ($empty):
		$code ='<p class="">Add Linked '.$where.' here</p>';
	else:
		$code.='</select>'; // is a HTML5 forms list
	endif;

elseif(isset($_POST['LinkLibListCfgSelect']) or isset($_POST['LinkWidgetListCfgSelect']) or isset($_POST['LinkWappListCfgSelect']) or isset($_POST['LinkframewListCfgSelect'])): 
// delete selection
	
	if (isset($_POST['LinkLibListCfgSelect'])):
		$item2del=$_POST['LinkLibListCfgSelect'];
		$where='library';
		$cfg='LinkLibListCfgSelect';
	elseif (isset($_POST['LinkWidgetListCfgSelect'])):
		$item2del=$_POST['LinkWidgetListCfgSelect'];
		$where='widget';
		$cfg='LinkWidgetListCfgSelect';
	elseif (isset($_POST['LinkWappListCfgSelect'])):
		$item2del=$_POST['LinkWappListCfgSelect'];
		$where='webApp';
		$cfg='LinkWappListCfgSelect';
	elseif (isset($_POST['LinkframewListCfgSelect'])):
		$item2del=$_POST['LinkframewListCfgSelect'];
		$where='framework';
		$cfg='LinkframewListCfgSelect';
	endif;
		
	$properties=change_status($properties, $item2del, 0);

	$code='';
	if (($key = array_search($item2del, $properties['resources'][$where])) !== false):
	    array_splice($properties['resources'][$where], $key, 1);
	endif;
	
	$code.='<select id ="'.$cfg.'" name="'.$cfg.'" size="7" class="ms-files" >';
	
	$empty=true;
	if (isset($properties['resources'][$where][0])):
		$properties['resources'][$where]=array_unique($properties['resources'][$where]);
		$properties['resources'][$where]=array_values($properties['resources'][$where]);
		for ($i = 0; $i < count($properties['resources'][$where]); $i++):
		
			$code.='<option>'.$properties['resources'][$where][$i].'</option>';
			$empty=false;
		endfor;		
	endif;
	
	if ($empty):
		$code ='<p class="">Add Linked '.$where.' here</p>';
	else:
		$code.='</select>'; // is a HTML5 forms list
	endif;
	
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
	//store new cfg setup
	$configB->project_properties($properties);



else:
	$code='error on request: missing var';
endif;

$updateInterface= new liveUpdateOfInterfaceDependencies;
$updateInterface->frameworks();
$updateInterface->libraries();
$updateInterface->widgets();
$updateInterface->webApplications();
$updateInterface->gui();

$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;


function change_status($properties, $filename, $status){
	if ($filename=='oscn.framework.sugar'):
		$properties['capabilities']['OSCN']=$status; //open source cloud network
	elseif($filename=='notifications.framework.sugar'):
		$properties['capabilities']['PushNotifications']=$status; //push notifications
	elseif($filename=='wallet.framework.sugar'):
		$properties['capabilities']['Wallet']=$status; //Digital wallet
	elseif($filename=='shopping.framework.sugar'):
		$properties['capabilities']['Shopping']=$status; //shopping store
	elseif($filename=='homeAndFamily.framework.sugar'):
		$properties['capabilities']['FamilyHome']=$status; //Family and home
	elseif($filename=='health.framework.sugar'):
		$properties['capabilities']['Health']=$status; //health
	elseif($filename=='DataP.framework.sugar'):
		$properties['capabilities']['DataProtection']=$status; //Data Protection
	elseif($filename=='StaySafe.framework.sugar'):
		$properties['capabilities']['StaySafe']=$status; //Stay safe police enforcement
	elseif($filename=='dnhv.framework.sugar'):
		$properties['capabilities']['DNSHuman']=$status; //Domain names human verification 
	elseif($filename=='money.framework.sugar'):
		$properties['capabilities']['Financial']=$status; //Persnoal or business finalcial and money management
	elseif($filename=='games.framework.sugar'):
		$properties['capabilities']['Games']=$status; //Games center
	elseif($filename=='search.framework.sugar'):
		$properties['capabilities']['search']=$status; //Games center
	endif;
	return $properties;
};
?>