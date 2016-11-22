<?php
$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path
if (isset($_GET['cfg'])):
	include($server['root']['path'].'system/runtime/DlgFileSave.server.php');
	exit;
endif;

include($server['root']['path'].'system/dll/config_builder.class');
include($server['root']['path'].'system/dll/live_debug.class');
include($server['root']['path'].'system/config/paths.cfg');
include($server['root']['path'].'system/config/status.cfg');
// load from cfg file all paths stored
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');

$code='Error on request';
if(isset($_POST['bundleId'])):
	$properties['identity']['identifier']=$_POST['bundleId'];
	$code=$properties['identity']['identifier'];
endif;
if(isset($_POST['VersionId'])):
	$properties['identity']['version']=$_POST['VersionId'];
	$code=$properties['identity']['version'];
endif;
if(isset($_POST['BuildId'])):
	$properties['identity']['build']=$_POST['BuildId'];
	$code=$properties['identity']['build'];
endif;
if(isset($_POST['deploy_html'])):
	$properties['deployment']['Html']=$_POST['deploy_html'];
	$code=$properties['deployment']['Html'];
endif;
if(isset($_POST['deploy_css'])):
	$properties['deployment']['Css']=$_POST['deploy_css'];
	$code=$properties['deployment']['Css'];
endif;
if(isset($_POST['deploy_java'])):
	$properties['deployment']['Java']=$_POST['deploy_java'];
	$code=$properties['deployment']['Java'];
endif;
if(isset($_POST['DeployMainInterface'])):
	$properties['deployment']['Interface']=$_POST['DeployMainInterface'];
	$code=$properties['deployment']['Interface'];
endif;
if(isset($_POST['DeployPortrait']) or isset($_POST['DeployUSD']) or isset($_POST['DeployLSL']) or isset($_POST['DeployLSR'])):
	if (isset($_POST['DeployPortrait'])):
		$arrived=$_POST['DeployPortrait'];
		$properties['deployment']['Orientation']['Portrait']= $arrived ? 1 : 0 ;
	elseif(isset($_POST['DeployUSD'])):
		$arrived=$_POST['DeployUSD'];
		$properties['deployment']['Orientation']['UpSideDown']= $arrived ? 1 : 0 ;
	elseif(isset($_POST['DeployLSL'])):
		$arrived=$_POST['DeployLSL'];
		$properties['deployment']['Orientation']['LandScapeLeft']= $arrived ? 1 : 0 ;
	elseif(isset($_POST['DeployLSR'])):
		$arrived=$_POST['DeployLSR'];
		$properties['deployment']['Orientation']['LandScapeRight']= $arrived ? 1 : 0 ;
	endif;
	$code=$arrived;
endif;
if(isset($_POST['DeployHSB'])):
	$properties['deployment']['StatusBar']=$_POST['DeployHSB'];
	$code=$properties['deployment']['StatusBar'];
endif;
if(isset($_POST['DeployRFS'])):
	$properties['deployment']['FullScreen']=$_POST['DeployRFS'];
	$code=$properties['deployment']['FullScreen'];
endif;

