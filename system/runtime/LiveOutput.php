<?php
if (isset($_GET['debug'])):
	$debug=$_GET['debug'];
	$options[]='Debugger';
	$options[]='PHP log';
	$options[]='MySQL log';
	$options[]='Apache log';
	if (in_array($debug, $options)):
		$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path
		if ($debug=='Debugger'):
			include($server['root']['path'].'system/runtime/HelperToCode.server.php');
		endif;
		if ($debug=='PHP log'):
			$contents=file_get_contents($server['root']['path'].'system/logs/php_error_log.php');
			echo $contents;
		endif;
		if ($debug=='MySQL log'):
		endif;
		if ($debug=='Apache log'):
			$contents=file_get_contents('/private/var/log/apache2/error_log');
			echo $contents;
		endif;
	else:
		echo 'invalid passed var! ('.$debug.')';
	endif;
endif;
?>