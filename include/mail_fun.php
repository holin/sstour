<?php
/**
 * �ʼ����͹���
 * ����trexwb
 * 2006.06.07
 */
class mail
{
	var $mailTo = ""; // �ռ���
	var $mailCC = ""; // ����
	var $mailBCC = ""; // ���ܳ���
	var $mailFrom = ""; // ������
	var $mailSubject = ""; // ����
	var $mailText = ""; // �ı���ʽ���ż�����
	var $mailHTML = ""; // html��ʽ���ż�����
	var $mailAttachments = ""; // ����

	var $loc_host = "oi77";         //���ż��������������
	var	$smtp_acc = "trexwb"; //Smtp��֤���û���������fuweng@im286.com������fuweng
	var	$smtp_pass="09175201029";       //Smtp��֤�����룬һ���ͬpop3����
	var	$smtp_host="smtp.163.net";   //SMTP��������ַ������ smtp.tom.com
	var	$from="trexwb@163.net";     //������Email��ַ����ķ��������ַ
	var	$headers = "Content-Type: text/plain; charset=\"gb2312\"\r\nContent-Transfer-Encoding: base64";
	var	$lb="\r\n";             //linebreak

	function setTo($inAddress){
		//--��explode()�������ݡ�,�����ʼ���ַ���зָ�
		$addressArray = explode( ",",$inAddress);
		//--ͨ��ѭ�����ʼ���ַ�ĺϷ��Խ��м��
		for($i=0;$i<count($addressArray);$i++){ if($this->checkEmail($addressArray[$i])==false) return false; }
		//--���кϷ���email��ַ����������
		$this->mailTo = implode($addressArray, ",");
		return true;
	}
	/**************************************************
	���� setCC($inAddress) ���ó������ʼ���ַ
	���� $inAddress Ϊ����һ�������ʼ���ַ���ִ�,email��ַ����,
	ʹ�ö������ָ����ʼ���ַ Ĭ�Ϸ���ֵΪtrue
	**************************************************************/
	function setCC($inAddress){
		//--��explode()�������ݡ�,�����ʼ���ַ���зָ�
		$addressArray = explode( ",",$inAddress);
		//--ͨ��ѭ�����ʼ���ַ�ĺϷ��Խ��м��
		for($i=0;$i<count($addressArray);$i++){ if($this->checkEmail($addressArray[$i])==false) return false; }
		//--���кϷ���email��ַ����������
		$this->mailCC = implode($addressArray, ",");
		return true;
	}
	/***************************************************
	����setBCC($inAddress) �������ܳ��͵�ַ ���� $inAddress Ϊ����һ�����
	���ʼ���ַ���ִ�,email��ַ����,ʹ�ö������ָ����ʼ���ַ Ĭ�Ϸ���ֵΪ
	true
	******************************************/
	function setBCC($inAddress){
		//--��explode()�������ݡ�,�����ʼ���ַ���зָ�
		$addressArray = explode( ",",$inAddress);
		//--ͨ��ѭ�����ʼ���ַ�ĺϷ��Խ��м��
		for($i=0;$i<count($addressArray);$i++)
		{ if($this->checkEmail($addressArray[$i])==false)
		return false;
		}
		//--���кϷ���email��ַ����������
		$this->mailBCC = implode($addressArray, ",");
		return true;
	}
	/*****************************************************************
	����setFrom($inAddress):���÷����˵�ַ ���� $inAddress Ϊ�����ʼ�
	��ַ���ִ�Ĭ�Ϸ���ֵΪtrue
	***************************************/
	function setFrom($inAddress){
		if($this->checkEmail($inAddress)){
			$this->mailFrom = $inAddress;
			return true;
		} return false;
	}
	/**********************
	���� setSubject($inSubject) ���������ʼ��������$inSubjectΪ�ִ�,
	Ĭ�Ϸ��ص���true
	*******************************************/
	function setSubject($inSubject){
		if(strlen(trim($inSubject)) > 0){
			$this->mailSubject = ereg_replace( "n", "",$inSubject);
			return true; }
			return false;
	}
	/****************************************************
	����setText($inText) �����ı���ʽ���ʼ�������� $inText Ϊ�ı�����Ĭ
	�Ϸ���ֵΪtrue
	****************************************/
	function setText($inText){
		if(strlen(trim($inText)) > 0){
			$this->mailText = $inText;
			return true; }
			return false;
	}
	/**********************************
	����setHTML($inHTML) ����html��ʽ���ʼ��������$inHTMLΪhtml��ʽ,
	Ĭ�Ϸ���ֵΪtrue
	************************************/
	function setHTML($inHTML){
		if(strlen(trim($inHTML)) > 0){
			$this->mailHTML = $inHTML;
			return true;
		}
		return false;
	}
	/**********************
	���� setAttachments($inAttachments) �����ʼ��ĸ��� ����$inAttachments
	Ϊһ������Ŀ¼���ִ�,Ҳ���԰�������ļ��ö��Ž��зָ� Ĭ�Ϸ���ֵΪtrue
	*******************************************/
	function setAttachments($inAttachments){
		if(strlen(trim($inAttachments)) > 0){
			$this->mailAttachments = $inAttachments;
			return true;
		}
		return false;
	}
	/*********************************
	���� checkEmail($inAddress) :�����������ǰ���Ѿ����ù���,��Ҫ����
	���ڼ��email��ַ�ĺϷ���
	*****************************************/
	function checkEmail($inAddress){
		return (ereg( "^[^@ ]+@([a-zA-Z0-9-]+.)+([a-zA-Z0-9-]{2}|net|com|gov|mil|org|edu|int)$",$inAddress));
	}
	/*************************************************
	����loadTemplate($inFileLocation,$inHash,$inFormat) ��ȡ��ʱ�ļ�����
	�滻���õ���Ϣ����$inFileLocation���ڶ�λ�ļ���Ŀ¼
	$inHash ���ڴ洢��ʱ��ֵ $inFormat ���ڷ����ʼ�����
	***********************************************************/
	function loadTemplate($inFileLocation,$inHash,$inFormat){
		/* �����ʼ�������������: Dear ~!UserName~,
		Your address is ~!UserAddress~ */
		//--���С�~!��Ϊ��ʼ��־��~��Ϊ������־
		$templateDelim = "~";
		$templateNameStart = "!";
		//--�ҳ���Щ�ط����������滻��
		$templateLineOut = ""; //--����ʱ�ļ�
		if($templateFile = fopen($inFileLocation, "r")){
			while(!feof($templateFile)){
				$templateLine = fgets($templateFile,1000);
				$templateLineArray = explode($templateDelim,$templateLine);
				for( $i=0; $i<count($templateLineArray);$i++){
					//--Ѱ����ʼλ��
					if(strcspn($templateLineArray[$i],$templateNameStart)==0){
						//--�滻��Ӧ��ֵ
						$hashName = substr($templateLineArray[$i],1);
						//--�滻��Ӧ��ֵ
						$templateLineArray[$i] = ereg_replace($hashName,(string)$inHash[$hashName],$hashName);
					}
				}
				//--����ַ����鲢����
				$templateLineOut .= implode($templateLineArray, "");
			} //--�ر��ļ�fclose($templateFile);
			//--���������ʽ(�ı���html)
			if( strtoupper($inFormat)== "TEXT" )
			return($this->setText($templateLineOut));
			else if( strtoupper($inFormat)== "HTML" )
			return($this->setHTML($templateLineOut));
		} return false;
	}
	/*****************************************
	���� getRandomBoundary($offset) ����һ������ı߽�ֵ
	���� $offset Ϊ���� �C ���ڶ�ܵ��ĵ��� ����һ��md5()������ִ�
	****************************************/
	function getRandomBoundary($offset = 0){
		//--���������
		srand(time()+$offset);
		//--���� md5 �����32λ �ַ����ȵ��ִ�
		return ( "----".(md5(rand())));
	}
	/********************************************
	����: getContentType($inFileName)�����жϸ���������
	**********************************************/
	function getContentType($inFileName){
		//--ȥ��·��
		$inFileName = basename($inFileName);
		//--ȥ��û����չ�����ļ�
		if(strrchr($inFileName, ".") == false){
			return "application/octet-stream";
		}
		//--������չ���������ж�
		$extension = strrchr($inFileName, ".");
		switch($extension){
			case ".gif": return "image/gif";
			case ".gz": return "application/x-gzip";
			case ".htm": return "text/html";
			case ".html": return "text/html";
			case ".jpg": return "image/jpeg";
			case ".tar": return "application/x-tar";
			case ".txt": return "text/plain";
			case ".zip": return "application/zip";
			default: return "application/octet-stream";
		}
		return "application/octet-stream";
	}
	/**********************************************
	����formatTextHeader���ı����ݼ���text���ļ�ͷ
	*****************************************************/
	function formatTextHeader(){
		$outTextHeader = "";
		$outTextHeader .= "Content-Type: text/plain;charset=us-asciin";
		$outTextHeader .= "Content-Transfer-Encoding: 7bitnn";
		$outTextHeader .= $this->mailText. "n";
		return $outTextHeader;
	} /************************************************
	����formatHTMLHeader()���ʼ��������ݼ���html���ļ�ͷ
	******************************************/
	function formatHTMLHeader(){
		$outHTMLHeader = "";
		$outHTMLHeader .= "Content-Type: text/html;charset=us-asciin";
		$outHTMLHeader .= "Content-Transfer-Encoding: 7bitnn";
		$outHTMLHeader .= $this->mailHTML. "n";
		return $outHTMLHeader;
	}
	/**********************************
	���� formatAttachmentHeader($inFileLocation) ���ʼ��еĸ�����ʶ����
	********************************/
	function formatAttachmentHeader($inFileLocation){
		$outAttachmentHeader = "";
		//--������ĺ���getContentType($inFileLocation)�ó���������
		$contentType = $this->getContentType($inFileLocation);
		//--����������ı������ñ�׼��7λ����
		if(ereg( "text",$contentType)){
			$outAttachmentHeader .= "Content-Type: ".$contentType. ";n";
			$outAttachmentHeader .= ' name="'.basename($inFileLocation). '"'. "n";
			$outAttachmentHeader .= "Content-Transfer-Encoding: 7bitn";
			$outAttachmentHeader .= "Content-Disposition: attachment;n";
			$outAttachmentHeader .= ' filename="'.basename($inFileLocation). '"'. "nn";
			$textFile = fopen($inFileLocation, "r");
			while(!feof($textFile)){
				$outAttachmentHeader .= fgets($textFile,1000);
			}
			//--�ر��ļ� fclose($textFile);
			$outAttachmentHeader .= "n";
		}
		//--���ı���ʽ����64λ���б���
		else{
			$outAttachmentHeader .= "Content-Type: ".$contentType. ";n";
			$outAttachmentHeader .= ' name="'.basename($inFileLocation). '"'. "n";
			$outAttachmentHeader .= "Content-Transfer-Encoding: base64n";
			$outAttachmentHeader .= "Content-Disposition: attachment;n";
			$outAttachmentHeader .= ' filename="'.basename($inFileLocation). '"'. "nn";
			//--�����ⲿ����uuencode���б���
			exec( "uuencode -m $inFileLocation nothing_out",$returnArray);
			for ($i = 1; $i<(count($returnArray)); $i++){
				$outAttachmentHeader .= $returnArray[$i]. "n";
			}
		} return $outAttachmentHeader;
	}
	/******************************
	���� send()���ڷ����ʼ������ͳɹ�����ֵΪtrue
	************************************/
	function send(){
		//--�����ʼ�ͷΪ��
		$mailHeader = "";
		//--��ӳ�����
		if($this->mailCC != "")
		$mailHeader .= "CC: ".$this->mailCC. "n";
		//--������ܳ�����
		if($this->mailBCC != "")
		$mailHeader .= "BCC: ".$this->mailBCC. "n";
		//--��ӷ�����
		if($this->mailFrom != "")
		$mailHeader .= "FROM: ".$this->mailFrom. "n";

		$this->loc_host = "oi77";         //���ż��������������
		$this->smtp_acc = "trexwb"; //Smtp��֤���û���������fuweng@im286.com������fuweng
		$this->smtp_pass="09175201029";       //Smtp��֤�����룬һ���ͬpop3����
		$this->smtp_host="smtp.163.com";   //SMTP��������ַ������ smtp.tom.com
		$this->from="trexwb@163.com";     //������Email��ַ����ķ��������ַ
		$this->headers = "Content-Type: text/plain; charset=\"gb2312\"\r\nContent-Transfer-Encoding: base64";
		$this->lb="\r\n";             //linebreak
		$this->send_mail($this->mailTo,$this->mailSubject, $mailHeader);
		//---------------------------�ʼ���ʽ------------------------------
		//--�ı���ʽ
		if($this->mailText != "" && $this->mailHTML == "" && $this->mailAttachments == ""){
			//return mail($this->mailTo,$this->mailSubject,$this->mailText,$mailHeader);
			if(!mail($this->mailTo,$this->mailSubject,$this->mailText,$mailHeader))
			return $this->send_mail($this->mailTo,$this->mailSubject, $mailHeader);
		}
		//--html��text��ʽ
		else if($this->mailText != "" && $this->mailHTML != "" && $this->mailAttachments == ""){
			$bodyBoundary = $this->getRandomBoundary();
			$textHeader = $this->formatTextHeader();
			$htmlHeader = $this->formatHTMLHeader();
			//--���� MIME-�汾
			$mailHeader .= "MIME-Version: 1.0n";
			$mailHeader .= "Content-Type: multipart/alternative;n";
			$mailHeader .= ' boundary="'.$bodyBoundary. '"';
			$mailHeader .= "nnn";
			//--����ʼ�����ͱ߽�
			$mailHeader .= "--".$bodyBoundary. "n";
			$mailHeader .= $textHeader;
			$mailHeader .= "--".$bodyBoundary. "n";
			//--���html��ǩ
			$mailHeader .= $htmlHeader;
			$mailHeader .= "n--".$bodyBoundary. "--";
			//--�����ʼ�
			//return mail($this->mailTo,$this->mailSubject, "",$mailHeader);
			if(!mail($this->mailTo,$this->mailSubject, "",$mailHeader))
			return $this->send_mail($this->mailTo,$this->mailSubject, $mailHeader);
		}
		//--�ı���html�Ӹ���
		else if($this->mailText != "" && $this->mailHTML != "" && $this->mailAttachments != ""){
			$attachmentBoundary = $this->getRandomBoundary();
			$mailHeader .= "Content-Type: multipart/mixed;n";
			$mailHeader .= ' boundary="'.$attachmentBoundary. '"'. "nn";
			$mailHeader .= "This is a multi-part message in MIME format.n";
			$mailHeader .= "--".$attachmentBoundary. "n";
			$bodyBoundary = $this->getRandomBoundary(1);
			$textHeader = $this->formatTextHeader();
			$htmlHeader = $this->formatHTMLHeader();
			$mailHeader .= "MIME-Version: 1.0n";
			$mailHeader .= "Content-Type: multipart/alternative;n";
			$mailHeader .= ' boundary="'.$bodyBoundary. '"';
			$mailHeader .= "nnn";
			$mailHeader .= "--".$bodyBoundary. "n";
			$mailHeader .= $textHeader;
			$mailHeader .= "--".$bodyBoundary. "n";
			$mailHeader .= $htmlHeader;
			$mailHeader .= "n--".$bodyBoundary. "--";
			//--��ȡ����ֵ
			$attachmentArray = explode( ",",$this->mailAttachments);
			//--���ݸ����ĸ�������ѭ��
			for($i=0;$i<count($attachmentArray);$i++){
				//--�ָ� $mailHeader .= "n--".$attachmentBoundary. "n";
				//--������Ϣ
				$mailHeader .= $this->formatAttachmentHeader($attachmentArray[$i]);
			}
			$mailHeader .= "--".$attachmentBoundary. "--";
			//return mail($this->mailTo,$this->mailSubject, "",$mailHeader);
			if(!mail($this->mailTo,$this->mailSubject, "",$mailHeader))
			return $this->send_mail($this->mailTo,$this->mailSubject, "",$mailHeader);
		}
		return false;
	}
	function send_mail($to, $subject = 'No subject', $body)
	{
		$hdr = explode($this->lb,$this->headers);   //�������hdr
		if($body) {$bdy = preg_replace("/^\./","..",explode($this->lb,$body));}//�������Body

		$smtp = array(
		//1��EHLO���ڴ�����220����250
		array("EHLO ".$this->loc_host.$this->lb,"220,250","HELO error: "),
		//2������Auth Login���ڴ�����334
		array("AUTH LOGIN".$this->lb,"334","AUTH error:"),
		//3�����;���Base64������û������ڴ�����334
		array(base64_encode($this->smtp_acc).$this->lb,"334","AUTHENTIFICATION error : "),
		//4�����;���Base64��������룬�ڴ�����235
		array(base64_encode($this->smtp_pass).$this->lb,"235","AUTHENTIFICATION error : "));
		//5������Mail From���ڴ�����250
		$smtp[] = array("MAIL FROM: <".$this->from.">".$this->lb,"250","MAIL FROM error: ");
		//6������Rcpt To���ڴ�����250
		$smtp[] = array("RCPT TO: <".$to.">".$this->lb,"250","RCPT TO error: ");
		//7������DATA���ڴ�����354
		$smtp[] = array("DATA".$this->lb,"354","DATA error: ");
		//8.0������From
		$smtp[] = array("From: ".$this->from.$this->lb,"","");
		//8.2������To
		$smtp[] = array("To: ".$to.$this->lb,"","");
		//8.1�����ͱ���
		$smtp[] = array("Subject: ".$subject.$this->lb,"","");
		//8.3����������Header����
		foreach($hdr as $h) {$smtp[] = array($h.$this->lb,"","");}
		//8.4������һ�����У�����Header����
		$smtp[] = array($this->lb,"","");
		//8.5�������ż�����
		if($bdy) {foreach($bdy as $b) {$smtp[] = array(base64_encode($b.$this->lb).$this->lb,"","");}}
		//9�����͡�.����ʾ�ż��������ڴ�����250
		$smtp[] = array(".".$this->lb,"250","DATA(end)error: ");
		//10������Quit���˳����ڴ�����221
		$smtp[] = array("QUIT".$this->lb,"221","QUIT error: ");

		//��smtp�������˿�
		$fp = fsockopen($this->smtp_host, 25);
		if (!$fp) echo "Error: Cannot conect to ".$this->smtp_host;
		while($result = fgets($fp, 1024)){if(substr($result,3,1) == " ") { break; }}

		$result_str="";
		//����smtp�����е�����/����
		foreach($smtp as $req){
			//������Ϣ
			fputs($fp, $req[0]);
			//�����Ҫ���շ�����������Ϣ����
			if($req[1]){
				//������Ϣ
				while($result = fgets($fp, 1024)){
					if(substr($result,3,1) == " ") { break; }
				};
				if (!strstr($req[1],substr($result,0,3))){
					$result_str.=$req[2].$result;
				}
			}
		}
		//�ر�����
		fclose($fp);
		return $result_str;
	}
}
/*
$mail->setTo("a@a.com"); //�ռ���
$mail->setCC��"b@b.com,c@c.com"��; //����
$mail->setCC��"d@b.com,e@c.com"��; //���ܳ���
$mail->setFrom(��f@f.com��);//������
$mail->setSubject(�����⡱) ; //����
$mail->setText(���ı���ʽ��) ;//�����ı���ʽҲ�����Ǳ���
$mail->setHTML(��html��ʽ��) ;//����html��ʽҲ�����Ǳ���
$mail->setAttachments(��c:a.jpg��) ;//��Ӹ���,�����·��
$mail->send(); //�����ʼ�
*/
?>