// capabilities
if (isset($_POST['cloud']) or isset($_POST['push']) or isset($_POST['wallet']) or isset($_POST['games']) or isset($_POST['store']) or isset($_POST['fhome']) or isset($_POST['health']) or isset($_POST['DataP']) or isset($_POST['StaySafe']) or isset($_POST['DNS']) or  isset($_POST['money']) or  isset($_POST['search'])):

	if (isset($_POST['cloud'])):
		$arrived=$_POST['cloud'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['OSCN'] = $arrived;
		$code=$arrived;
		$file2load='oscn.framework.sugar';
	endif;
	if (isset($_POST['push'])):
		$arrived=$_POST['push'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['PushNotifications'] = $arrived;
		$code=$arrived;
		$file2load='notifications.framework.sugar';
	endif;
	if (isset($_POST['wallet'])):
		$arrived=$_POST['wallet'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['Wallet'] = $arrived;
		$code=$arrived;	
		$file2load='wallet.framework.sugar';
	endif;
	if (isset($_POST['games'])):
		$arrived=$_POST['games'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['Games'] = $arrived;
		$code=$arrived;
		$file2load='games.framework.sugar';
	endif;
	if (isset($_POST['store'])):
		$arrived=$_POST['store'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['Shopping'] = $arrived;
		$code=$arrived;	
		$file2load='shopping.framework.sugar';
	endif;
	if (isset($_POST['fhome'])):
		$arrived=$_POST['fhome'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['FamilyHome'] = $arrived;
		$code=$arrived;
		$file2load='homeAndFamily.framework.sugar';
	endif;
	if (isset($_POST['health'])):
		$arrived=$_POST['health'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['Health'] = $arrived;
		$code=$arrived;	
		$file2load='health.framework.sugar';
	endif;
	if (isset($_POST['DataP'])):
		$arrived=$_POST['DataP'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['DataProtection'] = $arrived;
		$code=$arrived;
		$file2load='dataProtection.framework.sugar';
	endif;
	if (isset($_POST['StaySafe'])):
		$arrived=$_POST['StaySafe'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['StaySafe'] = $arrived;
		$code=$arrived;
		$file2load='staySafe.framework.sugar';
	endif;
	if (isset($_POST['DNS'])):
		$arrived=$_POST['DNS'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['DNSHuman'] = $arrived;
		$code=$arrived;
		$file2load='dnhv.framework.sugar';
	endif;
	if (isset($_POST['money'])):
		$arrived=$_POST['money'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['Financial'] = $arrived;
		$code=$arrived;
		$file2load='FinanceAndMoney.framework.sugar';
	endif;
	if (isset($_POST['search'])):
		$arrived=$_POST['search'];
		$arrived= $arrived ? 1 : 0;
		$properties['capabilities']['search'] = $arrived;
		$code=$arrived;
		$file2load='search.framework.sugar';
	endif;

	if(isset($properties['resources']['framework'][0])):
		$array=$properties['resources']['framework'];
	else:
		$array['resources']['framework'][0]=' you will never cacth on this one ever!!!!!';
	endif;
	if(!in_array($file2load, $array) and $arrived==1): //add to list
		$properties['resources']['framework'][]=$file2load;
	elseif(in_array($file2load, $array) and $arrived==0): // remove from list
		if (($key = array_search($file2load, $properties['resources']['framework'])) !== false):
		    array_splice($properties['resources']['framework'], $key, 1);
		endif;
	endif;	

endif;


//platforms that will be available 
if (isset($_POST['PlatformLocal'])):
	$arrived=$_POST['PlatformLocal'];
	$properties['deployment']['Platform']['Local'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['PlatformWeb'])):
	$arrived=$_POST['PlatformWeb'];
	$properties['deployment']['Platform']['Web'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['PlatformSmallMobile'])):
	$arrived=$_POST['PlatformSmallMobile'];
	$properties['deployment']['Platform']['Smartphone'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['PlatformMobile'])):
	$arrived=$_POST['PlatformMobile'];
	$properties['deployment']['Platform']['Tablet'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;

//backup project
if (isset($_POST['BackupAutomatic'])):
	$arrived=$_POST['BackupAutomatic'];
	$properties['deployment']['Backup']['Enabled'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['BackupInterval'])):
	$arrived=$_POST['BackupInterval'];
	$properties['deployment']['Backup']['Interval'] = $arrived;
	$code=$arrived;
endif;

//Safety
// project keys for security
if (isset($_POST['ProjIntKey'])):
	$arrived=$_POST['ProjIntKey'];
	$properties['safety']['Keys']['Internal'] = $arrived; // prepare string for storage ToDo: move to a seperate file
	$code=$arrived;
endif;
if (isset($_POST['ProjPubKey'])):
	$arrived=$_POST['ProjPubKey'];
	$properties['safety']['Keys']['Public'] = $arrived; // prepare string for storage ToDo: move to a seperate file
	$code=$arrived;
endif;

//Safety sharing
if (isset($_POST['SafetySharing'])):
	$arrived=$_POST['SafetySharing'];
	$properties['safety']['Sharing']['Enabled'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;

// auth options
if (isset($_POST['AuthWebP'])):
	$arrived=$_POST['AuthWebP'];
	$properties['safety']['AuthTypesAllowed']['web'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['AuthMPSMS'])):
	$arrived=$_POST['AuthMPSMS'];
	$properties['safety']['AuthTypesAllowed']['sms'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['AuthSPCG'])):
	$arrived=$_POST['AuthSPCG'];
	$properties['safety']['AuthTypesAllowed']['CodeGen'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['AuthLRC'])):
	$arrived=$_POST['AuthLRC'];
	$properties['safety']['AuthTypesAllowed']['LiveMD5'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;

// build options
if (isset($_POST['BuildSASS-Compress'])):
	$arrived=$_POST['BuildSASS-Compress'];
	$properties['Compiler']['options']['sass']['compress'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['BuildSASS-Merge'])):
	$arrived=$_POST['BuildSASS-Merge'];
	$properties['Compiler']['options']['sass']['merge'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['BuildCSS-Compress'])):
	$arrived=$_POST['BuildCSS-Compress'];
	$properties['Compiler']['options']['css']['compress'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['BuildCSS-Merge'])):
	$arrived=$_POST['BuildCSS-Merge'];
	$properties['Compiler']['options']['css']['merge'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['BuildJs-Merge'])):
	$arrived=$_POST['BuildJs-Merge'];
	$properties['Compiler']['options']['javascript']['merge'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['BuildJs-Compress'])):
	$arrived=$_POST['BuildJs-Compress'];
	$properties['Compiler']['options']['javascript']['compress'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;

//build phases
if (isset($_POST['phase_beta'])):
	$arrived=$_POST['phase_beta'];
	$properties['Compiler']['BuildPhases']['beta'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['phase_alfa'])):
	$arrived=$_POST['phase_alfa'];
	$properties['Compiler']['BuildPhases']['alfa'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['phase_rc'])):
	$arrived=$_POST['phase_rc'];
	$properties['Compiler']['BuildPhases']['rc'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['phase_final'])):
	$arrived=$_POST['phase_final'];
	$properties['Compiler']['BuildPhases']['final'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;


//development settings
// directory folder overrride default names 
if(isset($_POST['override_name_local'])):
	$properties['development']['folders']['local']= $_POST['override_name_local']=='' ? 'Default' : $_POST['override_name_local'];
	$code=$properties['development']['folders']['local'];
endif;
if(isset($_POST['override_name_web'])):
	$properties['development']['folders']['web']=$_POST['override_name_web']=='' ? 'Default' : $_POST['override_name_web'];
	$code=$properties['development']['folders']['web'];
endif;
if(isset($_POST['override_name_mobile'])):
	$properties['development']['folders']['mobile']=$_POST['override_name_mobile']=='' ? 'Default' : $_POST['override_name_mobile'];
	$code=$properties['development']['folders']['mobile'];
endif;
if(isset($_POST['override_name_tablet'])):
	$properties['development']['folders']['tablet']=$_POST['override_name_tablet']=='' ? 'Default' : $_POST['override_name_tablet'];
	$code=$properties['development']['folders']['tablet'];
endif;

// file versioning
if (isset($_POST['FileVersioning'])):
	$arrived=$_POST['FileVersioning'];
	$properties['development']['versioning'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['VersioningDistroType'])):
	$arrived=$_POST['VersioningDistroType'];
	$properties['development']['Distribution'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['VersioningCustomTxt'])):
	$arrived=$_POST['VersioningCustomTxt'];
	$properties['development']['CustomText'] = $arrived;
	$code=$arrived;
