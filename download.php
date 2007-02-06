<?php
include_once("db.php");
mysql_connect($host,$username,$password) or die ("Unable to connect to the database");
@mysql_select_db($database) or die( "Unable to select database");
$search=$_GET['search'];
if($search == "download")
{
$query="SELECT * FROM eng2te ";
$result=mysql_query($query);
$num=mysql_num_rows($result);

header("Content-type: text/plain; charset:utf-8");
header('Content-Disposition: attachment; filename="swecha.txt"');
$i=0;
while ($i < $num) {
$row = mysql_fetch_row($result);
echo "$row[0] , $row[1] . $row[2] . $row[3] \n";
$i++;
}

exit;
}
if($search !="download" && $search !="")
{
$query="SELECT * FROM eng2te WHERE eng_word like '$search%' ";
$result=mysql_query($query);
$num=mysql_num_rows($result);
header("Content-type: text/plain; charset:utf-8");
header("Content-Disposition: attachment; filename=$search.txt ");
$i=0;
while ($i < $num) {
$row = mysql_fetch_row($result);
echo "$row[0] , $row[1] . $row[2] . $row[3] \n";
$i++;
}
exit;
}
?>
<html>
<title>English To Telugu Dictionary Downloads</title>
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
<form>
<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="1" rowspan="2" style="text-align: center;"><img style="width: 138px; height: 132px;" alt="Swecha Dictionary" src="logo_dictionary14.png"><div><a id="dict" href="http://ltrc.iiit.net/onlineServices/Dictionaries/Eng-Tel-DictDwnld.html">Charles Philip Brown English-Telugu Dictionary</a></div>
</td>
</tr>
<tr></tr>
<tr><td width=80%>
<table width=100% border=0  align=center>
	<tr>
	 <td style="text-align: center; font-size:100%; color:Navy" height=35 width=100%><b> Downloads </b></td></tr>
	<tr>

	 <td  style="text-align: center; font-size:100%; color:Navy" height=30 width=100%>To download the entire English to Telugu 
		Dictionary </td>
	</tr>
  <tr> 
	 <td align=center><font size=4><b>
		<a href="?search=download">
		Click here </a></b></font></td></tr>
<tr>
	 <td  style="text-align: center; font-size:100%; color:Navy" height=35> To download parts of the dictionary in 
		alphabetical order click on the desired alphabet.</td></tr>
<tr>
	 <td align=center >
	 	<table border=0 width=100%>
		<tr>
		 <td align=center width=35><b> 
      <a href="?search=A">A</a>&nbsp;
     </b> </td>
		 <td align=center width=35> <b> 
     <a href="?search=B">B</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=C">C</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=D">D</a>&nbsp;
</b></td></tr>
<tr>
<td align=center width=35><b> 
      <a href="?search=E">E</a>&nbsp;
</b></td>
		 <td align=center width=35> <b>
      <a href="?search=F">F</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=G">G</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=H">H</a>&nbsp;
</b></td></tr>
		
		<tr>

		 <td align=center width=35><b>
      <a href="?search=I">I</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=J">J</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>

      <a href="?search=K">K</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=L">L</a>&nbsp;
</b></td></tr>
		
		<tr>
		 <td align=center width=35><b>
      <a href="?search=M">M</a>&nbsp;
</b> </td>

		 <td align=center width=35> <b>
      <a href="?search=N">N</a>&nbsp;
</b> </td>

		 <td align=center width=35> <b>
      <a href="?search=O">O</a>&nbsp;
</b> </td>

		 <td align=center width=35> <b>
      <a href="?search=P">P</a>&nbsp;
</b></td></tr>
<tr>
		 <td align=center width=35><b>
      <a href="?search=Q">Q</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=R">R</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=S">S</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=T">T</a>&nbsp;
</b></td></tr>
<tr>

		 <td align=center width=35><b>
      <a href="?search=U">U</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=V">V</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
       <a href="?search=W">W</a>&nbsp;
</b> </td>
		 <td align=center width=35> <b>
      <a href="?search=X">X</a>&nbsp;
</b></td></tr>
		
		<tr>
		 <td> </td>
		 <td align=center width=35> <b>
      <a href="?search=Y">Y</a>&nbsp;
</b></td>
		 <td align=center width=35><b> 
      <a href="?search=Z">Z</a>&nbsp;       
</td>
		 <TD align=center> </td></tr>
	</table>
	</td></tr>
<tr><td height=40 align=center>
		<a href="abbr.html" target="_top"><b>Abbreviations used in the Dictonary</b></a></td></tr>
	</table>

	</form>
	</td>
	</tr>
	</table>
</form>
</body>
</html>
