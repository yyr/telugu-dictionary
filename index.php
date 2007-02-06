<?php
   header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>English To Telugu Dictionary</title>
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
                        padding: 2px;
                }



--></style>
</head>

<body bgcolor="LightSteelBlue">
<?php
if($_GET['search_string'] == "")
{
?>
<br>
<br>
<br>
<br>
<?php } ?>

<form enctype="text/plain" method="get" action="" name="dictionary">
<div align= "right" style= "font-family:verdana; font-size:80%;">
<a href="reviewsteps.php">admin</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="1" rowspan="2" style="text-align: center;"><img style="width: 138px; height: 132px;" alt="Swecha Dictionary" src="logo_dictionary14.png"><div><a id="dict" href="http://ltrc.iiit.net/onlineServices/Dictionaries/Eng-Tel-DictDwnld.html">Charles Philip Brown English-Telugu Dictionary</a></div>
</td>
</tr>
<tr></tr><tr><td>
<div align= "center" style= "font-family:verdana; font-size:80%;">
<a href="render.php">Rendering Problems</a>&nbsp; &nbsp;
<a href="help.php">Help</a>&nbsp; &nbsp;
<a href="suggestions.php">User Suggestions</a>&nbsp; &nbsp;
<a href="download.php">Download Content and Code</a></div>
<br><div style="text-align: center; font-size:100%; color:Navy"><b>పదము   (Search Word) &nbsp;</b><input name="search_string" value="<?php echo preg_replace('/\"/','&quot;',$_GET['search_string'])?>">&nbsp;&nbsp;
<select name="mode">
<?php
if(($_GET['mode'] == 'match_word') || ($_GET['mode'] == ""))
{
?>
	<option value="match_word" selected="selected">Match Word</option>
	<option value="match_context">Match Context</option>
<?php
}
else
{
?>
	<option value="match_word">Match Word</option>
	<option value="match_context" selected="selected">Match Context</option>
<?php
}?>
</select>
</div><br>
<div style="text-align: center; vertical-align: top;" colspan="2" rowspan="1"><input name="submit" value="Search" type="submit">&nbsp;&nbsp; <input name="reset" value="Reset" type ="Reset">
</div></td>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
<tr><td> <div align="center" style= "font-family:verdana; font-size:80%; color:Navy"><a href="?search=A">A</a>&nbsp;
      <a href="?search=B">B</a>&nbsp;
      <a href="?search=C">C</a>&nbsp;
      <a href="?search=D">D</a>&nbsp;
      <a href="?search=E">E</a>&nbsp;
      <a href="?search=F">F</a>&nbsp;
      <a href="?search=G">G</a>&nbsp;
      <a href="?search=H">H</a>&nbsp;
      <a href="?search=I">I</a>&nbsp;
      <a href="?search=J">J</a>&nbsp;
      <a href="?search=K">K</a>&nbsp;
      <a href="?search=L">L</a>&nbsp;
      <a href="?search=M">M</a>&nbsp;
      <a href="?search=N">N</a>&nbsp;
      <a href="?search=O">O</a>&nbsp;
      <a href="?search=P">P</a>&nbsp;
      <a href="?search=Q">Q</a>&nbsp;
      <a href="?search=R">R</a>&nbsp;
      <a href="?search=S">S</a>&nbsp;
      <a href="?search=T">T</a>&nbsp;
      <a href="?search=U">U</a>&nbsp;
      <a href="?search=V">V</a>&nbsp;
      <a href="?search=W">W</a>&nbsp;
      <a href="?search=X">X</a>&nbsp;
      <a href="?search=Y">Y</a>&nbsp;
      <a href="?search=Z">Z</a>&nbsp;</div></td></tr></tbody></table>
<?php
//Database info
include_once("db.php");
$search=$_GET['search'];
$search_string = $_GET['search_string'];
$searchstring = $_GET['searchstring'];

