///////////////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function DlgFileOpenCfg(WhatToOpen, where) {
	document.getElementById('dlg-screen-mask').style.visibility='visible';
	AjxSilent("Dialogs-Loader", "system/runtime/DlgFileOpen.server.php?TypeofDlg="+ WhatToOpen + '&cfg='+where);
	document.getElementById('Dialogs-Loader').style.visibility='visible';
		
};

/////////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function DlgDirSelect(addrBar, FilesListing, path){
	document.getElementById('DlgLFAddrBarTitle').innerHTML='<img src="system/GUI/graphics/icons/folder.png" height="20px" class="fade-out" alt="" />';
	AjxSimpleHtml(addrBar, "system/runtime/DlgFilePath.server.php?p=" + path);
	AjxSimpleHtml(FilesListing, "system/runtime/DlgFileSelect.server.php?p=" + path);
};

////////////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function DlgFileSave(DivId){
	//ToDo: check if there are files to upload and Do Upload
	if (document.getElementById('DlgSelectedPath') == null) {
		document.getElementById('DlgLFAddrBarTitle').innerHTML='<img src="system/GUI/graphics/icons/folderMissing.png" height="20px" class="fade-in" alt="" />';
	} else {
		document.getElementById('dlg-screen-mask').style.visibility='hidden';
		path=document.getElementById('DlgPath').value;
		document.getElementById('Dialogs-Loader').innerHTML='';
		AjxSilent(DivId, "system/runtime/DlgFileSave.server.php?cfg="+ DivId+ "&path=" + path);
	}
};

////////////////////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function CfgRemoveListItem(DivId){
	document.getElementById('dlg-screen-mask').style.visibility='hide';	
	var select = DivId + '-select';
	var e = document.getElementById(select);
	var path = e.options[e.selectedIndex].text;
	path = path.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g,'-');
	AjxSilent(DivId, "system/runtime/DlgFileSave.server.php?cfg=" + DivId + "&remove=" + path);

};

///////////////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function DlgLoadSugarCfg(where) {
	document.getElementById('dlg-screen-mask').style.visibility='visible';
	AjxSilent("Dialogs-Loader", "system/runtime/DlgLoadSugar.server.php?cfg="+where);
	document.getElementById('Dialogs-Loader').style.visibility='visible';
		
};
////////////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function DlgSugarSave(DivId){
	var sel = document.getElementById("SugarListSelect");
	if(sel.selectedIndex == -1) {
		document.getElementById('SugarSearchBar').innerHTML='<img src="system/GUI/graphics/icons/Warning.png" height="20px" class="fade-in" alt="" /> Search';
	} else {
		var path= sel.options[sel.selectedIndex].text;
		document.getElementById('dlg-screen-mask').style.visibility='hidden';
		document.getElementById('Dialogs-Loader').innerHTML='';
		AjxSilent(DivId, "system/runtime/DlgLoadSugar.server.php?cfg="+ DivId+ "&file=" + path);
	}
};

////////////////////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
