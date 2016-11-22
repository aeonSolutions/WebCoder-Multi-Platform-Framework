<?php
$filesize=filesize('test.zip');

header("Content-Length: ".$filesize);//set header length
//if the headers it not set then the evt.loaded will be 0
readfile('test.zip');
sleep(2);
/*
$variableToCheck = array('key1', 'key2', 'key3');
foreach($_POST AS $key => $value):
   if( in_array($key, $variableToCheck)):
     if(isset($_POST[$key])):
     // get value
     else:
     // set validation error
    endif;   
  endif;
endforeach;
*/

echo $_POST['name'];
?>

