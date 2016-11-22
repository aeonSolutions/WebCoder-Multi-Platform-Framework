<!-- open on load dialog box -->
<div id="intro-dlg" class="dlg-center-screen">
	<div id="intro-dlg-left">
	<h1 class="logo-img"><img src="system/GUI/graphics/icons/intro-logo.png" height="100px" alt="" /></h1>
	<h2>Welcome to WebCoder</h2>
	<h3>version <?=$version;?>(<?=date("Y\WW",filemtime(__FILE__));?>)</h3>
	<ul>
		<li><a href="#" onclick="DlgUpdate([['intro-dlg','width','800px'],['intro-dlg','height','500px'],['dlg-screen-wallpaper','display','none']], ['intro-dlg', 'system/commdlg/template-selection.php'])">
			<div class="selection">
				<div class="icon"><img src="system/GUI/graphics/icons/playground.png" height="30px" alt="" /></div>
				<p style="font-weight: bold;">Get Started with a Playground</p>
				<p>Explore new ideias quickly and easily</p>
			</div>
			</a>
		</li>
		<li><a href="#" onclick="DlgUpdate([['intro-dlg','width','800px'],['intro-dlg','height','500px'],['dlg-screen-wallpaper','display','none']], ['intro-dlg', 'system/commdlg/template-selection.php'])">
			<div class="selection">
			<div class="icon"><img src="system/GUI/graphics/icons/newproject.png" height="30px" alt="" /></div>
			<p style="font-weight: bold;">Create a new WebCoder Project</p>
			<p>Start Building a new SmartPhone, Tablet or Desktop Application</p>
			</div>
			</a>
		</li>
		<li><a href="#" onclick="DlgUpdate([['intro-dlg','width','800px'],['intro-dlg','height','500px'],['dlg-screen-wallpaper','display','none']],['intro-dlg', 'system/commdlg/template-selection.php'])">
			<div class="selection">
			<div class="icon"><img src="system/GUI/graphics/icons/repository.png" height="30px" alt="" /></div>
			<p style="font-weight: bold;">Checkout an existing Project</p>
			<p>Start working on something from a repository</p>
			</div>
			</a>
		</li>
	</ul>
	</div>
	<div id="intro-dlg-right">
		<?php
		include('system/runtime/recent_projects.server.php');
		?>
	</div>
</div><!-- end of open dialog box -->
