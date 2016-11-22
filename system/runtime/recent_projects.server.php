<?php
$list=glob($server['root']['path']."workplace/projects/*",GLOB_ONLYDIR);
if(count($list)<1):
	$html_buffer='No Recent Projects';
else:
	$code=file_get_contents($server['root']['path'].'system/GUI/frontend/recent_projects/last_projects.html');
	$where_any = false;
	$html_buffer='';
	for ($i = 0; $i < count($list); $i++):
		$proj_name=explode("/", $list[$i]);
		if(is_file($list[$i].'/'.$proj_name[count($proj_name)-1].'.proj')):
			$where_any = true;
			$a_link="AjxFull('".$proj_name[count($proj_name)-1]."')";
			$tmp=str_replace("{proj_link}", $a_link, $code);
			$tmp=str_replace("{proj_name}", $proj_name[count($proj_name)-1], $tmp);
			include($list[$i].'/'.$proj_name[count($proj_name)-1].'.proj');
			$html_buffer.= str_replace("{proj_descr}", $properties['identity']['identifier'], $tmp).'</br>';
		endif;
	endfor;
	if ($where_any===false):
		$html_buffer= 'No Recent Projects';		
	endif;
endif;
$code=file_get_contents($server['root']['path'].'system/GUI/frontend/recent_projects/placeholder.html');
echo str_replace("{html_buffer}", $html_buffer, $code);
?>

