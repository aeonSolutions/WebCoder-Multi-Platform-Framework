<?php
/* 
Helper to find programming errors
- find missing ; on each line
- find missing : on reserved PHP statements: IF ELSE FOR WHILE FOREACH ...
- find double variable assignment: $$
- find unclosed ) on statments
- find unclosed strings
- find undeclared variables !!!!!!ToDo
*/

//load initial file
//from include on index file to rewrite when integrating into webcoder
$fileIni=$server['root']['path'].'system/GUI/Designs/default/index.php';
$FilesPile[]='system/GUI/Designs/default/index.php';

$contents=file_get_contents($fileIni);

//build list of included files from initial & remove duplicates
preg_match_all('/\include\b/', $contents, $result, PREG_OFFSET_CAPTURE); // ERROR on include_once !!!!!

$FilesPile=FindIncludedFiles($contents, $FilesPile, $server['root']['path'], 
'/
        # Match PHP include variations with single string literal filename.
        \b              # Anchor to word boundary.
        (?:             # Group for include variation alternatives.
          include       # Either "include"
        | require       # or "require"
        | include_once  # or "include_once"
        | require_once  # or "require_once"
        )               # End group of include variation alternatives.
        (?:_once)?      # Either one may be the "once" variation.
        \s*             # Optional whitespace.
        (               # $1: Optional opening parentheses.
          \(            # Literal open parentheses,
          \s*           # followed by optional whitespace.
        )?              # End $1: Optional opening parentheses.
        (?|             # "Branch reset" group of filename alts.
          \'([^\']+)\'  # Either $2{1]: Single quoted filename,
        | "([^"]+)"     # or $2{2]: Double quoted filename.
        )               # End branch reset group of filename alts.
        (?(1)           # If there were opening parentheses,
          \s*           # then allow optional whitespace
          \)            # followed by the closing parentheses.
        )               # End group $1 if conditional.
        \s*             # End statement with optional whitespace
        ;               # followed by semi-colon.
        /ix'

);
$FilesPile=array_unique($FilesPile, SORT_REGULAR); //remove duplicate entries

