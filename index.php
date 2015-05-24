<?php
require("config.php");
if ($enablegzip == "1")
{
ob_start("ob_gzhandler");
header("Content-Encoding: gzip");
}
?>
<html>
<head>
<LINK REL=StyleSheet HREF="style.css" TYPE="text/css">
</head>
<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" rightmargin="0">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="83">
<tr>
<td width="100%" background="images/bar2.gif" height="12">&nbsp;</td>
</tr>
<tr>
<td width="100%" height="50">
<h1> &nbsp;&nbsp;<?php print"$sitetitle"; ?></h1></td>
</tr>
<tr>
<td width="100%" background="images/bar1.gif" height="21">&nbsp;</td>
</tr>
</table>
<br>
<table border="0" align="center" width="600">
<tr>
<td valign="top">
<b>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="arts/index.php">Arts & Humanities</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="business/index.php">Business & Economy</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="computers/index.php">Computers</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="education/index.php">Education & Careers</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="entertainment/index.php">Entertainment & Games</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="health/index.php">Health & Fitness</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="internet/index.php">Internet</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="music/index.php">Music & Film</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="news/index.php">News & Reference</a></p>
</b>
</td>
<td valign="top">
<b>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="people/index.php">People & Society</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="personal/index.php">Personal Home Pages</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="recreation/index.php">Recreation & Sports</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="regional/index.php">Regional & Travel</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="religion/index.php">Religion and Spirituality</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="science/index.php">Science & Technology</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="shopping/index.php">Shopping & Automotive</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="women/index.php">Women & Family</a></p>
<p style="margin: 7px"><img src="images/arrow.gif" width="17" height="18"> <a href="world/index.php">World</a></p></td>
</b>
</tr>
</table>
<br><br>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="31">
<tr>
<td width="100%" background="images/basebg.gif" height="31"><font size="2"><?php print"$sitefooter"; ?></font></td>
</tr>
</table>

<br>
</body>
</html>
