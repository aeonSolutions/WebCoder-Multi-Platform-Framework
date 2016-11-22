<?php
// Tree List of Code in use such as functions, classes, objects, ....

if (isset($_GET['cfg'])):
	$cfg=$_GET['cfg'];
else:
	$cfg=-1;
endif;


$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

$html_template=file_get_contents($server['root']['path'].'system/GUI/frontend/projectLibrary/listLibraries.html');
$html_platform=file_get_contents($server['root']['path'].'system/GUI/frontend/projectLibrary/ListLibrariesPlatform.html');
$html_resources=file_get_contents($server['root']['path'].'system/GUI/frontend/projectLibrary/ListLibrariesSub.html');

include($server['root']['path'].'system/config/status.cfg');
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/resources/config/objects.proj');

// load functions
$resFunc['Local']='<ul>';
$resFunc['Web']='<ul>';
$resFunc['Mobile']='<ul>';
$resFunc['Tablet']='<ul>';
for ($i = 0; $i < count($functions['platform']); $i++):
	$resFunc[$functions['platform'][$i]] .='<li><a href="#" onclick="javascript:">'.$functions['name'][$i].'</a></li>';
endfor;
$resFunc['Local'].='</ul>';
$resFunc['Web'].='</ul>';
$resFunc['Mobile'].='</ul>';
$resFunc['Tablet'].='</ul>';

// load objects
$resObj['Local']='<ul>';
$resObj['Web']='<ul>';
$resObj['Mobile']='<ul>';
$resObj['Tablet']='<ul>';
for ($i = 0; $i < count($objects['platform']); $i++):
	$resObj[$objects['platform'][$i]] .='<li><a href="#" onclick="javascript:">'.$objects['name'][$i].'</a></li>';
endfor;
$resObj['Local'].='</ul>';
$resObj['Web'].='</ul>';
$resObj['Mobile'].='</ul>';
$resObj['Tablet'].='</ul>';

// load Html ID
$resHtml['Local']='<ul>';
$resHtml['Web']='<ul>';
$resHtml['Mobile']='<ul>';
$resHtml['Tablet']='<ul>';
for ($i = 0; $i < count($htmlIDs['platform']); $i++):
	$resHtml[$htmlIDs['platform'][$i]] .='<li><a href="#" onclick="javascript:">'.$htmlIDs['name'][$i].'</a></li>';
endfor;
$resHtml['Local'].='</ul>';
$resHtml['Web'].='</ul>';
$resHtml['Mobile'].='</ul>';
$resHtml['Tablet'].='</ul>';

// load CSS
$resCss['Local']='<ul>';
$resCss['Web']='<ul>';
$resCss['Mobile']='<ul>';
$resCss['Tablet']='<ul>';
for ($i = 0; $i < count($CssClasses['platform']); $i++):
	$resCss[$CssClasses['platform'][$i]] .='<li><a href="#" onclick="javascript:">'.$CssClasses['name'][$i].'</a></li>';
endfor;
$resCss['Local'].='</ul>';
$resCss['Web'].='</ul>';
$resCss['Mobile'].='</ul>';
$resCss['Tablet'].='</ul>';

