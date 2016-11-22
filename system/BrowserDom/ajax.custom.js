
/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function AjxFull(ProjName){
	var method='GET';
	var params='';
	var url='system/runtime/environment_update.server.php?project='+ ProjName;

	document.getElementById('intro-dlg').style.visibility='hidden';
	document.getElementById('dlg-screen-wallpaper').style.visibility='hidden';
	
	
	document.getElementById('bar_span').style.width='0%';
	document.getElementById('bar_text').innerHTML='Loading project... please wait!';
	
	url = url + '&to=main&project='+ ProjName;
	AjxSimpleHtml('board-main', url);
	document.getElementById('bar_span').style.width='10%';
	document.getElementById('bar_text').innerHTML='Loading project... File structure';

	url='system/runtime/ProjectTree.server.php?project='+ ProjName + '&place=sbl-tab1';
	AjxSimpleHtml('sbl-tab1', url);
	document.getElementById('bar_span').style.width='20%';
	document.getElementById('bar_text').innerHTML='Loading project... Log files';
			
	document.getElementById('dlg-screen-mask').style.visibility='hidden';
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function AjxLoadFile(file){
	var method='GET';
	var params='';
	var url='system/runtime/environment_update.server.php?file='+ file;
	
	document.getElementById('bar_span').style.width='0%';
	document.getElementById('bar_text').innerHTML='Loading file... please wait!';
	
	document.getElementById('sbr-toggle-tab3').style.visibility='hide';
	document.getElementById('sbr-toggle-tab4').style.visibility='hide';
	document.getElementById('sbr-toggle-tab4').style.visibility='hide';
	document.getElementById('sbr-toggle-tab5').style.visibility='hide';
	document.getElementById('sbr-toggle-tab6').style.visibility='hide';
	
	url = url + '&to=main';
	AjxSimpleHtml('board-main', url);
	document.getElementById('bar_span').style.width='10%';
	document.getElementById('bar_text').innerHTML='Loading project... File structure';

	url='system/runtime/ProjectTree.server.php?file='+ file + '&place=sbl-tab1';
	AjxSimpleHtml('sbl-tab1', url);
	document.getElementById('bar_span').style.width='20%';
	document.getElementById('bar_text').innerHTML='Loading project... Log files';
			
	document.getElementById('dlg-screen-mask').style.visibility='hidden';
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\






     



