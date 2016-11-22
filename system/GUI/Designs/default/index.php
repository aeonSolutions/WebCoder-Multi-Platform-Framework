<?php
$version='1.0';
date_default_timezone_set('Europe/Lisbon');
$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path
include('system/dll/error_logging.lib.php');
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>WebCoder</title>
	<link href="system/GUI/styles/global.css" rel="stylesheet" type="text/css" />
	<link href="system/GUI/styles/mainpage.css" rel="stylesheet" type="text/css" />

	<link href="system/GUI/styles/sidebar-bottom.css" rel="stylesheet" type="text/css" />
	<link href="system/GUI/styles/sidebar-left.css" rel="stylesheet" type="text/css" />
	<link href="system/GUI/styles/sidebar-right.css" rel="stylesheet" type="text/css" />

	<link href="system/GUI/styles/fonts.css" rel="stylesheet" type="text/css" />
   	<link href="system/GUI/styles/font-awesome.min.css" rel="stylesheet">

	<link href="system/GUI/styles/dlg-box.css" rel="stylesheet" type="text/css" />
   	<link href="system/GUI/styles/new-project-type.css" rel="stylesheet">
   
	<link href="system/GUI/styles/template-selection.css" rel="stylesheet">
	<link rel="StyleSheet" href="system/GUI/styles/dtree.css" type="text/css" />
	<link href="system/GUI/styles/SettingsMain.css" rel="stylesheet" type="text/css" />
	<link href="system/GUI/styles/FormElements.css" rel="stylesheet" type="text/css" />
	<link href="system/GUI/styles/TextElements.css" rel="stylesheet" type="text/css" />
	<link href="system/GUI/styles/storyboard.css" rel="stylesheet" type="text/css" />
	<link href="system/GUI/styles/ContextBox.css" rel="stylesheet" type="text/css" />

	<link href="system/GUI/frontend/search/searchStyle.css" rel="stylesheet" type="text/css" />


	<script type="text/javascript" src="system/BrowserDom/progress.js"></script>
	<script type="text/javascript" src="system/BrowserDom/screensaver.js"></script>
	<script async src="system/BrowserDom/layout.js" type="text/javascript"></script>
	<script async src="system/BrowserDom/go_fullscreen.js" type="text/javascript"></script>
	<!--javascript libraries!-->
	<script async src="system/BrowserDom/HttpRequests.lib.js" type="text/javascript"></script>
	<script async src="system/BrowserDom/Dialogs.lib.js" type="text/javascript"></script>
	<script async src="system/BrowserDom/FileSystem.lib.js" type="text/javascript"></script>
	<script type="text/javascript" src="system/BrowserDom/TreeList.lib.js"></script>
	<script type="text/javascript" src="system/BrowserDom/FormsHandling.lib.js"></script>
	<script type="text/javascript" src="system/BrowserDom/HtmlHandling.lib.js"></script>
	<script type="text/javascript" src="system/BrowserDom/DlgFileOpen.lib.js"></script>
	<script type="text/javascript" src="system/BrowserDom/CleanCode.lib.js"></script>
	<script type="text/javascript" src="system/BrowserDom/ClipBoard.lib.js"></script>
	<script type="text/javascript" src="system/BrowserDom/MenusContext.lib.js"></script>
	
	<script language="Javascript" type="text/javascript" src="system/applications/codeMarkup/edit_area_full.js"></script>
		<!--javascript custom code!-->
	<script async src="system/BrowserDom/ajax.custom.js" type="text/javascript"></script>
</head>

<body>
<?php
$path=glob(substr(__FILE__,0,strpos(__FILE__,"index.php"))."library/*",GLOB_ONLYDIR);
for ($i=0; $i<=count($path)-1; $i++):
	foreach (glob($path[$i]."/*.js") as $filename):
		$filename=explode("library",$filename);
		echo '<script async src="library'.$filename[count($filename)-1].'" type="text/javascript"></script>';
	endforeach;
endfor;
?>

