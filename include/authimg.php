<?php
error_reporting(0);
define('D_P',__FILE__ ? getdirname(__FILE__).'/' : './');
include_once D_P."config.php";
function getdirname($path){
	if(strpos($path,'\\')!==false){
		return substr($path,0,strrpos($path,'\\'));
	}elseif(strpos($path,'/')!==false){
		return substr($path,0,strrpos($path,'/'));
	}else{
		return '/';
	}
}
$nowtime = time();
function Cookie($ck_Var,$ck_Value,$ck_Time = 'F'){
	global $config,$nowtime;
	if($config['session'] == '1')
	{
		if($ck_Time == '0' && $ck_Value == '')
		{
			session_destroy();
			session_unset();
		}elseif($ck_Time == 'F' && $ck_Value == ''){
			session_destroy($ck_Var);
			session_unregister($ck_Var);
		}else{
			if(!session_is_registered($ck_Var))
			session_register($ck_Var);
			$_SESSION[$ck_Var] = $ck_Value;
		}
	}else{
		//$ck_Time = $ck_Time == 'F' ? $nowtime + 31536000 : ($ck_Value == '' && $ck_Time == 0 ? $nowtime - 31536000 : $ck_Time);
		$ck_Time = $ck_Time == 'F' ? $nowtime + $config['online'] : ($ck_Value == '' && $ck_Time == 0 ? $nowtime - $config['online'] : $ck_Time);
		$S		 = $_SERVER['SERVER_PORT'] == '443' ? 1:0;
		!$config['cookiepath'] && $config['cookiepath'] = '/';
		setCookie($ck_Var,$ck_Value,$ck_Time,$config['cookiepath'],$config['cookiedomain'],$S);
	}
}

//生成验证码
$authnum = '';
mt_srand(doubleval(microtime()*100000));
for ($i=0;$i<4;$i++)
$authnum .= mt_rand(0,9);
Cookie('authnum',$authnum);
if(function_exists('imagecreate') && function_exists('imagecolorset') && function_exists('imagecopyresized') && function_exists('imagecolorallocate') && function_exists('imagesetpixel') && function_exists('imagechar') && function_exists('imagecreatefromgif') && function_exists('imagepng')) {
//生成验证码图片
Header("Content-type: image/PNG");
srand((double)microtime()*1000000);
$im = imagecreate(50,20);
$black = ImageColorAllocate($im, 255,255,255);
$white = ImageColorAllocate($im, 0,0,0);
$gray = ImageColorAllocate($im, 0,0,0);
imagefill($im,0,0,$black);
imagerectangle($im, 0, 0, 50 - 1, 20 - 1, $gray);

//将四位整数验证码绘入图片
imagestring($im, 14, 7, 2, $authnum, $white);
/*
for($i=0;$i<50;$i++)   //加入干扰象素
{
	imagesetpixel($im, rand()%70 , rand()%30 , $black);
}
*/
ImagePNG($im);
ImageDestroy($im);
}else{
		$numbers = array
		(
		0 => array('3c','66','66','66','66','66','66','66','66','3c'),
		1 => array('1c','0c','0c','0c','0c','0c','0c','0c','1c','0c'),
		2 => array('7e','60','60','30','18','0c','06','06','66','3c'),
		3 => array('3c','66','06','06','06','1c','06','06','66','3c'),
		4 => array('1e','0c','7e','4c','2c','2c','1c','1c','0c','0c'),
		5 => array('3c','66','06','06','06','7c','60','60','60','7e'),
		6 => array('3c','66','66','66','66','7c','60','60','30','1c'),
		7 => array('30','30','18','18','0c','0c','06','06','66','7e'),
		8 => array('3c','66','66','66','66','3c','66','66','66','3c'),
		9 => array('38','0c','06','06','3e','66','66','66','66','3c')
		);

	for($i = 0; $i < 10; $i++) {
		for($j = 0; $j < 6; $j++) {
			$a1 = substr('012', mt_rand(0, 2), 1).substr('012345', mt_rand(0, 5), 1);
			$a2 = substr('012345', mt_rand(0, 5), 1).substr('0123', mt_rand(0, 3), 1);
			mt_rand(0, 1) == 1 ? array_push($numbers[$i], $a1) : array_unshift($numbers[$i], $a1);
			mt_rand(0, 1) == 0 ? array_push($numbers[$i], $a1) : array_unshift($numbers[$i], $a2);
		}
	}

	$bitmap = array();
	for($i = 0; $i < 20; $i++) {
		for($j = 0; $j < 4; $j++) {
			$n = substr($authnum, $j, 1);
			$bytes = $numbers[$n][$i];
			$a = mt_rand(0, 14);
			switch($a) {
				case 1: str_replace('9', '8', $bytes); break;
				case 3: str_replace('c', 'e', $bytes); break;
				case 6: str_replace('3', 'b', $bytes); break;
				case 8: str_replace('8', '9', $bytes); break;
				case 0: str_replace('e', 'f', $bytes); break;
			}
			array_push($bitmap, $bytes);
		}
	}

	for($i = 0; $i < 8; $i++) {
		$a = substr('012', mt_rand(0, 2), 1) . substr('012345', mt_rand(0, 5), 1);
		array_unshift($bitmap, $a);
		array_push($bitmap, $a);
	}

	$image = pack('H*', '424d9e000000000000003e000000280000002000000018000000010001000000'.
			'0000600000000000000000000000000000000000000000000000FFFFFF00'.implode('', $bitmap));

	header('Content-Type: image/bmp');
	echo $image;
}
?>