// check settings for Project options
$codeP[0]='';
if($properties['deployment']['Platform']['Local']=='1'):
	$resource='';
	$tmp='';
	if($resFunc['Local']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "LocalFunctions", $html_resources);
		$tmp = str_replace("{resource}", "Functions", $tmp);
		$tmp = str_replace("{libraries_resources}",$resFunc['Local'] , $tmp);	
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_function.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resObj['Local']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "LocalObjects", $html_resources);
		$tmp = str_replace("{resource}", "Objects", $tmp);
		$tmp = str_replace("{libraries_resources}",$resObj['Local'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_object.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resHtml['Local']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "LocalHTML", $html_resources);
		$tmp = str_replace("{resource}", "HTML", $tmp);
		$tmp = str_replace("{libraries_resources}",$resHtml['Local'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_html.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resCss['Local']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "LocalCSS", $html_resources);
		$tmp = str_replace("{resource}", "CSS", $tmp);
		$tmp = str_replace("{libraries_resources}",$resCss['Local'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_css.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if ($resource<>''):
		$codeP[]=str_replace("{platform}","Local", $html_platform);
		$codeP[count($codeP)-1]=str_replace("{libraries_sub}",$resource, $codeP[count($codeP)-1]);
	endif;
endif;

if($properties['deployment']['Platform']['Web']=='1'):
	$resource='';
	$tmp='';
	if($resFunc['Web']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "WebFunctions", $html_resources);
		$tmp = str_replace("{resource}", "Functions", $tmp);
		$tmp = str_replace("{libraries_resources}",$resFunc['Web'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_function.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resObj['Web']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "WebObjects", $html_resources);
		$tmp = str_replace("{resource}", "Objects", $tmp);
		$tmp = str_replace("{libraries_resources}",$resObj['Web'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_object.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resHtml['Web']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "WebHTML", $html_resources);
		$tmp = str_replace("{resource}", "HTML", $tmp);
		$tmp = str_replace("{libraries_resources}",$resHtml['Web'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_html.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resCss['Web']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "WebCSS", $html_resources);
		$tmp = str_replace("{resource}", "CSS", $tmp);
		$tmp = str_replace("{libraries_resources}",$resCss['Web'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_css.png' , $tmp);	
	endif;
	$resource.=$tmp;
	
	if ($resource<>''):
		$codeP[]=str_replace("{platform}","Web", $html_platform);
		$codeP[count($codeP)-1]=str_replace("{libraries_sub}",$resource, $codeP[count($codeP)-1]);		
	endif;
endif;

if($properties['deployment']['Platform']['Smartphone']=='1'):
	$resource='';
	$tmp='';
	if($resFunc['Mobile']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "MobileFunctions", $html_resources);
		$tmp = str_replace("{resource}", "Functions", $tmp);
		$tmp = str_replace("{libraries_resources}",$resFunc['Mobile'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_function.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resObj['Mobile']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "MobileObjects", $html_resources);
		$tmp = str_replace("{resource}", "Objects", $tmp);
		$tmp = str_replace("{libraries_resources}",$resObj['Mobile'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_object.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resHtml['Mobile']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "MobileHTML", $html_resources);
		$tmp = str_replace("{resource}", "HTML", $tmp);
		$tmp = str_replace("{libraries_resources}",$resHtml['Mobile'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_html.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resCss['Mobile']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "MobileCSS", $html_resources);
		$tmp = str_replace("{resource}", "CSS", $tmp);
		$tmp = str_replace("{libraries_resources}",$resCss['Mobile'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_css.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if ($resource<>''):
		$codeP[]=str_replace("{platform}","Mobile", $html_platform);
		$codeP[count($codeP)-1]=str_replace("{libraries_sub}",$resource, $codeP[count($codeP)-1]);
	endif;
endif;

if($properties['deployment']['Platform']['Tablet']=='1'):
	$resource='';
	$tmp='';
	if($resFunc['Tablet']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "TabletFunctions", $html_resources);
		$tmp = str_replace("{resource}", "Functions", $tmp);
		$tmp = str_replace("{libraries_resources}",$resFunc['Tablet'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_function.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resObj['Tablet']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "TabletObjects", $html_resources);
		$tmp = str_replace("{resource}", "Objects", $tmp);
		$tmp = str_replace("{libraries_resources}",$resObj['Tablet'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_object.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resHtml['Tablet']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "TabletHTML", $html_resources);
		$tmp = str_replace("{resource}", "HTML", $tmp);
		$tmp = str_replace("{libraries_resources}",$resHtml['Tablet'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_html.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if($resCss['Tablet']<>'<ul></ul>'):	
		$tmp = str_replace("{platform}{resource}", "TabletCSS", $html_resources);
		$tmp = str_replace("{resource}", "CSS", $tmp);
		$tmp = str_replace("{libraries_resources}",$resCss['Tablet'] , $tmp);		
		$tmp = str_replace("{img}",'system/GUI/Graphics/icons/lib_css.png' , $tmp);	
	endif;
	$resource.=$tmp;
	if ($resource<>''):
		$codeP[]=str_replace("{platform}","Tablet", $html_platform);
		$codeP[count($codeP)-1]=str_replace("{libraries_sub}",$resource, $codeP[count($codeP)-1]);
	endif;
endif;
$resource='';
for ($i = 0; $i < count($codeP); $i++):
	$resource.=$codeP[$i];
endfor;
$code=str_replace("{main_code}",$resource , $html_template);


$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;
?>