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
?>
<html>
<head>
<title>Steps To Be Followed</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"><!--
#ques {
                        background:SteelBlue ;
                        color: Navy;
                        font-family:sans;
                        font-weight: bold;
                        font-size : 14;
                        padding: 2px;
                }

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
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="2" rowspan="1" style="text-align: center;"><img style="width: 138px; height: 132px;" alt="Swecha Dictionary" src="logo_dictionary14.png"><div><a id="dict" href="http://ltrc.iiit.net/onlineServices/Dictionaries/Eng-Tel-DictDwnld.html">Charles Philip Brown English-Telugu Dictionary</a></div>
</td>
</tr>
<tr></tr></tbody></table>
<table style="width:100%; text align: left; margin-left: auto; margin-right:auto;" border="0" cellpadding="10" cell spacing="2">
<tbody>
<tr>
<td  id="ques" style="text-align: left; font-size:100%; color:Navy">Steps To Be Followed Before Reviewing The Page:</td></tr>
<tr><td style="text-align: left; font-size:90%; color:Navy">
<ul>
   <li>Select a word from the listbox and click on Submit.</li><br>
    <li>As soon as u click on Submit, It displays the meanings or suggestions (which has to be reviewed) given by the user for the corresponding english word with "ADD" and "REMOVE" buttons at the bottom.</li><br>
    <li>If the meaning for the corresponding english word is present in the Standard Dictionary or in the User Suggestions, it displays the meaning as soon as you click on Submit. This helps in avoiding the duplicate copy while reviewing.</li><br>
    <li>If the meaning (which has to be reviewed) given by the user is already present or if the user gives an invalid meaning, then check the checkbox of the corresponding meaning and click on "REMOVE" button.</li><br>
     <li>If User gives a valid meaning for corresponding english word, then check the checkbox of the corresponding meaning and click on "ADD" button.</li></ul>
 </td></tr>
<tr><td  colspan="2" rowspan="1" style="text-align: center;"><a href="review.php">Next</a></td></tr>
</tbody>
</table>
</body></html>
<?php
}
else
{
header("Location:sess.php ");
}
?>
