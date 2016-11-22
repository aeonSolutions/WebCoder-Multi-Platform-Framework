function PreSelectScope(WhereID, selectScope) {
	if (selectScope =='New Scope') {
		document.getElementById("SearchScope").style.backgroundColor="initial";
		document.getElementById("SearchScope").style.color="#000000";
		document.getElementById('ScopeSelectionID').value='';	
	}else {	
		if (selectScope.length>9) {
			selectScope= selectScope.substring(0, 9) + '...';
		}
		document.getElementById("SearchScope").style.backgroundColor="#2580ED";
		document.getElementById("SearchScope").style.color="#FFFFFF";
	
		document.getElementById('ScopeSelectionID').value=WhereID;	
	}	
	document.getElementById("SearchScope").innerHTML='<i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;' + selectScope;
}

////////////////////////////////////////////////////////////////||||||||||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function SearchQuery(task) {
	if (task=='start') {
		var color ='#000000';
		var value ='';
	} else if (task=='reset') {
		var color ='#cccccc';
		var value ='Text';		
	}
	document.getElementById('SearchQuery').style.color= color;
	document.getElementById('SearchQuery').value= value;
}

////////////////////////////////////////////////////////////////||||||||||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function switchInput() {
	var inline = document.getElementById('inlineContainer');
	var multi = document.getElementById('multiLineContainer');
	var contents = document.getElementById('SearchQuery').value;
	if (inline.innerHTML =='') {
		inline.innerHTML='<input class="searchBox searchbox-inline SanFrancisco" type="text" id="SearchQuery" onclick="javascript: SearchQuery(\'start\');" onblur="javascript: SearchQuery(\'reset\');" value="'+ contents +'" />';
		multi.innerHTML='';
		document.getElementById('SwitchOpt').innerHTML='<i class="fa fa-list fa-fw" aria-hidden="true"></i>';
	}else {
		inline.innerHTML='';
		multi.innerHTML='<textarea style="resize: none; height: 200px;"  id="SearchQuery" name="SearchQuery" class="searchBox searchbox-multi SanFrancisco" onclick="javascript: SearchQuery(\'start\');" onblur="javascript: SearchQuery(\'reset\');">'+ contents +'</textarea>';	
		document.getElementById('SwitchOpt').innerHTML='<i class="fa fa-pencil-square fa-fw" aria-hidden="true"></i>';
	}
}

//////////////////////////////////////////////////////////////|||||||||||||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function refreshScopes() {
	
	AjxSimpleHtml('SearchScopesList','system/runtime/SearchLoadscope.server.php?NewScope=1');
//  ToDo: open filters open on add new
}

//////////////////////////////////////////////////////////////|||||||||||||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
