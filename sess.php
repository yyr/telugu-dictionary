<?php
session_start();
include_once("db.php");
mysql_connect($host,$username,$password) or die ("Unable to connect to the database");
@mysql_select_db($database) or die( "Unable to select database");

$user=$_POST['user'];
$pwd=$_POST['pwd'];
$_SESSION['user']= $user;
$_SESSION['pwd']= $pwd;
$sessuser= $_SESSION['user'];
$sesspwd= $_SESSION['pwd'];

$query="select * from login where username ='$sessuser' and password = '" . md5("$sesspwd") . "'"; $dbresult = mysql_query($query);
$num = mysql_num_rows($dbresult);


if($_POST['submit']!="")
{
if($num>0)
{
header("Location:reviewsteps.php");
exit();
}
}
else
{
}

?>
<html>
<head><title>Session</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"><!--

#dict {
        text-decoration: none;
        color: grey;
        font-family: sans;
        font-size: smaller;
}

--></style>

</head>
<body bgcolor="LightSteelBlue">
<form name="myform" action="" method="POST">
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="2" rowspan="2" style="text-align: center;"><img style="width: 138px; height: 132px;" alt="Swecha Dictionary" src="logo_dictionary14.png"><div><a id="dict" href="http://ltrc.iiit.net/onlineServices/Dictionaries/Eng-Tel-DictDwnld.html">Charles Philip Brown English-Telugu Dictionary</a><br><br><br></div>
</td></tr><tr></tr>
<?php
if($_POST['submit']!="")
{
if($num==0)
{
?>
<tr><td style="text-align: center ; font-size:80%; color:Crimson">Incorrect Username or Password<br><br></td></tr>
<?php
}
}
?>


<tr><td style="text-align: center ; font-size:100%; color:Navy">Username:&nbsp;&nbsp;&nbsp;<input name="user" size="25"><br><br></td></tr>
<tr><td style="text-align: center ; font-size:100%; color:Navy">&nbsp;Password:&nbsp;&nbsp;&nbsp;&nbsp;<input name= "pwd" type="password" size="25">
<br><br></td></tr>
<tr><td colspan="2" rowspan="1" style="text-align: center;"> 
<input type="submit" name="submit" value="Submit"></td><td></td></tr>
<tr><td  colspan="2" rowspan="1" style="text-align: center;">
<br><br><br><br><br>
<a href="index.php">Home</a></td><td></td></tr>
</tbody><table></form><body></html>

