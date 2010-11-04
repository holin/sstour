<?php
if(!eregi("http:\/\/",$_SERVER['QUERY_STRING']))
$url = "http://{$_SERVER['QUERY_STRING']}";
else 
$url = $_SERVER['QUERY_STRING'];
header("Location: $url");
?>