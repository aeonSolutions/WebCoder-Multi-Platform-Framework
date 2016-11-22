/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function resize(side) {
	if (side=='left'){
		if(document.getElementById('checkbox-toggle-left').checked==true){
			document.getElementById('board').style.left='0px';
		}
		else if (document.getElementById('checkbox-toggle-left').checked==false) {
			document.getElementById('board').style.left='190px';				
		}
	}			
	if (side=='right') {
		if(document.getElementById('checkbox-toggle-right').checked==true){
			document.getElementById('board').style.right='0px';
			
		}
		else if (document.getElementById('checkbox-toggle-right').checked==false) {
			document.getElementById('board').style.right='255px';	
		}
	}
if (side=='bottom') {
	if(document.getElementById('checkbox-toggle-bottom').checked==true){
		document.getElementById('board').style.bottom='0px';
	}
	else if (document.getElementById('checkbox-toggle-bottom').checked==false) {
		document.getElementById('board').style.bottom='180px';				
	}
}

}
/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function showD(id){
	document.getElementById(id).style.display='block';
}


/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function FindHtmlID(Str, pos){ // returns array Pos 0: destination HTML ID; Pos 1: remaining code; pos 2: end_of last_search
	if (Str.indexOf("destination")!=-1) {
		var start_pos = pos + Str.indexOf( 'destination' ) -1;
		var end_pos = pos + Str.lastIndexOf( 'destination' ) +12;
		var result = [];
		result[0] = Str.substring(start_pos, end_pos); // destination code
		result[1] = Str.substring(pos + 0, start_pos) + Str.substring(end_pos, Str.length); //remaining code
		result[2] = end_pos;
		return result;
	}else {
		return false;
	}
}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function UpdateInterfaceDependencies(url){

	// enable loading bar


	//!!retrieves custom code from the server
	url = url + getNoCacheValue(url);
	
	var ajaxRequest = getXMLHttpRequest();
	ajaxRequest.onreadystatechange = function(){
										if (ajaxRequest.readyState == 4) {
											if (ajaxRequest.status == 200) {
											
												var RawCode = ajaxRequest.responseText;
												
												var WorkCodeTemp=true;
												var WorkCode=false;
												var idx=0;
												var pos=0;
												while (WorkCodeTemp !=false) {
													WorkCodeTemp = FindHtmlID(RawCode, pos);
													if (WorkCodeTemp != false) {
														WorkCode[i] = WorkCodeTemp;
														pos= 1+ WorkCode[i][2];
														idx++;
													}
												}//endwhile
												
												if (WorkCode===true) {
													var FormTypes = ['select-one','select-multiple','submit','text','textarea','password','checkbox','radio'];
													var HtmlTypes = ['DIV','P','SPAN','A','H1','H2','H3','H4','H5'];
													for (var i = 0; i < WorkCode.length; i++) {
														var DocElement = document.getElementById(WorkCode[i][0]);
														if (FormTypes.indexOf(DocElement.type) !=-1) {
															var FormText = ['text','textarea','password'];
															var FormCB = ['checkbox','radio'];
															if (FormText.indexOf(DocElement.type)) { // input text element
																DocElement.value = WorkCode[i][1];
															} else if (FormCB.indexOf(DocElement.type)) { // checkboxes and radios
																if (WorkCode[i][1] == 'true' || WorkCode[i][1] == 'selected' || WorkCode[i][1]==1) {
																	DocElement.checked= true;
																} else {
																	DocElement.checked= false;													
																}	
															} else { // is a HTML element
																DocElement.innerHTML  =  WorkCode[i][1];
																if (FindScript(WorkCode[i][1])===true) {
																	invokeScript(WorkCode[i][0]);
																}
															} //endif formtext
														}// endif formTypes
													} //endfor
												} else {
													window.alert('Error no code returned from server when update');
												} 

												
				
											}else {
												document.getElementById('loading').innerHTML  =  ajaxRequest.responseText;
											} //endif .status=200
											
										} //endif .ready.state=4
									};
	MakeResponse(ajaxRequest, method, url, params);

}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\



/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
