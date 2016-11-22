/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


/*	
style holds a multidimensional array of propreties in styles that are going to be changed. is in the form 
	items = [['element id','background','new value'],['element id','color','new value'],['element id','width','new value']];
    items[0][1] returns the value background
    items[0][2] returns the value new value
*/

function DlgUpdate(element, ajx_request){
	for(var i= 0, l = element.length; i< l; i++){
			document.getElementById(element[i][0]).style[element[i][1]]	= element[i][2];			
	}
	AjaxRequest(ajx_request[0], ajx_request[1]);
}


/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function DlgAbort(){
	document.getElementById('Dialogs-Loader').innerHTML='';
	document.getElementById('dlg-screen-mask').style.visibility='hidden';	
}


/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function LoadContextMenu(FromID, DestinationID, url, params, method) {
	if(Boolean(params)){
	    url = url + params;
	}
	url = url + getNoCacheValue(url);

	var ajaxRequest = getXMLHttpRequest();
	ajaxRequest.onreadystatechange = function(){
										if (ajaxRequest.readyState == 4) {
											if (ajaxRequest.status == 200) {
												var code = ajaxRequest.responseText;
												var check_script= FindScript(code);
												document.getElementById(DestinationID).innerHTML  =  code;
												if (check_script!= false) {
													invokeScript(DestinationID); 												
												}
												var scopeID=FromID + '-text';
												var link = document.getElementById(scopeID).value;
												PreSelectScope(FromID, link);
												ContextMenu(DestinationID, FromID);
											}else {
												document.getElementById(DestinationID).innerHTML  =  ajaxRequest.responseText;
											}
										}
									};
	MakeResponse(ajaxRequest, method, url, params);
}

