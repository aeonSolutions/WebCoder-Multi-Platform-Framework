<?php 
$html_code=file_get_contents(substr(__FILE__,0,strpos(__FILE__,"template-selection.php")).'template-selection.html');
$output=$html_code;
echo $output;
?>