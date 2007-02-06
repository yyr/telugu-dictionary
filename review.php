<?php
session_start();
include_once("db.php");
mysql_connect($host,$username,$password) or die ("Unable to connect to the database");
@mysql_select_db($database) or die( "Unable to select database");
$sessuser= $_SESSION['user'];
$sesspwd= $_SESSION['pwd'];
$query="select * from login where username ='$sessuser' and password = '" . md5("$sesspwd") . "'";
$dbresult = mysql_query($query);
$num = mysql_num_rows($dbresult);
if($num>0)
{

if ($_POST['add'] == 'ADD')
{
    $meanings=$_POST['meanings'];
    foreach ($meanings as $value)
    {
        mysql_query("UPDATE suggestions SET status ='1' WHERE meaning = '$value'");
    }
}
if($_POST['remove'] == 'REMOVE')
{
  $meanings = $_POST['meanings'];
   foreach ($meanings as $value)
     {
        mysql_query("DELETE FROM suggestions WHERE meaning = '$value'");
     }
}
if($_GET['search'] != "")
{
session_unset();
session_destroy();
header("Location:sess.php");
}

?>

<html>
<head>
<title>Reviewer's page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"><!--

#dict {
        text-decoration: none;
        color: grey;
        font-family: sans;
        font-size: smaller;
}
#ques {
                        background:SteelBlue ;
                        color: Navy;
                        font-family:sans;
                        font-weight: bold;
                        font-size : 14;
                        padding: 2px;                 }

--></style>
</head>
<body bgcolor="LightSteelBlue">

<form enctype="text/plain" method="get" action="" name="Review"><br><br>
<table style="width: 90%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr><td align= "left" style= "font-family:verdana; font-size:80%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="index.php">Home</a><br><a href="reviewsteps.php">Steps to be followed</td>
<td  align= "right" style= "font-family:verdana; font-size:80%;">
<a href="?search=logout">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></tbody></table>
<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="1" rowspan="2" style="text-align: center;"><img style="width: 138px; height: 132px;" alt="Swecha Dictionary" src="logo_dictionary14.png"><div><a id="dict" href="http://ltrc.iiit.net/onlineServices/Dictionaries/Eng-Tel-DictDwnld.html">Charles Philip Brown English-Telugu Dictionary</a></div>
</td>
</tr><tr></tr>
<tr><td id="ques" style="vertical-align: top; font-size:100%;">Suggestions To Be Reviewed:</td></tr>

<?php
$query = "select distinct(eng_word) from suggestions where status = '0'";
$result = mysql_query($query);
$num= mysql_num_rows($result);
$i=0;
?>
<tr><td style="text-align: center;  font-size:100%; color:Navy"><br><u><b>English Words</b></u><br><br>
<select name="mylist" size=5>
<?php
while($i<$num)
{
$row = mysql_fetch_row($result);
?>
<option value= "<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
<?php
$i++;}?></select></td><td></td>
<tr><td style="text-align: center;">
<br><input type="submit" name="submit" value="Submit"></td><td></td></tr>
</tbody></table></form>
<?php
$select_engword=$_GET['mylist'];
$subquery= "select meaning from suggestions where eng_word = '$select_engword' and status='0'";
$subresult = mysql_query($subquery) or die("not executed");
$subnum = mysql_num_rows($subresult);
$j=0;
if($_GET['mylist']!='')
{
?>
<form method="post" action="review.php">
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>

<tr><td style="text-align: left ; font-size:100%; color:Navy"><br><br><u><b>Meanings Suggested by the users:</b></u><br><br><i><?php echo $select_engword;?></i><br>
<?php
while($j<$subnum)
{
$subrow = mysql_fetch_row($subresult);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="checkbox"  NAME="meanings[]" value="<?php echo $subrow[0];?>"><?php echo $subrow[0];?></INPUT><br>
<?php
$j++;
}
?>
</td></tr></tbody></table>
<br><br>
<table style="width: 20%; text-align: center; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr><td>
<input type="submit" name="add" value="ADD"></td>

<td>
<input type="submit" name="remove" value="REMOVE"></td></tr></tbody></table><br><br>
<table  style="text-align: left; width: 100%; color:Navy" border="0" cellpadding="12" cellspacing="0">
<tbody>

<?php
$subquery2 ="SELECT * FROM eng2te where eng_word='$select_engword' ORDER BY eng_word";
$subquery3 ="SELECT eng_word, meaning  FROM suggestions where status= '1' && eng_word='$select_engword' ORDER BY eng_word";
$subresult2=mysql_query($subquery2);
$subresult3=mysql_query($subquery3);
$subnum2=mysql_num_rows($subresult2);
$subnum3=mysql_num_rows($subresult3);
if($subnum2!=0 || $subnum3!=0)
{
?>
<tr><div id="ques" style="vertical-align: top; font-size:100%;">Meaning Taken From The Standard Dictionary As well From The User Suggestions:</div><br></tr>
<?php
}
if($subnum2!=0)
{
$l=0;
while ($l < $subnum2) {
$subrow2 = mysql_fetch_row($subresult2);
?>

<tr>
<td style="vertical-align: top;"><strong><?php echo "$subrow2[0]"; ?></strong></td>
<td  style="vertical-align: top;">
<?php
$smeaning = $subrow2[1].$subrow2[2];
echo $smeaning;
?>
</td>
<td>
<?php
$srow6=preg_split('[\.]',$subrow2[3]);
$snum6 = count($srow6);

for($p=0;$p<$snum6-1; $p++)
{
if(strlen($srow6[$p])>15)
{
$meaning6 =  $srow6[$p]. ".";
echo $meaning6;
?>
<br>
<?php
}
else
{
$meaning6 = $srow6[$p]. ".";
echo $meaning6;

}

}
echo "$srow6[$p]\n";
?></td>
</tr>
<?php
$l++;
?>
</td>
</tr>
<?php
}
}
if($subnum3!=0)
{
$m=0;
while ($m < $subnum3) {
$subrow3 = mysql_fetch_row($subresult3);
?>
<tr>
<td style="vertical-align: top;"><strong><?php echo "$subrow3[0]"; ?></strong></td>
<td style="vertical-align: top;"></td>
<td>
<?php
$srow4=preg_split('[\.]',$subrow3[1]);
$snum4 = count($srow4);

for($q=0;$q<$snum4-1; $q++)
{
if(strlen($srow4[$q])>15)
{
$meaning4 =  $srow4[$q]. ".";
echo $meaning4;

?>
<br>
<?php
}
else
{
$meaning4 = $srow4[$q]. ".";
echo $meaning4;

}

}
echo "$srow4[$q]\n";

?></td>
</tr>
<?php
$m++;
?>
</td>
</tr>
<?php
}
}
?>
</tbody></table>
<?php
}
?>
</form>
<?php
mysql_close();
}
else
{
header("Location:sess.php ");
}
?>
</body>
</html>

