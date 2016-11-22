<?php

///////////////////////////////////////////////////////////////////  |||||||||| \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function RecursiveTree($idx, $node_idx, $JsVar, $dir,  $hide_ext, $no_link_ext, $what, $ShowOnlyExt,$DirsOnly){
	$contents = '';
	foreach (scandir($dir) as $node):
		$ct='';
	    if ($node == '.' || $node == '..') continue;
		if (CheckFileExists($node, $hide_ext)) continue;
		if (is_dir($dir . '/' . $node)):
			$link= BuildLink($what, $dir . '/' . $node);
			$contents .= $JsVar.".add(".$idx.",".$node_idx.",'".$node."','".$link."','".$dir.'/'.$node."','system/GUI/graphics/icons/folder.gif','system/GUI/graphics/icons/folderopen.gif');".chr(13);
		    $out = RecursiveTree($idx+1, $idx, $JsVar, $dir.'/'.$node, $hide_ext, $no_link_ext, $what, $ShowOnlyExt,$DirsOnly);
		    $idx=$out[0];
		    $ct= $out[1];
		elseif($DirsOnly===false): // is a file
		 	$check=CheckFileExists($node, $no_link_ext);
		    $link= $check ? " " : BuildLink($what, $dir);
			if ($ShowOnlyExt<>false):
		    	if (CheckFileExists($node, $ShowOnlyExt)):
					$ct = $JsVar.".add(".$idx.",".$node_idx.",'".$node."','".$link."');".chr(13);
					$idx++;	
		    	endif;
		    else:
				$ct = $JsVar.".add(".$idx.",".$node_idx.",'".$node."','".$link."');".chr(13);
				$idx++;			    
		    endif;
		endif;	 		
	    $contents .= $ct;
	endforeach;
	
	$result[0]=$idx;
	$result[1]=$contents;
	return $result;
};

///////////////////////////////////////////////////////////////////||||||||||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function BuildLink($what, $path){
	$path=str_replace("/", "-", $path);
	if($what=='DlgLF-Dtree'):
		$link="javascript: DlgDirSelect(\'DlgLFAddrBarPath\', \'DlgLFFiles\', \'".$path."\');";
	else:
		$link="javascript:AjxLoadFile(\'".$path."\');";	
	endif;
	return $link;
};
///////////////////////////////////////////////////////////////////||||||||||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function CheckFileExists($FileName, $FileExtArray){
	for ($i = 0; $i < count($FileExtArray); $i++):
		if(strlen(strstr($FileName,$FileExtArray[$i]))>0):
			return true;
			break;
		endif;
	endfor;
	return false;
};
///////////////////////////////////////////////////////////////////||||||||||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
?>