endif;

// repository
if (isset($_POST['Github-enabler'])):
	$arrived=$_POST['Github-enabler'];
	$properties['development']['repository']['Github'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['SVN-enabler'])):
	$arrived=$_POST['SVN-enabler'];
	$properties['development']['repository']['SVN'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;

//Servers
//ftp hosting
if (isset($_POST['hosting-local-ftp'])):
	$arrived=$_POST['hosting-local-ftp'];
	$properties['server']['hosting']['local']['ftp'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['hosting-local-addr'])):
	$arrived=$_POST['hosting-local-addr'];
	$properties['server']['hosting']['local']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-local-user'])):
	$arrived=$_POST['hosting-local-user'];
	$properties['server']['hosting']['local']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-local-pwd'])):
	$arrived=$_POST['hosting-local-pwd'];
	$properties['server']['hosting']['local']['pwd'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-local-port'])):
	$arrived=$_POST['hosting-local-port'];
	$properties['server']['hosting']['local']['port'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-local-remotePath'])):
	$arrived=$_POST['hosting-local-remotePath'];
	$properties['server']['hosting']['local']['remotePath'] = $arrived;
	$code=$arrived;
endif;

if (isset($_POST['hosting-web-ftp'])):
	$arrived=$_POST['hosting-web-ftp'];
	$properties['server']['hosting']['web']['ftp'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['hosting-web-addr'])):
	$arrived=$_POST['hosting-web-addr'];
	$properties['server']['hosting']['web']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-web-user'])):
	$arrived=$_POST['hosting-web-user'];
	$properties['server']['hosting']['web']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-web-pwd'])):
	$arrived=$_POST['hosting-web-pwd'];
	$properties['server']['hosting']['web']['pwd'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-web-port'])):
	$arrived=$_POST['hosting-web-port'];
	$properties['server']['hosting']['web']['port'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-web-remotePath'])):
	$arrived=$_POST['hosting-web-remotePath'];
	$properties['server']['hosting']['web']['remotePath'] = $arrived;
	$code=$arrived;
endif;

if (isset($_POST['hosting-mobile-ftp'])):
	$arrived=$_POST['hosting-mobile-ftp'];
	$properties['server']['hosting']['mobile']['ftp'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['hosting-mobile-addr'])):
	$arrived=$_POST['hosting-mobile-addr'];
	$properties['server']['hosting']['mobile']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-mobile-user'])):
	$arrived=$_POST['hosting-mobile-user'];
	$properties['server']['hosting']['mobile']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-mobile-pwd'])):
	$arrived=$_POST['hosting-mobile-pwd'];
	$properties['server']['hosting']['mobile']['pwd'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-mobile-port'])):
	$arrived=$_POST['hosting-mobile-port'];
	$properties['server']['hosting']['mobile']['port'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-mobile-remotePath'])):
	$arrived=$_POST['hosting-mobile-remotePath'];
	$properties['server']['hosting']['mobile']['remotePath'] = $arrived;
	$code=$arrived;
endif;

if (isset($_POST['hosting-tablet-ftp'])):
	$arrived=$_POST['hosting-tablet-ftp'];
	$properties['server']['hosting']['tablet']['ftp'] = $arrived ? 1 : 0 ;
	$code=$arrived;
endif;
if (isset($_POST['hosting-tablet-addr'])):
	$arrived=$_POST['hosting-tablet-addr'];
	$properties['server']['hosting']['tablet']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-tablet-user'])):
	$arrived=$_POST['hosting-tablet-user'];
	$properties['server']['hosting']['tablet']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-tablet-pwd'])):
	$arrived=$_POST['hosting-tablet-pwd'];
	$properties['server']['hosting']['tablet']['pwd'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-tablet-port'])):
	$arrived=$_POST['hosting-tablet-port'];
	$properties['server']['hosting']['tablet']['port'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['hosting-tablet-remotePath'])):
	$arrived=$_POST['hosting-tablet-remotePath'];
	$properties['server']['hosting']['tablet']['remotePath'] = $arrived;
	$code=$arrived;
endif;

// database servers
if (isset($_POST['DB-local-addr'])):
	$arrived=$_POST['DB-local-addr'];
	$properties['server']['database']['local']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-local-user'])):
	$arrived=$_POST['DB-local-user'];
	$properties['server']['database']['local']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-local-pwd'])):
	$arrived=$_POST['DB-local-pwd'];
	$properties['server']['database']['local']['pwd'] = $arrived;
	$code=$arrived;
endif;

if (isset($_POST['DB-web-addr'])):
	$arrived=$_POST['DB-web-addr'];
	$properties['server']['database']['web']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-web-user'])):
	$arrived=$_POST['DB-web-user'];
	$properties['server']['database']['web']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-web-pwd'])):
	$arrived=$_POST['DB-web-pwd'];
	$properties['server']['database']['web']['pwd'] = $arrived;
	$code=$arrived;
endif;

if (isset($_POST['DB-mobile-addr'])):
	$arrived=$_POST['DB-mobile-addr'];
	$properties['server']['database']['mobile']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-mobile-user'])):
	$arrived=$_POST['DB-mobile-user'];
	$properties['server']['database']['mobile']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-mobile-pwd'])):
	$arrived=$_POST['DB-mobile-pwd'];
	$properties['server']['database']['mobile']['pwd'] = $arrived;
	$code=$arrived;
endif;

if (isset($_POST['DB-tablet-addr'])):
	$arrived=$_POST['DB-tablet-addr'];
	$properties['server']['database']['tablet']['addr'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-tablet-user'])):
	$arrived=$_POST['DB-tablet-user'];
	$properties['server']['database']['tablet']['user'] = $arrived;
	$code=$arrived;
endif;
if (isset($_POST['DB-tablet-pwd'])):
	$arrived=$_POST['DB-tablet-pwd'];
	$properties['server']['database']['tablet']['pwd'] = $arrived;
	$code=$arrived;
endif;

// database types installed
if (isset($_POST['DBTypeAddPostgre']) or isset($_POST['DBTypeAddMsSQL']) or isset($_POST['DBTypeAddMySQL'])):
	if ($_POST['DBTypeAdd']=='.Local'):
		$where='local';
	elseif ($_POST['DBTypeAdd']=='.Web'):
		$where='web';
	elseif ($_POST['DBTypeAdd']=='.Mobile'):
		$where='mobile';
	elseif ($_POST['DBTypeAdd']=='.Tablet'):
		$where='tablet';
	endif;
	
	$code='';
	$index=isset($properties['server']['database'][$where]['type']) ? count($properties['server']['database'][$where]['type']) : 0 ;	
	
	
	if(isset($_POST['DBTypeAddPostgre'])):
		if($_POST['DBTypeAddPostgre']==1):
			$proceed=false;
			if(isset($properties['server']['database'][$where]['type'])):
			 	if(!(in_array('Postgre', $properties['server']['database'][$where]['type']) and in_array($_POST['DBTypeAddPostgreVersion'], $properties['server']['database'][$where]['version']))):
			 		$proceed=true;
			 	endif;
			 else:
			 	$proceed=true;
			 endif;
			if($proceed): 
				$properties['server']['database'][$where]['type'][$index]='Postgre';
				$properties['server']['database'][$where]['version'][$index]=$_POST['DBTypeAddPostgreVersion'];
				$index++;
			endif;
		endif;
	endif;
	
	if (isset($_POST['DBTypeAddMsSQL'])):	
		if($_POST['DBTypeAddMsSQL']==1):
			$proceed=false;
			if(isset($properties['server']['database'][$where]['type'])):
				if( !(in_array('MsSQL', $properties['server']['database'][$where]['type']) and in_array($_POST['DBTypeAddMsSQLVersion'], $properties['server']['database'][$where]['version']))):
					$proceed=true;
				endif;
			else:
				$proceed=true;
			endif;
			if($proceed): 
				$properties['server']['database'][$where]['type'][$index]='MsSQL';
				$properties['server']['database'][$where]['version'][$index]=$_POST['DBTypeAddMsSQLVersion'];
				$index++;
			endif;
		endif;
	endif;
	
	if (isset($_POST['DBTypeAddMySQL'])):
		if($_POST['DBTypeAddMySQL']==1):
			$proceed=false;
			if(isset($properties['server']['database'][$where]['type'])):
				if(!(in_array('MySQL', $properties['server']['database'][$where]['type']) and in_array($_POST['DBTypeAddMySQLVersion'], $properties['server']['database'][$where]['version']))):
					$proceed=true;
				endif;
			else:
				$proceed=true;
			endif;
		
			if($proceed): 
				$properties['server']['database'][$where]['type'][$index]='MySQL';
				$properties['server']['database'][$where]['version'][$index]=$_POST['DBTypeAddMySQLVersion'];		
				$index++;
			endif;
		endif;
	endif;
	
	$code.='<select id ="DBListCfgSelect" name="DBListCfgSelect" size="7" class="ms-files" >';
	$where=array('local','web','mobile','tablet');
	$empty=true;
	for ($j = 0; $j < count($where); $j++):	
		if (isset($properties['server']['database'][$where[$j]]['type'][0])):
			for ($i = 0; $i < count($properties['server']['database'][$where[$j]]['type']); $i++):
				$code.='<option> .'.$where[$j].' ('.$properties['server']['database'][$where[$j]]['type'][$i].' '.$properties['server']['database'][$where[$j]]['version'][$i].')</option>';
				$empty=false;
			endfor;		
		endif;
	endfor;
	
	if ($empty):
		$code ='<p class="">No Database Types Configured</p>';
	else:
		$code.='</select>'; // is a HTML5 forms list
	endif;

endif;
//Remove item from selection
if(isset($_POST['DBListCfgSelect'])):
	$ct=$_POST['DBListCfgSelect'];
	$where=explode("(", $ct);
	$type=explode("Ver.", $where[1]);
	$where=substr($where[0], 1);
	$where= preg_replace('/\s+/', '', $where);
	$version=substr($type[1],0, strlen($type[1])-1);
	$version= preg_replace('/\s+/', '', $version);
	$type= preg_replace('/\s+/', '', $type[0]);
	
	$code='';
	
	$array=$properties['server']['database'][$where]['type'];
	if (($key = array_search($type, $array)) !== false):
	    array_splice($array, $key, 1);
	endif;
	$properties['server']['database'][$where]['type']=$array;	

	$array=$properties['server']['database'][$where]['version'];
	if (($key = array_search($type, $array)) !== false):
	    array_splice($array, $key, 1);
	endif;
	$properties['server']['database'][$where]['version']=$array;	
	
	
	$code.='<select id ="DBListCfgSelect" name="DBListCfgSelect" size="7" class="ms-files" >';
	
	$where=array('local','web','mobile','tablet');
	$empty=true;
	for ($j = 0; $j < count($where); $j++):	
		if (isset($properties['server']['database'][$where[$j]]['type'][0])):
			for ($i = 0; $i < count($properties['server']['database'][$where[$j]]['type']); $i++):
				$code.='<option> .'.$where[$j].' ('.$properties['server']['database'][$where[$j]]['type'][$i].' '.$properties['server']['database'][$where[$j]]['version'][$i].')</option>';
				$empty=false;
			endfor;		
		endif;
	endfor;
	
	if ($empty):
		$code ='<p class="">No Database Types Configured</p>';
	else:
		$code.='</select>'; // is a HTML5 forms list
	endif;
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

$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>