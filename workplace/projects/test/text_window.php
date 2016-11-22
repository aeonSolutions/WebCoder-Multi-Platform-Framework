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
body{
	background-color: green;
}
#WindowPopUp{
	padding: 0px 0px 0px 0px;

	position: fixed;
	top: 50%;
	left: 50%;

	width: 900px;
	height: 500px;
	background-color: white;
	border: 1px solid gray;
	z-index: 5;
	overflow: auto;
	overflow: scroll;

	margin-top: -250px;
	margin-left: -450px;
}

#WindowClose {
	float: right;
	position: relative;
	top: 0px;
	right: 0px;
}
</style>
<div id="WindowPopUp">
	<div id="WindowClose">
		<a href="#" onclick="javascript: CloseWindowPopUp();"><i class="fa fa-times"></i></a>
	</div>
	
	
</div>

</body>
</html>