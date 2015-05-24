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
<br><br><br><br><br><br><center>

<?php if (isset($_GET['error'])) $PAGE = $_GET['error']; # You can change the value between the brackets to change the index.php?xxx #

else $PAGE = 'blank';  # When no page is being asked for, it will default to home. See below!

switch ($PAGE)
{

// Blank title
case 'blanktitle':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter your title.
</div>
</center>
TEXT;
break;

// illegal title
case 'titleillegal':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Your title contains illegal characters
</div>
</center>
TEXT;
break;

// blank link
case 'blanklink':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter your link.
</div>
</center>
TEXT;
break;

// illegal link
case 'linkillegal':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Your link contains illegal characters<br>Only static links are allowed.
</div>
</center>
TEXT;
break;

// blank description
case 'blankdesc':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter your description.
</div>
</center>
TEXT;
break;

// illegal description
case 'descillegal':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Your description contains illegal characters
</div>
</center>
TEXT;
break;

// Long description
case 'desclong':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Your characters are too long.<br>
Characters allowed<br>
Title: 50<br>
Links: 120<br>
Description: 100<br>
Name: 25<br>
Country: 25
</div>
</center>
TEXT;
break;

// blankcode
case 'blankcode':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter the Code
</div>
</center>
TEXT;
break;

// Wrong Code
case 'wrongcode':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter the correct Code
</div>
</center>
TEXT;
break;

// Wrong Name
case 'blankname':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter your name
</div>
</center>
TEXT;
break;

// Illegal Name
case 'nameillegal':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Your name contains illegal characters
</div>
</center>
TEXT;
break;

// Blank Country
case 'blankcountry':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter your country
</div>
</center>
TEXT;
break;

// Illegal Country
case 'countryillegal':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Your country name contains illegal characters
</div>
</center>
TEXT;
break;

// Blank email
case 'blankemail':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Blank or wrong email address entered
</div>
</center>
TEXT;
break;

// Illegal email
case 'wrongemail':
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Please enter a valid email address
</div>
</center>
TEXT;
break;

// default value
case 'blank':  # value to call , index.php?xxx=about
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
There is some error with your request.
</div>
</center>
TEXT;
break;

default:
echo <<<TEXT
<div style="width:400; height:40; background-color: #FFBFBF; border: 1px solid #FF0000; font-size: 12pt; font-weight: bold; padding-left: 10; padding-right: 10; padding-top: 10; padding-bottom: 10; text-align: center">
Your request does not exist.
</div>
</center>
TEXT;
break;
} ?>

<br><br><br><br><br><br><br><br><br><br><br><br>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="31">
<tr>
<td width="100%" background="images/basebg.gif" height="31"><font size="2"><?php print"$sitefooter"; ?></font></td>
</tr>
</table>

<br>
</body>
</html>
