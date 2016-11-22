/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function ContextMenu(DivId, OriginId){
	 var content_area = document.getElementById(DivId);
	 var status = document.getElementById(DivId).style.visibility;

	 if (status==='visible') {
	 	document.getElementById(DivId).style.visibility='hidden';
	 } else {
	 	document.getElementById(DivId).style.visibility='visible';  	
	 }
	
	
	
	document.body.addEventListener("click", function(e) {
	  var target = e.target || e.srcElement;
	  
	  if (target !== content_area && !isChildOf(target, content_area) && content_area.style.visibility=='visible' && target.id != OriginId) {
	  	
		    ContextMenu(DivId, OriginId);
	  }
	}, false);
	
	function isChildOf(child, parent) {
	  if (child.parentNode === parent) {
	    return true;
	  } else if (child.parentNode === null) {
	    return false;
	  } else {
	    return isChildOf(child.parentNode, parent);
	  }
}



}

/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function OpenWindowPopUp(where, request) {
	document.getElementById('dlg-screen-mask').style.backgoundColor='#000000';
	document.getElementById('dlg-screen-mask').style.visibility='visible';
	document.getElementById('MainMenu').style.visibility='hidden';
	AjxSilent(where, request);
	document.getElementById(where).style.visibility='visible';
		
};
/////////////////////////////////////////////////////////////////////////||\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function CloseWindowPopUp() {
	document.getElementById('dlg-screen-mask').style.visibility='hidden';
	document.getElementById('Dialogs-Loader').style.visibility='hidden';
};
