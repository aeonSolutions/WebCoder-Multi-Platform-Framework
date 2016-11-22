<?php
if (isset($_GET['project'])):
	$ProjLoad=$_GET['project'];
else:
	exit('Missing var');
endif;

$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

include($server['root']['path'].'system/dll/config_builder.class');
include($server['root']['path'].'system/dll/live_debug.class');

$debug_env_update = new live_debug;
$debug_env_update->file_line_debug=false;
$debug_env_update->headers_reload_debug=true;
$debug_env_update->file=__FILE__;
$debug_env_update->code=rand(100, 500);
$debug_env_update->stop_at_bug=true;
$debug_env_update->store_bugs=true;

$debug_env_update->start_file_debug();
$debug_env_update->breakpoint(__LINE__);

date_default_timezone_set('Europe/Lisbon');

include($server['root']['path'].'workplace/projects/'.$ProjLoad.'/'.$ProjLoad.'.proj');

// update status file
$debug_env_update->breakpoint(__LINE__);
$cfg_builder = new configuration_files_builder;
$cfg_builder->file_line_debug=$debug_env_update->file_line_debug;
$cfg_builder->project=$properties;
$cfg_builder->status_cfg($properties);

// enable full loading
//UpDate left sidebar

//UpDate rigth sidebar

//UpDate bottom sidebar

//UpDate header
$debug_env_update->end_file_debug(__LINE__);
?>