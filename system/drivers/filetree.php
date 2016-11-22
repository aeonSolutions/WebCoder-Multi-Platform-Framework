<?php
include("../../library/filetree/php_file_tree.php");
$buffer='<link href="library/filetree/styles/default.css" rel="stylesheet" type="text/css" media="screen" />';
$buffer.=php_file_tree("../../localweb", "javascript:alert('You clicked on [link]');");
echo $buffer;
?>