<div id="board">
	<!-- header -->
	<div id="board-header" class="board-header">
	    <label for="checkbox-toggle-left" onclick=resize('left')><div id="sbl-toggler-img"></div></label>
		<a class="sb-search fa fa-th-large sb-icons" href="#" id="MainMenuIcon" onclick="javascript:ContextMenu('MainMenu','MainMenuIcon');"></a> ┃
			<img src="system/GUI/graphics/icons/loading_bar_animated.gif" height="10px" alt="" />
		<div id="checkbox-wrap-right">┃ 
			<label for="checkbox-toggle-right" onclick=resize('right')><div id="sbr-toggler-img"></div></label>
			<label for="checkbox-toggle-bottom" onclick=resize('bottom')><div id="sbb-toggler-img"></div></label>
		</div>
	</div>
	<!-- end of board header -->
	<div id="MainMenu" class="GeneralMenu TextS1 TextDecorNone">
		<div class="BoxSelection">
			<h2 class="SanFrancisco TextS4">Project</h2>
			<ul>
			<li><a href="#" class="LinkPointer" onclick=" OpenWindowPopUp('Dialogs-Loader','system/runtime/WindowPopup.server.php?what=asciitable');">&nbsp;&nbsp;&nbsp;Run</a></li>
			<li><a href="#" class="LinkPointer" onclick=" OpenWindowPopUp('Dialogs-Loader','system/runtime/WindowPopup.server.php?what=asciitable');">&nbsp;&nbsp;&nbsp;Analyse</a></li>
			<li><a href="#" class="LinkPointer" onclick=" OpenWindowPopUp('Dialogs-Loader','system/runtime/WindowPopup.server.php?what=asciitable');">&nbsp;&nbsp;&nbsp;Build</a></li>
			</ul>
		</div>
		<div class="BoxSelection">
			<h2 class="SanFrancisco TextS4">Debug</h2>
			<ul>
			<li><a href="#" class="LinkPointer" onclick=" OpenWindowPopUp('Dialogs-Loader','system/runtime/WindowPopup.server.php?what=asciitable');">&nbsp;&nbsp;&nbsp;Deactivate Breakpoints</a></li>
			</ul>
		</div>
		<div class="BoxSelection">
			<h2 class="SanFrancisco TextS4">Simulation Conditions</h2>
			<ul>
			<li><a href="#" class="LinkPointer" onclick=" OpenWindowPopUp('Dialogs-Loader','system/runtime/WindowPopup.server.php?what=asciitable');">&nbsp;&nbsp;&nbsp;Set Location</a></li>
			</ul>
		</div>
		<div class="BoxSelection">
			<h2 class="SanFrancisco TextS4">Utilities</h2>
			<ul>
			<li><a href="#" class="LinkPointer" onclick=" OpenWindowPopUp('Dialogs-Loader','system/runtime/WindowPopup.server.php?what=asciitable');">&nbsp;&nbsp;&nbsp;Show ASCII table</a></li>
			</ul>
		</div>
	</div>
	<!--MainMenu-->
	<!-- board-main main work area -->
	<div id="board-main">
		<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/Unloadedmain.png" height="200px" alt="" /></div>
	</div>
	<!-- end of board-main main work area -->
	<!-- bottom sidebar -->
	<div class="sidebar-bottom">
		<div id="bottom-bar-menu">		
			<div id="bbm-trash"><label for="bbm-trash-btn" class="fa fa-trash-o"></label></div>
			<div id="bbm-selector">
				<form method="post">
				<i class="fa fa-files-o" style="font-size: 13px;"></i>
				        <select name="debug-task" id="debug-task" class="bbms" onclick="javascript: AjxSimpleHtml('bottom-contents', 'system/runtime/LiveOutput.php','debug-task');">
				                <option value="Debugger">Debugger</option>
				                <option value="PHP log" selected="selected">PHP log</option>
				                <option value="MySQL log">MySQL log</option>
				                <option value="MySQL log">Apache log</option>
				        </select>
				</form>			
			</div>
		</div>
		<!-- end of bottom bar menu -->
		<div id="bottom-contents" class="SanFrancisco TextS1">
		<?php
			echo(file_get_contents('system/logs/php_error_log.php'));
		?>	
		</div>
		<!-- end of bottom contents -->
	</div>
	<!-- end of bottom sidebar -->

	<div id="ContextMenus-Loader" class="voids-shell">
	</div>
	<!--end of ContextMenus-Loader-->
