﻿<?php
$myfile = fopen("a.txt", "r+") or die("Unable to open file!");
$x=(fgets($myfile));
fclose($myfile);


$myfile = fopen("a.txt", "w") or die("Unable to open file!");

if ("$x"<"10")
{
	fwrite($myfile, $x+1);
}
else
{
	fwrite($myfile, $x-10);
	fc();
}


fclose($myfile);




function fc() {
    define('LINE_API',"https://notify-api.line.me/api/notify");
define('LINE_TOKEN','9EaVZZ4TQsYHPpvlaol6x3jEE40l8jzdYTXP2hoDV6V');

function notify_message($message){

    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
            		  ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        )
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
    $res = json_decode($result);
	return $res;


}
header('Content-Type: text/html; charset=iso-8859-11');


$res = notify_message("test");

//var_dump($res);
}
?>