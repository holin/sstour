<?php
$dir = opendir("D:/AppServ/www/_website/lvyou/tmp1/");
while ($file = readdir($dir))
{
	if($file != '' && $file != '.' && $file != '..')
	{
		unlink("D:/AppServ/www/_website/lvyou/tmp1/{$file}");
	}
}
?>