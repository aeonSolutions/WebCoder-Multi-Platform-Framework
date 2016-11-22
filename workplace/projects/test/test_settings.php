<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Test file</title>
	<link href="ajax_fx.css" rel="stylesheet" type="text/css" />
   	<link href="../../../system/GUI/styles/font-awesome.min.css" rel="stylesheet">
	<link rel="StyleSheet" href="../../../system/GUI/styles/SettingsMain.css" type="text/css" />
	<link rel="StyleSheet" href="../../../system/GUI/styles/dlg-box.css" type="text/css" />
	<link rel="StyleSheet" href="../../../system/GUI/styles/fonts.css" type="text/css" />
	<link rel="StyleSheet" href="../../../system/GUI/styles/TextElements.css" type="text/css" />

	<script type="text/javascript" src="../../../system/BrowserDom/FormsHandling.lib.js"></script>
	<script type="text/javascript" src="../../../system/BrowserDom/TreeList.lib.js"></script>

</head>
<body>
<style>


.ms-file-list{
	border-bottom: 1px solid #cccccc;
	border-top: 1px solid #cccccc;
}
.ms-file-btn{
	font-family: "Klee";
	font-size: 24px;
	color: #aaaaaa;
}
ms-files{
	width: 100%;
}
.ms-files input[type="checkbox"]{
	display: none
}
.ms-files{
	width: 100%;
	border: none;
	font-family: "SanFrancisco";
	font-size: 12px;
		
}
.ms-files:focus {
	outline: none;
		
}
</style>
<div id="settings-warp">
    <div class="ms-selection" id="ms-selection">

		<input type="radio" name="tabs" id="tss-toggle-tab1" checked="checked" />
		<label class="ms-selection-header-label" for="tss-toggle-tab1">General</label>
		
		<input type="radio" name="tabs" id="tss-toggle-tab2" />
		<label class="ms-selection-header-label" for="tss-toggle-tab2">Capabilities</label>
		
		<input type="radio" name="tabs" id="tss-toggle-tab3" />
		<label class="ms-selection-header-label" for="tss-toggle-tab3">Resources</label>
		
		<input type="radio" name="tabs" id="tss-toggle-tab4" />
		<label class="ms-selection-header-label" for="tss-toggle-tab4">Safety</label>
	
		<input type="radio" name="tabs" id="tss-toggle-tab5" />
		<label class="ms-selection-header-label" for="tss-toggle-tab5">Build Rules</label>
		
		<input type="radio" name="tabs" id="tss-toggle-tab6" />
		<label class="ms-selection-header-label" for="tss-toggle-tab6">Development Settings</label>
		
		<input type="radio" name="tabs" id="tss-toggle-tab7" />
		<label class="ms-selection-header-label" for="tss-toggle-tab7">Server</label>

		  <div id="tss-tab1" class="tss-tab">
			<div class="ms-selection-container">
					<input type="checkbox" id="click-identity" /><label class="ms-selection-label" for="click-identity" onclick="document.getElementById('ms-identity-contents').classList.toggle('closed');"><div class="ms-selection-title">Identity</div></label>
				<div id="ms-identity-contents" class="ms-slider">
					<div class="ms-files">
						<center>
						<div id="" class="ms-file-list">
							<select name="ms-files" id="ms-files" size="7" class="ms-files">
							  <option>cherry</option>
							  <option>orange</option>
							  <option>apple</option>
							</select>
						</div>
						<table>
							<tr>
								<td><input type="checkbox" id="add-" /><label class="" for="add-" onclick=""><div class="ms-file-btn">+</div></label></td>
								<td><input type="checkbox" id="sub-" /><label class="" for="sub-" onclick="javascript:RemoveListItem('ms-files');"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>
					</div>
				</div>
			</div><!-- end of ms-selection-container-->



		  </div><!-- end of tss-tab1-->
		
		  <div id="tss-tab2" class="tss-tab">
	

			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">

				</div>
				<div id="ms-deploy-contents" class="slider">
					contents
				</div>
			</div><!-- end of ms-selection-container-->



		  </div><!-- end of tss-tab2-->
		
		  <div id="tss-tab3" class="tss-tab">
			Resources
		  </div><!-- end of tss-tab3-->
		
		  <div id="tss-tab4" class="tss-tab">
				Info
		  </div><!-- end of tss-tab4-->
		
			<div id="tss-tab5" class="tss-tab">
			 Build Settings
			</div><!-- end of tss-tab5-->
		
		<div id="tss-tab6" class="tss-tab">
			Server
		</div><!-- end of tss-tab6-->
		
		<div id="tss-tab7" class="tss-tab">
			Debug sessions
		</div><!-- end of tss-tab7-->
		


    </div><!-- end of ms-selection main settings selection-->
</div><!-- end of settings-wrap-->
<div id="voids-shell">
	<div id="Dlg-LoadFile" class="dlg-box dlg-center-screen">
	
	
		<input type="radio" name="tabs" id="DlgLF-toggle-tab1" checked="checked" />
		<label class="DlgLF-header-label kern" for="DlgLF-toggle-tab1">Local HD</label>
		
		<input type="radio" name="tabs" id="DlgLF-toggle-tab2" />
		<label class="DlgLF-header-label kern" for="DlgLF-toggle-tab2">Web HD</label>
		
		<input type="radio" name="tabs" id="DlgLF-toggle-tab3" />
		<label class="DlgLF-header-label kern" for="DlgLF-toggle-tab3">Web Link</label>
		<!-- start of tab-container-->			
		<div id="Dlg-LoadFile-tab1" class="Dlg-LoadFile-tab">
			<div id="DlgLF-addrBar">
				<div id="DlgLF-addrBar-title">Path</div>
				<div id="DlgLF-addrBar-addr">directory names in here</div>
			</div>
			<div id="DlgLF-BrowseFiles">
				<div id="DlgLF-Dtree">
						directory tree here
				</div>
				<div id="DlgLF-Dtree-files">Files in selected directory here</div>
				<div id="DlgLF-Files-Select">Selected files here</div>
			</div>
			<div id="DlgLF-Btn">
				<input class="Dlg-btn" type="button" name="" value="Cancel" />
				<input class="Dlg-btn" type="button" name="" value="Load Selection" />
			</div>
			
				
		</div>
		<!-- end of tab-container-->
		<!-- start of tab-container-->			
		<div id="Dlg-LoadFile-tab2" class="Dlg-LoadFile-tab">
				tab 2
		</div>
		<!-- end of tab-container-->
		<!-- start of tab-container-->			
		<div id="Dlg-LoadFile-tab3" class="Dlg-LoadFile-tab">
				tab 3 <progress id="progressBar" max="100" value="0"/>
		</div>
		<!-- end of tab-container-->
	</div>
</div>
<div>
<?php
include('../../../system/runtime/dlgfileopen.server.php');
?>
</div>
</body>
</html>