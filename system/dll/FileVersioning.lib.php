<?php
// add on propreties panel (sidebar right a placehoder to edit versioning text
// add version info on save of any working file

if (isset($_GET['file'])):
	
elseif (isset($_POST['file'])):
	
elseif (isset($Version2File)):

else:
	exit ('missing var!');
endif;

$contents=file_get_contents($Version2File);

// format

// distribution type

// custom text

?>