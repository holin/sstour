<?
set_time_limit(0);
ob_start();
include_once "./include/config.php";
include_once "./include/sql_config.php";

header("Content-type:text/html; charset={$ODBC['charset']}");

include_once "./global.php";
include_once Getincludefun("all");
include_once Getincludefun("ubb");
$blog_title = $_POST['blog_title'];
$blog_info_quote = $_POST['blog_info_quote'];
$blog_body = str_replace("\\\"","\"",$_POST['blog_body']);
$blog_body = preg_replace("/onload=resizeImg\(this,500\)/si","forbidden",$blog_body);
$blog_info_quote = convert($blog_info_quote,$allow,$type="post");
$blog_body = convert($blog_body,$allow,$type="post")
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>控制面板 - 文章预览</title>
<link rel="StyleSheet" href="lang/edit/base.css">
<script type="text/javascript">
function show_sort()
{
	var oObj = opener.$('blog_class');
	for (var i = 0; i < oObj.length; i++)
	{
		if (oObj.options[i].value == 0)
		{
			document.write( oObj.options[i].text );
			return true;
		}
	}
}
function show_img(img_id)
{
	var img_html;
	img_html = "<div align='center' valign='middle'><a href=\"" + opener.$('file' + img_id).value + "\" target=\"_blank\"><img src=\"" + opener.$('file' + img_id).value + "\" border=\"0\" onload='javascript:if(this.width>500)this.width=500;' onerror=\"this.src='/images/picError.gif'\"></a></div>";
	document.write( img_html );
}
</script>
</head>
<body>
    <table width="640" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3" height="3"><img src="image/edit/O_angle_up_left.gif" width="3" height="3"></td>
            <td bgcolor="#6795b4" width="100%"></td>
            <td width="3"><img src="image/edit/O_angle_up_right.gif" width="3" height="3"></td>
          </tr>
        </table>

		</td>
      </tr>
      <tr>
        <td bgcolor="#6795b4"><img src="image/edit/article_preview.gif" width="90" height="25"></td>
        </tr>
      <tr>
        <td class="form_border"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="20">&nbsp;</td>
            <td><table width="100%"  border="0" cellspacing="5" cellpadding="0" style="word-wrap: break-word; word-break: break-all;TABLE-LAYOUT: fixed;">
                <tr>
                  <td width="60" align="right">文章标题：</td>
                  <td><?=$blog_title?></td>
                </tr>
                <tr>
                  <td align="right">允许评论：</td>
                  <td>允许</td>
                </tr>
                <tr>
                  <td align="right">引用来源：</td>
                  <td><?=$blog_info_quote?></td>
                </tr>
                <tr>
                  <td align="right">文章正文：</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2"><?=$blog_body?></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><input type="button" value="关闭" class="smb_btn"  onclick="javascript:window.close()"></td>
                </tr>
            </table></td>
            <td width="20">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>
	        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
	          <tr>
	            <td width="3"><img src="image/edit/O_angle_down_left.gif" width="3" height="3"></td>
	            <td height="3" background="image/edit/O_angle_bottom.gif" width="100%"></td>
	            <td width="3"><img src="image/edit/O_angle_down_right.gif" width="3" height="3"></td>
	          </tr>

	        </table>
        </td>
        </tr>
    </table>          
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>

    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?
ob_end_flush();
?>