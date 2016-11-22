<?php
// search programing code Onkline 
if (isset($_GET['cfg'])):
	$cfg=$_GET['cfg'];
else:
	exit('missing var');
endif;


//include Google PHP API
set_include_path(get_include_path() . PATH_SEPARATOR . 'system/applications/Google/');
require_once 'google-api-php-client/src/Google/autoload.php'; // or wherever autoload.php is located

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("YOUR_APP_KEY");

$service = new Google_Service_Books($client);
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results as $item) {
echo $item['volumeInfo']['title'], "<br /> \n";
}


$browserAPIKey="AIzaSyA-8WHUn2JkWVwPUKk3nlHqSvGdiqAOw0M";

$OAuthBrowserClient="376706913930-hsf5m1unainouaq44fdhi4p81dchia5d.apps.googleusercontent.com";
$OAuthClientSecret="MtpmNEc1HgfbKofSecIsaX80";


$code='helper';
$ContentSize=strlen($code);
header ( "Pragma: no-cache" );
header ( "Cache-Control: no-cache" );
header("Content-Length: ".$ContentSize);//set header length
echo $code;


$url = 'http://server.com/path';
$data = array('key1' => 'value1', 'key2' => 'value2');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);


$aContext = array(
    'http' => array(
        'proxy' => 'proxy:8080',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);

$sFile = file_get_contents("http://www.google.com", False, $cxContext);

echo $sFile;


$ch = curl_init("REMOTE XML FILE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
?>