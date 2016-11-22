/* Todo: 
	add loading wheel on text links

*/

/* common method to get XMLHttp request object */
function getXMLHttpRequest(){
	var req;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	return ajaxRequest;
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function getNoCacheValue(url){
	var d = new Date();
	var appendstring = (url.indexOf("?") != -1) ? "&" : "?";
	var nocachevalue = appendstring + "no-cache=" + d.getTime();
	return nocachevalue
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function MakeResponse(ajaxRequest, method, url, params){
	if (method=='P' || method=='p' || method=='post') {
		method ='POST';
	} else if (method=='g' || method=='G' || method=='get') {
		method ='GET;'
	} else {
		method='GET';
	}
	
	ajaxRequest.open(method, url, true);
	if (method=='POST') {
		ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
		ajaxRequest.send(params); //need to be sent without ?
	} else {
		ajaxRequest.send(null); 
	}
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function invokeScript(divid){
	var DivIdObj = document.getElementById(divid);
	var scriptObj = DivIdObj.getElementsByTagName("script");
	var len = scriptObj.length;
	for(var i=0; i<len; i++){
		var scriptText = scriptObj[i].text;
		var scriptFile = scriptObj[i].src
		var scriptTag = document.createElement("script");
		if ((scriptFile != null) && (scriptFile != "")){
			scriptTag.src = scriptFile;
		}
		scriptTag.text = scriptText;
		if (!document.getElementsByTagName("head")[0]) {
			document.createElement("head").appendChild(scriptTag)
		} else {
			document.getElementsByTagName("head")[0].appendChild(scriptTag);
		}
	}
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//missing when there are only script code and extremes of string
function FindScript(Str){ // returns array Pos 0: script Pos 1: remaining code
	if (Str.indexOf("script")!=-1) {
		var start_pos = Str.indexOf( 'script' ) -1;
		var end_pos = Str.lastIndexOf( 'script' ) +7;
		var result = [];
		result[0] = Str.substring(start_pos, end_pos); // script code
		result[1] = Str.substring(0, start_pos) + Str.substring(end_pos, Str.length); //remaining code
		return result;
	}else {
		return false;
	}
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

/* method to send a ajax request, and write the response text to given divid. */
function InputFormAjx(InputId, url, placeholder_name, method, params){
	
	url = url + getNoCacheValue(url);
	var status = placeholder_name + '-status';
	
	var ajaxRequest = getXMLHttpRequest();
	ajaxRequest.onreadystatechange = function(){
										if (ajaxRequest.readyState == 4) {
											if (ajaxRequest.status == 200) {
												var code = ajaxRequest.responseText;
												var check_script= FindScript(code);
												var status_ok='<div class="placeholder-status" id="' + status + '"><i class="fa fa-check-circle-o status-check fade-in"></i></div>';
												if (check_script===false) {
													document.getElementById(InputId).value  =  code
													document.getElementById(placeholder_name).innerHTML = status_ok;										
												}else {
													document.getElementById(InputId).value  =  check_script[1];												
													document.getElementById(placeholder_name).innerHTML = status_ok + check_script[0];
													invokeScript(placeholder_name); // incomplete : where is placed live script												
												}
											}else {
											document.getElementById(InputId).value  =  ajaxRequest.responseText;
											document.getElementById(placeholder_name).innerHTML = '<div class="placeholder-status" id="' + status + '"><i class="fa fa-exclamation-triangle status-error fade-in"></i></div>';
											}
										}
									};
	MakeResponse(ajaxRequest, method, url, params);
}
/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function AjxInput(InputId, url,  method, params){
	
	url = url + getNoCacheValue(url);
	var wait = InputId + '-wait';


	var ajaxRequest = getXMLHttpRequest();
	document.getElementById(InputId).disabled=true;
	document.getElementById(wait).innerHTML = '<i class="fa fa-clock-o"></i>';
	var data= encodeURIComponent(document.getElementById(InputId).value);
	var params= InputId + "=" + data;
	
	ajaxRequest.onreadystatechange = function(){
										if (ajaxRequest.readyState == 4) {
											if (ajaxRequest.status == 200) {
												document.getElementById(InputId).value = ajaxRequest.responseText;
												document.getElementById(wait).innerHTML = '<i class="fa fa-check-circle-o status-check fade-in"></i>';
											}else {
												document.getElementById(wait).innerHTML = '<i class="fa fa-exclamation-triangle status-error fade-in"></i>';
											}
											document.getElementById(InputId).style.pointerEvents = "auto";
											document.getElementById(InputId).disabled=false;
										
										}
									};
	MakeResponse(ajaxRequest,"post", url, params);
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

/* method to send a ajax request, and write the response text to given divid. */
function ajax_link(divid, url,  method, params){
	
	url = url + getNoCacheValue(url);
	var status = divid + '-status';
	var link = divid + '-link';
	var wait = divid + '-wait';
	var prev_str= document.getElementById(link).innerHTML;
	var store_class= document.getElementById(link).className;
	document.getElementById(link).innerHTML = prev_str + '<img src="system/GUI/graphics/icons/waiting.gif" class="link-wait" />';
	document.getElementById(link).className = store_class + "link-disabled";	
	document.getElementById(link).style.pointerEvents = "none";
	var ajaxRequest = getXMLHttpRequest();
	var link_height = document.getElementById(link).style.fontSize;
	if (link_height !='') {
		document.getElementById(link).style.height= link_height;
		
	}
	ajaxRequest.onreadystatechange = function(){
										if (ajaxRequest.readyState == 4) {
											if (ajaxRequest.status == 200) {
												document.getElementById(link).innerHTML = prev_str;
												document.getElementById(divid).innerHTML = '<div class="placeholder-status" id="' + status + '"><i class="fa fa-check-circle-o status-check fade-in"></i></div>' + ajaxRequest.responseText;
												document.getElementById(status).innerHTML = '<i class="fa fa-check-circle-o status-check fade-in"></i>';
													document.getElementById(link).className = store_class;
												invokeScript(divid);
											}else {
												document.getElementById(status).innerHTML = '<i class="fa fa-exclamation-triangle status-error fade-in"></i>';
											}
											document.getElementById(link).style.pointerEvents = "auto";
										}
									};
	MakeResponse(ajaxRequest, method, url, params);
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

/* method to send a ajax request, and write the response text to given divid. */
function placeholder_update(placeholder_name, divid, url,  method, params){
	
	url = url + getNoCacheValue(url);
	var status = placeholder_name + '-status';
	var wait = placeholder_name + '-waiting';

	document.getElementById(placeholder_name).style.opacity=0.25;
	document.getElementById(wait).style.visibility='visible';
	document.getElementById(wait).style.opacity='1.0';
	
	var ajaxRequest = getXMLHttpRequest();
	ajaxRequest.onreadystatechange = function(){
										if (ajaxRequest.readyState == 4) {
											document.getElementById(placeholder_name).style.opacity="1.0";
											document.getElementById(wait).style.opacity='0.0';
											if (ajaxRequest.status == 200) {
												document.getElementById(divid).innerHTML = ajaxRequest.responseText;
												document.getElementById(status).innerHTML = '<i class="fa fa-check-circle-o status-check fade-in" ></i>';
												document.getElementById(placeholder_name).style.opacity=1;
												invokeScript(divid);
											}else {
												document.getElementById(status).innerHTML = '<i class="fa fa-exclamation-triangle status-error fade-in"></i>';
											}
										}
									};
	MakeResponse(ajaxRequest, method, url, params);
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/* Disable page and update all Ajax contents */
function PageUpdate(){
	// enable opaque mask with loading bar and info tasks bellow
	// find all ajax calls within page
	//make server requests and update loading bar on each
}


/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\