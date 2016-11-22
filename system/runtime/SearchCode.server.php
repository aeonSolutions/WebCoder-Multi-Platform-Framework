<?php
// search within code in project

if (isset($_GET['cfg'])):
	$cfg=$_GET['cfg'];
else:
	$cfg=-1;	
endif;

$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

if ($cfg==-1):
	$html_template=file_get_contents($server['root']['path'].'system/GUI/frontend/search/search.html');
	$java_code=file_get_contents($server['root']['path'].'system/GUI/frontend/search/search.js');
	$code='<script>'.$java_code.'</script>'.chr(13).$html_template;	
endif;
include($server['root']['path'].'system/config/status.cfg');
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');
// check settings for Project options
$searchProject='<div class="ScopeOpt"><ul>';
if($properties['deployment']['Platform']['Local']=='1'):
	$searchProject.='<li><a id="projScopeLocal" onclick="javascript: PreSelectScope(\'projScopeLocal\',\'.Local\');" ondblclick="" href="#"><img src="system/GUI/Graphics/icons/folder.png" height="14px" alt="" />&nbsp;.Local</a></li>';
endif;
if($properties['deployment']['Platform']['Web']=='1'):
	$searchProject.='<li><a id="projScopeWeb" onclick="javascript: PreSelectScope(\'projScopeWeb\',\'.Web\');" ondblclick="" href="#"><img src="system/GUI/Graphics/icons/folder.png" height="14px" alt="" />&nbsp;.Web</a></li>';
endif;
if($properties['deployment']['Platform']['Smartphone']=='1'):
	$searchProject.='<li><a id="projScopeMobile" onclick="javascript: PreSelectScope(\'projScopeMobile\',\'.Mobile\');" ondblclick="" href="#"><img src="system/GUI/Graphics/icons/folder.png" height="14px" alt="" />&nbsp;.Mobile</a></li>';
endif;
if($properties['deployment']['Platform']['Tablet']=='1'):
	$searchProject.='<li><a id="projScopeTablet" onclick="javascript: PreSelectScope(\'projScopeTablet\',\'.Tablet\');" ondblclick="" href="#"><img src="system/GUI/Graphics/icons/folder.png" height="14px" alt="" />&nbsp;.Tablet</a></li>';
endif;
$searchProject.='</ul></div>';
if ($searchProject=='<div class="ScopeOpt"><ul></ul></div>'):
	$searchProject='<p class="SanFrancisco TextS1" style="text-shadow:none; align-content: center; text-align: center;"><img src="system/GUI/Graphics/icons/warning.png" height="30px" alt="" /></br>Setup Platforms on Settings</p>';
endif;
$code=str_replace("{search_project}",$searchProject , $code);
// load search scopes
include($server['root']['path'].'system/runtime/SearchLoadScope.server.php'); // returns as global variable $ScopeCode
$code=str_replace("{search_scopes}",$ScopeCode , $code);

// load type of search
include($server['root']['path'].'system/runtime/SearchTypesLoad.server.php'); // returns as global variable $ScopeCode
$code=str_replace("{search_on_what}",$ScopeTypes , $code);

$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>

