<?php
if (isset($_GET['place'])):
	$what=$_GET['place'];
else:
	exit('Missing var');
endif;
$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path
sleep(1);
include($server['root']['path'].'system/config/status.cfg');
include($server['root']['path'].'system/config/paths.cfg');
include($server['root']['path'].'system/config/browse_tree.cfg');
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');
include($server['root']['path'].'system/dll/DlgLocalHD.lib.php');

$ShowOnlyExt=false;
$JsVar='ProjTree';
$TreePlace=$JsVar.'-place'; //Div onde vai estar

$code='';
$code= '<script type="text/javascript">';
$code .= $JsVar." = new dTree('".$JsVar."','".$TreePlace."','".$server['address']['root']."/');".chr(13);
$code .= $JsVar.".add(0,-1,'".$properties['directory']['name']."','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/settings.php\');');".chr(13);

$code .= $JsVar.".add(1,0,'Disk Files','');".chr(13);
$code .= $JsVar.".add(2,0,'Development','');".chr(13);
$code .= $JsVar.".add(3,0,'Bundle','');".chr(13);
$code .= $JsVar.".add(4,0,'Desings','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/Designs.php\');');".chr(13);
$code .= $JsVar.".add(5,4,'.Local','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/Designs.php?to=local\');');".chr(13);
$code .= $JsVar.".add(6,4,'.Web','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/Designs.php?to=web\');');".chr(13);
$code .= $JsVar.".add(7,4,'.Mobile','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/Designs.php?to=mobile\');');".chr(13);
$code .= $JsVar.".add(8,4,'.Tablet','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/Designs.php?to=tablet\');');".chr(13);
$code .= $JsVar.".add(9,0,'StoryBoard','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/storyBoard.php\');');".chr(13);
$code .= $JsVar.".add(10,9,'.Local','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/storyBoard.php?to=local\');');".chr(13);
$code .= $JsVar.".add(11,9,'.Web','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/storyBoard.php?to=web\');');".chr(13);
$code .= $JsVar.".add(12,9,'.Mobile','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/storyBoard.php?to=mobile\');');".chr(13);
$code .= $JsVar.".add(13,9,'.Tablet','javascript:AjxSimpleHtml(\'board-main\',\'system/runtime/storyBoard.php?to=tablet\');');".chr(13);

$idx=14;
$dir=$server['root']['path'].'workplace/projects/'.$properties['directory']['name'];

$out=RecursiveTree($idx, 1, $JsVar, $dir, $hide_ext, $no_link_ext, $what,$ShowOnlyExt, false);

$code .= $out[1];
$code .= "document.getElementById('".$what."').innerHTML  = ".$JsVar.";".chr(13);
$code .= "document.getElementById('".$TreePlace."').style.height='910px';".chr(13);
$code .= "document.getElementById('".$TreePlace."').style.width='185px';".chr(13);
$code .='</script>'.chr(13);

echo $code;

?>