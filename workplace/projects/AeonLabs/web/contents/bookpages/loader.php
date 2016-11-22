<?php

$root=substr(__FILE__,0,strpos(__FILE__,"contents"));


//if(include($root.'runtime/config/status.cfg')):
//	if ($workvars['testing']===true): // redirect to .live content gen file
		include($root.'contents/bookpages/loader.live');
//	endif;
//endif;
?>