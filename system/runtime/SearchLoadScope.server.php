<?php
$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

// ToDo: store last 5 scopes
// load searchscopes.cfg  and add to search scopes

include($server['root']['path'].'system/dll/IDSystem.class');
$gen = new IDSystem;

$ScopeCode='
<input type="hidden" name="ScopeSelectionID" id="ScopeSelectionID" value="" />
<h1 class="ArialBlack TextS0" style="color: #728293; text-shadow: none;">SEARCH SCOPES</h1>
<div class="ScopeOpt">
<ul>';
$SCodeLen=strlen($ScopeCode);

if (is_file($server['root']['path'].'system/config/searchScopes.cfg')):
	include($server['root']['path'].'system/config/searchScopes.cfg');
	if (isset($scope['name'][0])):
		if ($scope['name'][0]<>''):
			for ($i = 0; $i < count($scope['name']); $i++):
				
				$ScopeID=$gen->NewUID(10);
				$ScopeCode.='
			<li>
				<div class="stripped">
					<div class="stripped-left">	
						<a id="'.$ScopeID.'" onclick="javascript: PreSelectScope(\''.$ScopeID.'\',\''.$scope['name'][$i].'\');" ondblclick=""  href="#">
							<img src="system/GUI/Graphics/icons/squareSearch.png" height="14px" title="'.$scope['name'][$i].'" />&nbsp;'.$scope['name'][$i].'
						</a>
					</div>
					<div id="SearchEdit" class="stripped-right SanFrancisco TextS3" onclick="javascript: LoadContextMenu(\''.$ScopeID.'\', \'fm-'.$ScopeID.'\',\'system/runtime/SearchCodeFilters.server.php\');">Edit
					</div>
					<input type="hidden" id="'.$ScopeID.'-text" value="'.$scope['name'][$i].'" />
					<div id="fm-'.$ScopeID.'" class="SearchFilterBox SearchFilters">
						Content not loaded! hummm...better check code for bugs!
					</div>
				</div>
			</li>';
			endfor;
		endif;
	else:
		$scope['name'][0]='My Scope';
	endif;
endif;

if (strlen($ScopeCode)==$SCodeLen): // .cfg file is empty
	$ScopeID=$gen->NewUID(10);	
	$ScopeCode.='
			<li>
				<div class="stripped">
					<div class="stripped-left">			
						<a id="'.$ScopeID.'" onclick="javascript: PreSelectScope(\''.$ScopeID.'\',\'My Scope\');" ondblclick=""  href="#">
							<img src="system/GUI/Graphics/icons/squareSearch.png" height="14px" title="My Scope" />&nbsp;My Scope
						</a>
					</div>
					<div id="SearchEdit" class="stripped-right SanFrancisco TextS3" onclick="javascript: LoadContextMenu(\''.$ScopeID.'\', \'fm-'.$ScopeID.'\',\'system/runtime/SearchCodeFilters.server.php\');">Edit
					</div>
					<input type="hidden" id="'.$ScopeID.'-text" value="My Scope" />
				 	<div id="fm-'.$ScopeID.'" class="SearchFilterBox SearchFilters">
				 		Content not loaded! hummm...better check code for bugs!
				 	</div>

				</div>
			</li>
';
endif;

// new scope slected
$newScope='err';
if (isset($_GET['NewScope'])):
		$ScopeID=$gen->NewUID(10);
		$newScope=$ScopeID;	
		$ScopeCode.='
				<li>
					<div class="stripped">
						<div class="stripped-left">	
							<a id="'.$ScopeID.'" onclick="javascript: PreSelectScope(\''.$ScopeID.'\',\'My Scope\');" ondblclick=""  href="#">
							   		<img src="system/GUI/Graphics/icons/squareSearch.png" height="14px" title="My Scope" />&nbsp;My Scope
							</a>
						</div>
						<div id="SearchEdit" class="stripped-right SanFrancisco TextS3" onclick="javascript: LoadContextMenu(\''.$ScopeID.'\', \'fm-'.$ScopeID.'\',\'system/runtime/SearchCodeFilters.server.php\');">Edit
						</div>
					<input type="hidden" id="'.$ScopeID.'-text" value="My Scope" />
					 <div id="fm-'.$ScopeID.'"  class="SearchFilterBox SearchFilters">
					 	Content not loaded! hummm...better check code for bugs!
					 </div>
				 </div>
				</li>
			';
endif;

$ScopeID=$gen->NewUID(10);	
$ScopeCode.='<li>
				<div class="stripped">
    				<a onclick="javascript: refreshScopes();" ondblclick="" id="'.$ScopeID.'" href="#"><img src="system/GUI/Graphics/icons/squarePlus.png" height="14px" alt="" />&nbsp;New Scope
    				</a>
					<input type="hidden" id="newScope" value="'.$newScope.'" />    				
    			</div>
				</li>
';
//close inital DIV element
$ScopeCode.='</div>';

if (isset($_GET['NewScope'])):
	$ContentSize=strlen($ScopeCode);
	header ( "Pragma: no-cache" );
	header ( "Cache-Control: no-cache" );
	header("Content-Length: ".$ContentSize);//set header length
	echo $ScopeCode;
endif;

?>
