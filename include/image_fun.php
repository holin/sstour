<?php
/************fUploadimg_process************/
//������fUploadimg_process()
//���ܣ��ϴ��ļ�
//���ڣ�2005.10.10
//�������ڣ�2005.10.10
//ʹ��˵����$piclocus���ϴ�ͼƬ�ļ�ʱ��ʹ�õı�������$Store_dir��ͼƬ�洢��·������ڸ�Ŀ¼������upload/scene/picfir/����
//          $Store_simple������ͼ�洢��·������ڸ�Ŀ¼������upload/scene/picfir_simple/����$Fname����ʹ�õ�ͼƬ���֣�
//			һ�����$Fname=date("YmdHis")��������ֵΪ$BackValue����ֵ = ��$Store_dir.$Fname.".".$Suffix#$Store_simple.$Fname.".".$Suffix����
//			$SuffixΪ��׺��#ΪͼƬ������ͼ·���ķָ�����$SceneMain_width��$SceneMain_heightΪ��������ͼ�Ŀ�ͳ���ʹ�ø��ļ�Ӧ����gloabe.inc�ļ���
//���ߣ�trexwb&coldgrass
/*****************************/
function fUploadimg_process($file,$Store_dir,$simp="N")
{
	global $config,$_POST;
	$mime_types = array(
	'gif' => 'image/gif',
	'jpg' => 'image/jpeg',
	'jpeg' => 'image/pjpeg',
	'jpe' => 'image/jpeg',
	'bmp' => 'image/bmp',
	'png' => 'image/png',
	'ppng'=> 'image/x-png',
	'tif' => 'image/tiff',
	'tiff' => 'image/tiff',
	'pict' => 'image/x-pict',
	'pic' => 'image/x-pict',
	'pct' => 'image/x-pict',
	'tif' => 'image/tiff',
	'tiff' => 'image/tiff',
	'psd' => 'image/x-photoshop',
	'swf' => 'application/x-shockwave-flash',
	'js' => 'application/x-javascript',
	'pdf' => 'application/pdf',
	'ps' => 'application/postscript',
	'eps' => 'application/postscript',
	'ai' => 'application/postscript',
	'wmf' => 'application/x-msmetafile',
	'mid' => 'audio/midi',
	'wav' => 'audio/wav',
	'mp3' => 'audio/mpeg',
	'mp2' => 'audio/mpeg',
	'avi' => 'video/x-msvideo',
	'mpeg' => 'video/mpeg',
	'mpg' => 'video/mpeg',
	'qt' => 'video/quicktime',
	'mov' => 'video/quicktime',
	'lha' => 'application/x-lha',
	'lzh' => 'application/x-lha',
	'z' => 'application/x-compress',
	'gtar' => 'application/x-gtar',
	'gz' => 'application/x-gzip',
	'gzip' => 'application/x-gzip',
	'tgz' => 'application/x-gzip',
	'tar' => 'application/x-tar',
	'bz2' => 'application/bzip2',
	'zip' => 'application/zip',
	'arj' => 'application/x-arj',
	'rar' => 'application/octet-stream',
	'rars' => 'application/x-rar-compressed',
	'word' => 'application/msword'
	);
	if(in_array($file['type'],$mime_types) && $file['error'] == '0')
	{
		$Image = explode(".",$file['name']);
		$Num = count($Image) - 1;
		$Suffix =strtolower($Image[$Num]);
		$Fname = date("YmdHis").$_POST['fileKey'];

		if($file['size'] > $config['size'])
		{
			header("Location: update.php?action=error&error=".urlencode("�ļ�̫�����ϴ�"));
			exit;
		}
		//fMessage('file max');

		if($file['size'] == 0)
		{
			header("Location: update.php?action=error&error=".urlencode("�ļ�����Ϊ����Ϣ"));
			exit;
		}

		if(is_dir(R_P.$Store_dir) !== TRUE){mkdir(R_P.$Store_dir,0777);}
		$Picpath = R_P.$Store_dir.$Fname.".".$Suffix;

		if(!copy($file['tmp_name'],$Picpath))
		if(!move_uploaded_file($file['tmp_name'],$Picpath))
		fMessage('file lost',"index.php?action=member&option=info");
		chmod($Picpath,0777);
		if($simp!="N")
		{
			$PicSource = R_P.$Store_dir.$simp.$Fname.".".$Suffix;
			if(is_dir(R_P.$Store_dir.$simp) !== TRUE){mkdir(R_P.$Store_dir.$simp,0777);}
			if($file['type']=='image/gif')
			$im = imagecreatefromgif($Picpath);
			elseif($file['type']=='image/jpeg' || $file['type'] = 'image/pjpeg')
			$im = imagecreatefromjpeg($Picpath);
			else
			$im = imagecreatefrompng($Picpath);

			$srcW=ImageSX($im);
			$srcH=ImageSY($im);
			if($srcW < 120 && $srcH < 120)
			{
				copy($Picpath,$PicSource);
			}else{
				if($srcW > $srcH)
				{
					$withe = 120;
					$height = intval($withe * $srcH / $srcW);
				}elseif($srcH > $srcW){
					$height = 120;
					$withe = intval($height * $srcW / $srcH);
				}else{
					$height = $srcH;
					$withe = $srcW;
				}
				//$ni=ImageCreate($withe,$heigh);//����һ�ſ�ͼ
				$ni=imagecreatetruecolor($withe,$height);//����һ�ſ�ͼ
				imagealphablending($ni, false);
				ImageCopyResized($ni,$im,0,0,0,0,$withe,$height,$srcW,$srcH);//��0��0��0��0�����꿪ʼ
				if($file['type']=='image/gif')
				imagegif($ni,$PicSource);
				elseif($file['type']=='image/jpeg')
				imagejpeg($ni,$PicSource);
				else
				Imagepng($ni,$PicSource);
			}
			chmod($PicSource,0777);
		}
		return  $Fname.".".$Suffix;
	}
	header("Location: update.php?action=error&error=".urlencode("�ϴ��ļ���ʽ������"));
	die ("�ϴ��ļ���ʽ������");
}
/*
* @param Ŀ���ļ� $source
* @param λ�� $w_pos
* @param ˮӡ $w_img
* @param ���� $w_text
* @param ���� $w_font
* @param ��ɫ $w_color
* @param �ں� $w_pct
*/
function ImgWaterMark($source,$w_pos=0,$w_img="",$w_text="",$w_font=5,$w_color="#FF0000",$w_pct){
	global $config;	
	if(!empty($source) && file_exists($config['sysdir'].$source)){
		$source_info = getimagesize($config['sysdir'].$source);		
		$source_w    = $source_info[0];
		$source_h    = $source_info[1];		
		switch($source_info[2]){
			case 1 :
				$source_img = imagecreatefromgif($config['sysdir'].$source);
				break;
			case 2 :
				$source_img = imagecreatefromjpeg($config['sysdir'].$source);
				break;
			case 3 :
				$source_img = imagecreatefrompng($config['sysdir'].$source);
				break;
			default :
				return;
		}
	}else{
		return;
	}
	if(!empty($w_img) && file_exists("{$config['sysdir']}image/water/$w_img")){
		$ifWaterImage = 1;
		$water_info   = getimagesize("{$config['sysdir']}image/water/$w_img");
		$width        = $water_info[0];
		$height       = $water_info[1];
		switch($water_info[2]){
			case 1 :
				$water_img = imagecreatefromgif("{$config['sysdir']}image/water/$w_img");
				break;
			case 2 :
				$water_img = imagecreatefromjpeg("{$config['sysdir']}image/water/$w_img");
				break;
			case 3 :
				$water_img = imagecreatefrompng("{$config['sysdir']}image/water/$w_img");
				break;
			default :
				return;
		}
	}else{
		$ifWaterImage = 0;
		$temp = imagettfbbox(ceil($w_font*2.5),0,"./cour.ttf",$w_text);//ȡ��ʹ�� TrueType ������ı��ķ�Χ
		$width = $temp[2] - $temp[6];
		$height = $temp[3] - $temp[7];
		unset($temp);
	}
	switch($w_pos){
		case 0:
			$wX = rand(0,($source_w - $width));
			$wY = rand(0,($source_h - $height));
			break;
		case 1:
			$wX = 5;
			$wY = 5;
			break;
		case 2:
			$wX = ($source_w - $width) / 2;
			$wY = 0;
			break;
		case 3:
			$wX = $source_w - $width;
			$wY = 0;
			break;
		case 4:
			$wX = 0;
			$wY = $source_h - $height;
			break;
		case 5:
			$wX = ($source_w - $width) / 2;
			$wY = $source_h - $height;
			break;
		case 6:
			$wX = $source_w - $width;
			$wY = $source_h - $height;
			break;
		default:
			$wX = ($source_w - $width) / 2;
			$wY = ($source_h - $height) / 2;
			break;
	}
	imagealphablending($source_img, true);

	if($ifWaterImage){
		imagecopymerge($source_img, $water_img, $wX, $wY, 0, 0, $width,$height,$w_pct);
	}else{
		if(!empty($w_color) && (strlen($w_color)==7)){
			$R = hexdec(substr($w_color,1,2));
			$G = hexdec(substr($w_color,3,2));
			$B = hexdec(substr($w_color,5));
		}else{
			return;
		}
		imagestring($source_img,$w_font,$wX,$wY,$w_text,imagecolorallocate($source_img,$R,$G,$B));
	}

	P_unlink($source);
	switch($source_info[2]){
		case 1 :
			imagegif($source_img,$source);
			break;
		case 2 :
			imagejpeg($source_img,$source);
			break;
		case 3 :
			imagepng($source_img,$source);
			break;
		default :
			return;
	}

	if(isset($water_info)){
		unset($water_info);
	}
	if(isset($water_img)){
		imagedestroy($water_img);
	}
	unset($source_info);
	imagedestroy($source_img);
}
function fimgsrc($file,$simp='simll/')
{
	$img = explode("/",$file);
	$n = count($img)-1;
	$src="";
	for ($i=0;$i<$n;$i++)
	{
		$src .= $img[$i]."/";
	}
	$src .= $simp.$img[$n];
	//if(file_exists($src) && $src!='')
	return $src;
	//else
	//return $file;
}
function fimgsimllsrc($file,$simp='simll')
{
	$img = explode("/",$file);
	$n = count($img)-1;
	$src="";
	for ($i=0;$i<$n;$i++)
	{
		if($img[$i] != 'simll')
		$src .= $img[$i]."/";
	}
	return $src;
}
?>