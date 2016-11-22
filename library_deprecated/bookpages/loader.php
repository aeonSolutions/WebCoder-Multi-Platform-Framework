<?php

$root=substr(__FILE__,0,strpos(__FILE__,"library"));

include($root.'system/config/status.cfg');
if ($workvars['testing']===true): // redirect to .live content gen file
	include($root.'library/bookpages/loader.live');
endif;
?>