if($search_string != "")
{
?>
<br><br><table style="text-align: left; width: 100%; color: Navy" border="0" cellpadding="12" cellspacing="0">
<tbody>

<?php

//connecting to database
mysql_connect($host,$username,$password) or die ("Unable to connect to the database");
@mysql_select_db($database) or die( "Unable to select database");

$search_string = preg_replace('/[\'\"]/', '', $search_string);
$search_string = preg_replace('/\s+/', ' ', $search_string);
$search_string = preg_replace('/^\s+/', '', $search_string);
$search_string = preg_replace('/\s+$/', '', $search_string);
$search_string = mysql_real_escape_string($search_string);

if($_GET['mode'] == 'match_word')
{
	$query="SELECT * FROM eng2te where eng_word REGEXP '\[\[:<:\]\]$search_string' ORDER BY eng_word";
	$query2="SELECT eng_word, meaning FROM suggestions where status = '1' && eng_word REGEXP '\[\[:<:\]\]$search_string' ORDER BY eng_word";
}
else
{
	$query="SELECT * FROM eng2te where meaning REGEXP '\[\[:<:\]\]$search_string\[\[:>:\]\]' ORDER BY eng_word";
	$query2="SELECT eng_word, meaning FROM suggestions where status = '1' && meaning REGEXP '\[\[:<:\]\]$search_string\[\[:>:\]\]' ORDER BY eng_word";
}
$result=mysql_query($query);
$result2=mysql_query($query2);
$num=mysql_num_rows($result);
$num2=mysql_num_rows($result2);

//displaying the result
if($num == 0)
{
?>
<div  style="text-align: center ; font-size:100%; color:Navy">No entries found for this word!<br>నిఘంటువులో ఈ పదం దొరకలేదు !</div>
<?php
}
else
{?>

<tr  ><td   id="ques"  style="vertical-align: top; font-size:100%;">
</td>
<td  id="ques" style="vertical-align: top; font-size:100%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td   id="ques" style="vertical-align: top; font-size:100%;">Meaning Taken From The Standard Dictionary:</
</td>
</tr>



<?php
$i=0;
while ($i < $num) {
$row = mysql_fetch_row($result);
?>
<tr>
<td style="vertical-align: top;"><strong><?php echo "$row[0]"; ?></strong></td>
<td  style="vertical-align: top;">
<?php

$meaning = $row[1].$row[2];

echo "$meaning";
?>
</td><td>
<?php
$srow=preg_split('[\.]',$row[3]);
$snum = count($srow);
$j=0;
for($j=0;$j<$snum-1; $j++)
{
if(strlen($srow[$j])>15)
{
$meaning1 = preg_replace('/('.$search_string.')/i', '<span style="background-color:Aqua">$1</span>', $srow[$j]. ".");
echo $meaning1;

?>
<br>
<?php
}
else
{
$meaning1 = preg_replace('/('.$search_string.')/i', '<span style="background-color:Aqua">$1</span>', $srow[$j]. ".");
echo $meaning1;

}

}
echo "$srow[$j]\n";


?>
</td>
</tr>

<?php
$i++;
}
}
if($num2!=0)
{
?>
<tr  ><td   id="ques"  style="vertical-align: top; font-size:100%;">
</td>
<td  id="ques" style="vertical-align: top; font-size:100%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td   id="ques" style="vertical-align: top; font-size:100%;">Suggestions Given By Users:</td>
</tr>


<?php
$x=0;
while ($x < $num2) {
$row2 = mysql_fetch_row($result2);
?>
<tr>
<td style="vertical-align: top;"><strong><?php echo "$row2[0]"; ?></strong></td>
<td  style="vertical-align: top;"></td>

<td>
<?php
$srow6=preg_split('[\.]',$row2[1]);
$snum6 = count($srow6);

for($p=0;$p<$snum6-1; $p++)
{
if(strlen($srow6[$p])>15)
{
$meaning6 = preg_replace('/('.$search_string.')/i', '<span style="background-color:Aqua">$1</span>', $srow6[$p]. ".");
echo $meaning6;


?>
<br>
<?php
}
else
{
$meaning6 = preg_replace('/('.$search_string.')/i', '<span style="background-color:Aqua">$1</span>', $srow6[$p]. ".");
echo $meaning6;


}

}
echo "$srow6[$p]\n";

?></td>
</tr>
<?php
$x++;
}
}

mysql_close();
?>
</tbody>
</table>

<?php
}
else if ($searchstring != "") {
//connecting to database
mysql_connect($host,$username,$password) or die ("Unable to connect to the database");
@mysql_select_db($database) or die( "Unable to select database");
$subquery ="SELECT * FROM eng2te where eng_word='$searchstring' ORDER BY eng_word";
$subquery2 ="SELECT eng_word, meaning FROM suggestions where status = '1' &&  eng_word='$searchstring' ORDER BY eng_word";

$subresult=mysql_query($subquery);
$subresult2=mysql_query($subquery2);
$subnum=mysql_num_rows($subresult);
$subnum2=mysql_num_rows($subresult2);
?>
<br><br>
<table style="text-align: left; width: 100%; color:Navy" border="0" cellpadding="12" cellspacing="0">
<tbody>
<?php
if($subnum == 0)
{
?>
        <div style="text-align: center ; font-size:100%; color:Navy">No entries found for this word!<br>నిఘంటువులో ఈ పదం దొరకలేదు !</div>
<?php
}
else
{?>

<tr  ><td   id="ques"  style="vertical-align: top; font-size:100%;">
</td>
<td  id="ques">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td   id="ques" style="vertical-align: top; font-size:100%;">Meaning Taken From The Standard Dictionary:
</td>
</tr>


<?php
$j=0;
while ($j < $subnum) {
$subrow = mysql_fetch_row($subresult);
?>
<tr>
<td style="vertical-align: top;"><strong><?php echo "$subrow[0]"; ?></strong></td>
<td  style="vertical-align: top;">
<?php
$submeaning = $subrow[1].$subrow[2];
echo "$submeaning";


?>
</td><td>
<?php
$ssubrow=preg_split('[\.]',$subrow[3]);
$ssubnum = count($ssubrow);
for($t=0;$t<$ssubnum-1; $t++)
{
if(strlen($ssubrow[$t])>15)
{
$submeaning1 = preg_replace('/('.$searchstring.')/i', '<span style="background-color:Aqua">$1</span>', $ssubrow[$t]. ".");
echo $submeaning1;

?>
<br>
<?php
}
else
{
$submeaning1 = preg_replace('/('.$searchstring.')/i', '<span style="background-color:Aqua">$1</span>', $ssubrow[$t]. ".");
echo $submeaning1;

}

}
echo "$ssubrow[$t]\n";
?></td>
</tr>
<?php
$j++;
?>
</td>
</tr>
<?php
}
}
if($subnum2!=0)
{
?>

<tr  ><td   id="ques"  style="vertical-align: top; font-size:100%;">
</td>
<td  id="ques" style="vertical-align: top; font-size:100%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td   id="ques" style="vertical-align: top; font-size:100%;">Suggestions Given By Users:</
</td>
</tr>


<?php
$l=0;
while ($l < $subnum2) {
$subrow2 = mysql_fetch_row($subresult2);
?>
<tr>
<td style="vertical-align: top;"><strong><?php echo "$subrow2[0]"; ?></strong></td>
<td  style="vertical-align: top;">

</td><td>
<?php
$ssubrow1=preg_split('[\.]',$subrow2[1]);
$ssubnum1 = count($ssubrow1);

for($s=0;$s<$ssubnum1-1; $s++)
{
if(strlen($ssubrow1[$s])>15)
{
$submeaning2 = preg_replace('/('.$searchstring.')/i', '<span style="background-color:Aqua">$1</span>', $ssubrow1[$s]. ".");
echo $submeaning2;

?>
<br>
<?php
}
else
{
$submeaning2 = preg_replace('/('.$searchstring.')/i', '<span style="background-color:Aqua">$1</span>', $ssubrow1[$s]. ".");
echo $submeaning2;

}

}
echo "$ssubrow1[$s]\n";
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


mysql_close();
?>
</tbody>
</table>
<?php
}
else if ($search != "") {
//connecting to database
mysql_connect($host,$username,$password) or die ("Unable to connect to the database");
@mysql_select_db($database) or die( "Unable to select database");
?>
<br><br><br><br>
<table style="text-align: left; width: 100%; color:Navy" border="0" cellpadding="2" cellspacing="15">
<tbody>
<?php
$query="SELECT * FROM eng2te WHERE eng_word like '$search%' ";
$result=mysql_query($query);
$num=mysql_num_rows($result);

//displaying the result
if($num == 0)
{
?>
        <div style="text-align: center ; font-size:100%; color:Navy">No entries found for this word!<br>నిఘంటువులో ఈ పదం దొరకలేదు !</div>
<?php
}
else
{
$i=0;
while ($i < $num) {
$row = mysql_fetch_row($result);

if ($i%3 == 0)
{
?>

<tr>
<?php
}
?>
<td style= "font-family:verdana; font-size:80%; color:Navy"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?searchstring=<?php echo urlencode($row[0]); ?>" ><?php echo "$row[0]";?></a>
</td>
<?php
if($i%3 == 2)
{
?>
</tr>
<?php
}
$i++;
}
}
mysql_close();
?>
</tbody>
</table>
<?php
}
?>
</form>
</body>
</html>
