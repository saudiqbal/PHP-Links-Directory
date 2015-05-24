<?php
require("../config.php");
if ($enablegzip == "1")
{
ob_start("ob_gzhandler");
header("Content-Encoding: gzip");
}
session_start();
?>
<html>
<head>
<LINK REL=StyleSheet HREF="../style.css" TYPE="text/css">
<script language="JavaScript" src="../collapse_expand_single_item.js"></script>
</head>
<body topmargin="0" leftmargin="0">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="83">
<tr>
<td width="100%" background="../images/bar2.gif" height="12">&nbsp;</td>
</tr>
<tr>
<td width="100%" height="50">
<h1>&nbsp;&nbsp;<?php print"$sitetitle"; ?></h1></td>
</tr>
<tr>
<td width="100%" background="../images/bar1.gif" height="21">&nbsp;</td>
</tr>
</table>
<br>
<center><b><u>LINKS</u></b></center>
<br>
<div style="padding-left: 10"><b><a href="../index.php"><< Back to Directory</a></b><br><br>
<a href="#first" onClick="shoh('first');" ><img src="../images/addlink.jpg" name="imgfirst" border="0" ></a><br><br>
<div style="display: none;" id="first">
<div style="FONT-SIZE:8pt; color:#000000; background-color: #DAE4F3; border: 1px solid #4277C1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; width:700; height:225">
<FORM action=addurl.php METHOD=POST NAME="addurlform">
<table border="0" cellpadding="0" cellspacing="0" width="600">
<tr><td width="100">Title:</td><td width="500"><INPUT TYPE=TEXT name=text size="30"></td></tr>
<tr><td width="100">Link:</td><td width="500"><INPUT TYPE=TEXT value="http://" name=link size="82"></td></tr>
<tr><td width="100">Description:</td><td width="500"><INPUT TYPE=TEXT name=desc size="82"></td></tr>
<tr><td width="100">Your name:</td><td width="500"><INPUT TYPE=TEXT name=name size="30"></td></tr>
<tr><td width="100">Email:</td><td width="500"><INPUT TYPE=TEXT name=email size="30"></td></tr>
<tr><td width="100">Country:</td><td width="500"><INPUT TYPE=TEXT name=country size="30"></td></tr>
<tr><td width="100">Link Quality:</td><td width="500"><input class="radio" type="radio" name="rating" value="1" >1 <input class="radio" type="radio" name="rating" value="2" >2 <input class="radio" type="radio" name="rating" value="3" >3 <input class="radio" type="radio" name="rating" value="4" >4 <input class="radio" type="radio" name="rating" value="5" >5 </td></tr>
<?php
if ($enablecode == "1")
{
echo <<<TEXT
<tr><td width="100"></td><td width="500">Enter this text <img src="../randomimage.php"> into this field <INPUT TYPE=TEXT name=validation size="10"></td></tr>
TEXT;
}
?>
<tr><td width="100">&nbsp;</td><td width="500"><INPUT TYPE=SUBMIT value="Add"></td></tr>
</table>
</form>
</div>
</div>
</div>
<br>
<?php
$gbfile='links.txt';
$separator= '|';

//====================================
//This function will add one line to 
//the end of file
//====================================
function add($str){
global $gbfile;
      $tmp = trim($str);
      $fp=fopen($gbfile,'a+'); 
           flock($fp, LOCK_EX); 
                fwrite($fp, $tmp. "\n"); 
           flock($fp, LOCK_UN); 
      fclose($fp); 
}

//====================================
//Function below gets specified number
//of lines and returns an array
//====================================
function get($start, $end){
global $gbfile;
      $records=array();
      $filename="links.txt"; 
      $fp=fopen($gbfile,'r'); 
           flock($fp, LOCK_SH); 
           $i=1; 
           $tmp=TRUE;
           while($i<$start && !feof($fp)) {
                $tmp=fgets($fp);
                $i++;
           }
           while($i<=$end && !feof($fp)) {
                $tmp=trim(fgets($fp));
                if ($tmp) { array_push($records, $tmp); }
                $i++;
           }

           flock($fp, LOCK_UN); 
      fclose($fp); 
      return($records);
}



//Listing part

$start=$_GET['start'];
$end=$_GET['end'];

if (!$end || $start<=0) { $start=1; }
if (!$end) { $end=$linkspage; }
if ($end<$start) { $end=$start+1; }
$show=$end - $start;

//Get records from file into array
      $records = get($start, $end);

//For each record get each field
      foreach ($records as $rec) {
           $tmp = explode($separator, $rec);
$title = $tmp[0];
$link = $tmp[1];
$desc = $tmp[2];
$name = $tmp[3];
$email = $tmp[4];
$country = $tmp[5];
$rating = $tmp[6];

//=================================
//Outputting
?>
<div style="padding-left: 10">
<div style="FONT-SIZE:8pt; color:#000000; background-color: #DAE4F3; border: 1px solid #4277C1; width:750; height:65">
<b>Title: <?=$title?></b><br>
Link: <a href="<?=$link?>" target="2"><?=$link?></a><br>
Description: <?=$desc?><br>
Link submitted by <a href="mailto:<?=$email?>"><?=$name?></a> from <?=$country?><b> Rating </b><img src="../images/<?=$rating?>.gif">
</div>
</div><br>
<?php
}
//Pagination
if ($start>$show) {
      $start-=$show;
      $end-=$show;
      $start--;
      $end--;
      print "<div style=\"padding-left: 10\"><a href=index.php?start=$start&end=$end><img src=../images/previous.jpg border=0></a>&nbsp;&nbsp;";
      if (count($records)!=0) {
      $start+=$show*2;
      $end+=$show*2;
      $start=$start+2;
      $end=$end+2;
      print "<a href=index.php?start=$start&end=$end><img src=../images/next.jpg border=0></a></div>";
      $start--;
      $end--;
} 
else { 
      print "No more records found !";
}
}
else {
      $start+=$show;
      $end+=$show;
      $start++;
      $end++;
      print "<div style=\"padding-left: 10\"><a href=index.php?start=$start&end=$end><img src=../images/next.jpg border=0></a></div>";
      $start--;
      $end--;
}
?>
<br><br><br><br><br><br>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="31">
<tr>
<td width="100%" background="../images/basebg.gif" height="31"><font size="2"><?php print"$sitefooter"; ?></font></td>
</tr>
</table>

<br>
</body>
</html>