// find line by line incomplete statements: unclosed ) and missing : and ; and invalid var's assignment $$
for ($i = 0; $i < count($FilesPile); $i++):
	
	$handle = fopen($server['root']['path'].$FilesPile[$i], "r");
	if ($handle):
		$LineNum=1;
		$phpOn=false;
		$CommentOn=false;
		$linePhpOn=$LineNum;
		$lineComentOn=$LineNum;
	    while (($line = fgets($handle)) !== false):
	    	$line='#'.$line;
	    				
			$PhpOnPos=strpos(strtolower($line), "<?php");
			if ($PhpOnPos):
				$phpOn=true;
				$linePhpOn=$LineNum;
				if (ord($line[$PhpOnPos+5])==10 or ord($line[$PhpOnPos+5])==13):
					$LineNum++;
					continue;
				endif;
			endif;
			
			if (strpos(strtolower($line), "?>") and $LineNum>$linePhpOn): // falta verificar se tem codigo antes da closing tag
				$phpOn=false;
			endif;			

			if($phpOn===false):
				$LineNum++;
				continue;
			endif;
			
			if(ord($line[1])==10 or ord($line[1])==13):
				$LineNum++;
				continue;				
			endif;
			
			// from here on line of code is PHP
			$CommentOnPos=strpos(strtolower($line), "/*");
			if ($CommentOnPos):
				$CommentOn=true;
				$lineCommentOn=$LineNum;
				if (ord($line[$CommentOnPos+2])==10 or ord($line[$CommentOnPos+2])==13 or strpos(strtolower($line) , "/*", $CommentOnPos)):
					$LineNum++;
					continue;
				endif;
			endif;
			
			if (strpos(strtolower($line), "*/") and $LineNum>$lineCommentOn and $CommentOn==true):  // falta verificar se tem codigo depois da closing tag
				$CommentOn=false;
				$LineNum++;
				continue;
			endif;
			
			$pos3=false;
			if(strpos(strtolower($line), "elseif")):
				$pos3=strpos(strtolower($line), "elseif")+6;
			elseif(strpos(strtolower($line), "else")):
				$pos3=strpos(strtolower($line), "else")+4;
			endif;
			
			// start statments
			$pos1=false;
			if(strpos(strtolower($line), "if(")):
				$pos1=strpos(strtolower($line), "if(");
			elseif(strpos(strtolower($line), "if (")):
				$pos1=strpos(strtolower($line), "if (");
			elseif(strpos(strtolower($line), "for(")):
				$pos1=strpos(strtolower($line), "for(");
			elseif(strpos(strtolower($line), "for (")):
				$pos1=strpos(strtolower($line), "for (");
			elseif(strpos(strtolower($line), "foreach(")):
				$pos1=strpos(strtolower($line), "foreach(");
			elseif(strpos(strtolower($line), "foreach (")):
				$pos1=strpos(strtolower($line), "foreach (");
			elseif(strpos(strtolower($line), "while(")):
				$pos1=strpos(strtolower($line), "while(");	
			elseif(strpos(strtolower($line), "while (")):
				$pos1=strpos(strtolower($line), "while (");	
			endif;
			
			//end statments
			$pos2=false;
			if(strpos(strtolower($line), "endif")):
				$pos2=strpos(strtolower($line), "endif")+5;
			elseif(strpos(strtolower($line), "endforeach")):
				$pos2=strpos(strtolower($line), "endforeach")+10;
			elseif(strpos(strtolower($line), "endfor")):
				$pos2=strpos(strtolower($line), "endfor")+6;
			elseif(strpos(strtolower($line), "endwhile")):
				$pos2=strpos(strtolower($line), "endwhile")+8;	
			endif;
			
			if($pos3 and $line[$pos3]==':'):
	        	echo '":" OK! elsexx statment '.$LineNum.'('.$FilesPile[$i].')<br>';
			elseif($pos3 and $line[$pos3]<>':'):
				echo 'Missing ":" @ end of elsexx statment. Line '.$LineNum.'('.$FilesPile[$i].')'.$line[$pos2].$pos2.'<br>';
			elseif ($pos2 and $line[$pos2]<>';'): // end statments
				echo 'Missing ";" @ end of end statment. Line '.$LineNum.'('.$FilesPile[$i].')'.$line[$pos2].$pos2.'<br>';
			elseif ($pos2 and $line[$pos2]==';'): // end statments
	        	echo '";" OK! end statment '.$LineNum.'('.$FilesPile[$i].')<br>';
	        elseif ($pos1)://start statments
	        	if ($pos2=strpos(strtolower($line), ")", $pos1)):
		        	if (strpos(strtolower($line), ":", $pos2)):
	        			echo '":" OK! start statment '.$LineNum.'('.$FilesPile[$i].')<br>';
	        		else:
	        			echo 'Missing ":" @ end of start statment. Line '.$LineNum.'('.$FilesPile[$i].')<br>';
	        		endif;
	        	else:
	        		echo 'Missing ")" @ end of start statment. Line '.$LineNum.'('.$FilesPile[$i].')<br>';
	        	endif;	        
			elseif (strpos($line, "$$")) :
				echo 'Double variable assignemnt  "$$" '.$LineNum.'('.$FilesPile[$i].')<br>';
			else: // normal code line
				if (strpos(strtolower($line), ";")):
					echo '";" OK! regular code line '.$LineNum.'('.$FilesPile[$i].')<br>';
				else:
					echo 'Missing ";" @ end of line '.$LineNum.'('.$FilesPile[$i].')<br>';
				endif;
		        endif;
	        $LineNum++;
	    endwhile;
	    fclose($handle);
	else:
		exit('unable to open file for Helper');
	endif; 
endfor;


///////////////////////////////////////////// |||||||||  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function FindIncludedFiles($contents, $FilesPile, $path, $keyword){
	preg_match_all($keyword, $contents, $result, PREG_OFFSET_CAPTURE); // ERROR on include_once !!!!!
	if ($result[0]<>''): // included files found
		for ($i = 0; $i < count($result[0]); $i++):
			$PosFinal=strpos($contents, ')', $result[0][$i][1]);
			$NewFile=substr($contents, $result[0][$i][1]+9, $PosFinal-1 - ($result[0][$i][1]+9));
			if (is_file($path.$NewFile)): // dynamically included file found
				$FilesPile[]=$NewFile;
				$new_contents=file_get_contents($path.$NewFile);
				$FilesPile = FindIncludedFiles($new_contents, $FilesPile, $path, $keyword);				
			endif;
		endfor;
	endif;
	return $FilesPile;
};
///////////////////////////////////////////// |||||||||  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
?>