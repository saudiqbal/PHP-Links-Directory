<?php
session_start();
require("../config.php");
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

//=============================================
//Start of the script 
//=============================================
//If the method is post then add new message 
//to the guestbook file
if ($_SERVER['REQUEST_METHOD']=='POST')
{
$title = ($_POST['text']);
$link = ($_POST['link']);
$desc = ($_POST['desc']);
$name = ($_POST['name']);
$rating = ($_POST['rating']);
$country = ($_POST['country']);
$email = strtolower($_POST['email']);
$validationcode = $_POST['validation'];

// Check empty title
if (empty($title))
{
header("Location: $errorpage?error=blanktitle");
exit();
}
// Check empty link
if(!ereg("[h][t][t][p][:][/][/][a-zA-Z0-9\]",$link))
{
header("Location: $errorpage?error=blanklink");
exit();
}
// Check empty description
if (empty($desc))
{
header("Location: $errorpage?error=blankdesc");
exit();
}
// Check empty name
if (empty($name))
{
header("Location: $errorpage?error=blankname");
exit();
}
// Check empty rating
if (empty($rating))
{
$rating = "0";
}
// Check empty country
if (empty($country))
{
header("Location: $errorpage?error=blankcountry");
exit();
}
// Check empty email
if (!ereg("^\s*[a-z][a-z0-9]*(\.[a-z0-9][a-z0-9-]*)*(\+[a-z0-9]*)?@[a-z0-9][a-z0-9-]*(\.[a-z0-9][a-z0-9-]*)*\.[a-z]{2,6}\s*$", $email))
{
header("Location: $errorpage?error=blankemail");
exit();
}
// Check title
if(preg_match('/[^a-zA-Z0-9\s\.]/', $title))
{
header("Location: $errorpage?error=titleillegal");
exit();
}
$desccount = strlen($title);
if ($desccount > 50)
{
header("Location: $errorpage?error=desclong");
exit();
}
// Check link
if(preg_match('/[^a-zA-Z0-9 \%\&\/\:\-\+\:\,\.\?\=\_\#]/', $link))
{
header("Location: $errorpage?error=linkillegal");
exit();
}
$desccount = strlen($link);
if ($desccount > 120)
{
header("Location: $errorpage?error=desclong");
exit();
}
// Check description
if(preg_match('/[^a-zA-Z0-9\s\.]/', $desc)) {
header("Location: $errorpage?error=descillegal");
exit();
}
$desccount = strlen($desc);
if ($desccount > 100)
{
header("Location: $errorpage?error=desclong");
exit();
}
// Check name
if(preg_match('/[^a-zA-Z0-9\s]/', $name))
{
header("Location: $errorpage?error=nameillegal");
exit();
}
$desccount = strlen($name);
if ($desccount > 25)
{
header("Location: $errorpage?error=desclong");
exit();
}
// Check rating
if(preg_match('/[^0-9]/', $rating))
{
header("Location: $errorpage?error=countryillegal");
exit();
}
// Check country
if(preg_match('/[^a-zA-Z0-9\s]/', $country))
{
header("Location: $errorpage?error=countryillegal");
exit();
}
$desccount = strlen($country);
if ($desccount > 25)
{
header("Location: $errorpage?error=desclong");
exit();
}
// Check validation code
if ($enablecode == "1")
{
if (empty($validationcode))
{
header("Location: $errorpage?error=blankcode");
exit();
}
if(md5($validationcode) != $_SESSION['image_random_value'])
{
header("Location: $errorpage?error=wrongcode");
exit();
}
}
// Spam protection
$email = str_replace('@', '[AT]', $email);
// Now start writing
$tmp = implode($separator, array($title, $link, $desc, $name, $email, $country, $rating));
add($tmp);
// Now redirect
header("Location: index.php");
exit();
}
?>