</div>
<!--board-->

<div class="page-wrap">
	<!-- input tooglers for sidebars activation -->
    <input type="checkbox" id="checkbox-toggle-left">
    <input type="checkbox" id="checkbox-toggle-right">
    <input type="checkbox" id="checkbox-toggle-bottom">
    <input type="checkbox" id="bbm-trash-btn" />
    
    <!-- end of input togglers for sidebars -->
    
    <div class="sidebar-left" id="sidebar-left">
		<input type="radio" name="sbl-tabs" id="sbl-toggle-tab1" checked="checked" />
		<label for="sbl-toggle-tab1" class="sidebar-left-label fa fa-folder-o" style="text-shadow: none;" onClick="AjxSimpleHtml('sbl-tab1','system/runtime/ProjectTree.server.php?place=sbl-tab1');"></label>
		
		<input type="radio" name="sbl-tabs" id="sbl-toggle-tab2" />
		<label for="sbl-toggle-tab2" class="sidebar-left-label fa fa-sitemap" style="text-shadow: none;" onClick="javascript: AjxSimpleHtml('sbl-tab2','system/runtime/CodeLibInUse.server.php');"></label>
		
		<input type="radio" name="sbl-tabs" id="sbl-toggle-tab3" />
		<label for="sbl-toggle-tab3" class="sidebar-left-label fa fa-search" style="text-shadow: none;" onClick="javascript: AjxSimpleHtml('sbl-tab3','system/runtime/SearchCode.server.php');"></label>
		
		<input type="radio" name="sbl-tabs" id="sbl-toggle-tab4" />
		<label for="sbl-toggle-tab4" class="sidebar-left-label fa fa-exclamation-triangle" style="text-shadow: none;" onClick="javascript: AjxSimpleHtml('sbl-tab4','system/runtime/WarningsErrors.server.php');"></label>
	
		<input type="radio" name="sbl-tabs" id="sbl-toggle-tab5" />
		<label for="sbl-toggle-tab5" class="sidebar-left-label top-icon" style="text-shadow: none;" onClick="javascript: AjxSimpleHtml('sbl-tab5','system/runtime/DebugSession.server.php');">☲</label>
		
		<input type="radio" name="sbl-tabs" id="sbl-toggle-tab6" />
		<label for="sbl-toggle-tab6" class="sidebar-left-label fa fa-tags" style="text-shadow: none;" onClick="javascript: AjxSimpleHtml('sbl-tab6','system/runtime/DebugBreakPoints.server.php');"></label>
		
		<input type="radio" name="sbl-tabs" id="sbl-toggle-tab7" />
		<label for="sbl-toggle-tab7" class="sidebar-left-label fa fa-commenting-o" style="text-shadow: none;" onClick="javascript: AjxSimpleHtml('sbl-tab7','system/runtime/FileComments.server.php');"></label>
		
		  <div id="sbl-tab1" class="sbl-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedFolders.png" height="100px" alt="" /></div>
		  </div>
		
		  <div id="sbl-tab2" class="sbl-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedLibs.png" height="100px" alt="" /></div>
		  </div>
		
		  <div id="sbl-tab3" class="sbl-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedSearch.png" height="100px" alt="" /></div>
		  </div>
		
		  <div id="sbl-tab4" class="sbl-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		  </div>
		
			<div id="sbl-tab5" class="sbl-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
			</div>
		
		<div id="sbl-tab6" class="sbl-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedLogs.png" height="100px" alt="" /></div>
		</div>
		
		<div id="sbl-tab7" class="sbl-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
		
		<!-- bottom search --> 
		<div id="sidebar-search-left" class="sidebar-text">
			<input type="checkbox" id="toggle-file-menu">
			<div id="toggle-menu-wrap">
				<label for="toggle-file-menu">+</label>
			</div>
			<div id="sbl-search-wrap" class="sb-search">
				<a class="fa fa-genderless sb-icons" href="#"></a>
				<input type="text" name="search" value="Search..." class="sb-search sb-search-text" maxlength="255" />
				<a class="sb-search fa fa-times-circle-o sb-icons" href="#"></a><a class="sb-search fa fa-clock-o sb-icons" href="#"></a><a class="sb-search fa fa-keyboard-o sb-icons" href="#"></a>
			</div>

			<div id="file-menu-id" class="shadow">
				<div class="close"><label class="toggle-menu-wrap-label" for="toggle-file-menu">⊗</label></div>
				<ul>
					<li>File...</li>
					<li>StoryBoard...</li>
					<li>Framework...</li>
					<li>Media Files...</li>
					<li><hr size="1"></li>
					<li>Add Files...</li>
				</ul>
			</div>
			
		</div> <!-- end of bottom seach -->

    </div><!-- end of sidebar-left-->

	<div class="sidebar-right" id="sidebar-right">
		
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab1" checked="checked" />
		<label for="sbr-toggle-tab1" class="fa fa-file-o" onClick="javascript: AjxSimpleHtml('sbr-tab1','system/runtime/FileConfiguration.server.php');"></label>
		
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab2" />
		<label for="sbr-toggle-tab2" class="fa fa-question-circle" onClick="javascript: AjxSimpleHtml('sbr-tab2','system/runtime/HelpAndAssist.server.php');"></label>
		
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab3" />
		<label for="sbr-toggle-tab3" class="fa fa-list-alt" onClick="javascript: AjxSimpleHtml('sbr-tab3','system/runtime/FilePropreties.server.php');"></label>
		
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab4" />
		<label for="sbr-toggle-tab4" class="fa fa-pencil" onClick="javascript: AjxSimpleHtml('sbr-tab4','system/runtime/DesignToolbar.server.php');"></label>
		
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab5" />
		<label for="sbr-toggle-tab5" class="fa fa-expand" onClick="javascript: AjxSimpleHtml('sbr-tab5','system/runtime/DesignScaleViews.server.php');"></label>
	
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab6" />
		<label for="sbr-toggle-tab6" class="fa fa-arrow-circle-o-right" onClick="javascript: AjxSimpleHtml('sbr-tab6','system/runtime/Functionalities.server.php');"></label>
		
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab7" />
		<label for="sbr-toggle-tab7" class="fa fa-object-group" onClick="javascript: AjxSimpleHtml('sbr-tab7','system/runtime/DesignViews.server.php');"></label>
		
		<input type="radio" name="sbr-tabs" id="sbr-toggle-tab8" />
		<label for="sbr-toggle-tab8" class="fa fa-pencil-square-o" onClick="javascript: AjxSimpleHtml('sbr-tab8','system/runtime/CodeObjectsSelection.server.php');"></label>

		<div id="sbr-tab1" class="sbr-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
		
		<div id="sbr-tab2" class="sbr-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
		
		<div id="sbr-tab3" class="sbr-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
		
		<div id="sbr-tab4" class="sbr-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
	
		<div id="sbr-tab5" class="sbr-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
	
		<div id="sbr-tab6" class="sbr-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
		
		<div id="sbr-tab7" class="sbr-tab">
			<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
		
		<div id="sbr-tab8" class="sbr-tab">
		  	<div style="text-align: center; vertical-align: center;"><img src="system/GUI/graphics/icons/UnloadedDebug.png" height="100px" alt="" /></div>
		</div>
		
	</div><!--sidebar-right-->

	<!-- open wallpaper and full screen progress bar -->
	<div id="dlg-screen-wallpaper"></div>
	<div id="dlg-screen-mask">
		<div id="ProgressBar">
			<div class="bar gradient stripe color4"><span id="bar_span" class="animate"></span></div>
			<div id="bar_text" style="text-align: center;"></div>
		</div>
	</div>
	
	<!-- end of dialog box new project-->
	<div id="Dialogs-Loader" class="voids-shell">
		<?php
			include('system/runtime/DlgStartUp.php');
		?>	
	</div>
	<!-- end of dialog box new project-->

</div> <!-- end of page-wrap -->

</body>
</html>