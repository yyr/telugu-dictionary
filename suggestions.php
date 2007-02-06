<?php
include_once("db.php");
mysql_connect($host,$username,$password) or die ("Unable to connect to the database");
@mysql_select_db($database) or die( "Unable to select database");
?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Suggestions</title>
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
<?php

$eng_word=$_POST['eng_word'];
$meaning=$_POST['meaning'];
if(!isset($_POST['submit'])|| $meaning=="" || $eng_word=="")
{
?>
<form action="" method="post"><br><br>
<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="2" rowspan="1" style="text-align: center;"><img style="width: 138px; height: 132px;" alt="Swecha Dictionary" src="logo_dictionary14.png"><div><a id="dict" href="http://ltrc.iiit.net/onlineServices/Dictionaries/Eng-Tel-DictDwnld.html">Charles Philip Brown English-Telugu Dictionary</a></div>
</td>
</tr>
<tr></tr>
<tr>
<td  id="ques" style="text-align: left; font-size:100%; color:Navy">Your Suggestion:</td></tr>
</tbody></table>
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr><td style="text-align: left; font-size:100%; color:Navy"><br><b>English Word:&nbsp; </b><input name="eng_word"maxlength="100">

</td></tr>
<tr>
<td colspan="2" rowspan="1" style="text-align: left; font-size:100%; color:Navy"><b>Meaning: </b></td></tr>
<tr><td colspan="2" rowspan="1" >
<textarea  name="meaning" rows="5" cols= "90"></textarea></td></tr>
<tr><td colspan="2" rowspan="1" style="text-align: center;" style="text-align: center; vertical-align: top;" colspan="2" rowspan="1"><input type="submit" name="submit" value="Submit"></td></tr></tbody></table>
</form>
<table style="width:100%; text align: left; margin-left: auto; margin-right:auto;" border="0" cellpadding="10" cell spacing="2">
<tbody>
<tr>
<td  id="ques" style="text-align: left; font-size:100%; color:Navy">How do i give my suggestion?</td></tr><tr><td style="text-align: left; font-size:90%; color:Navy">&nbsp;&nbsp;You can submit your suggestion in this page.You can contribute:
<ul>
    <li>
     <p  style="text-align: left; font-size:90%; color:Navy"> A new english word with its meaning.</li>
     <li>
      <p  style="text-align: left; font-size:90%; color:Navy">Add a new  meaning to an existing word.</li>
      <li>
      <p  style="text-align: left; font-size:90%; color:Navy">Suggest a spelling correction to an existing word.</li>
</ul>
<p> &nbsp;&nbsp; Just enter the english word and its meaning in the corresponding fields and click on submit button.<p>&nbsp;&nbsp; After submission, your suggestion will be under process.This suggestion along with the suggestions of all the other users will be <i>validated</i> by our team and the one which is valid will be taken into consideration.</p>
<p>You can type your suggestion in telugu by using <a href="http://www.swecha.org/input/">RTS</a> keyboard.This is like typing your language in English and let the program replace with right characters of the intended language.<br> <br /><i>For Ex:</i> say you want to type a name like <b>Ramakrishna</b>. With Phonetic layout, you will type as "<b>rAmakrishnA</b>". Note the small letters and Caps letter combinations. This is to differentiate the different Phonetic sounds.<p>
</td></tr></tbody></table>

<?php
}
else
{
mysql_query("INSERT INTO `suggestions`(eng_word, meaning)VALUES('$eng_word','$meaning')");
?>
<br><br><br><br><br><br><br><br><br>
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="2" rowspan="1" style="text-align: center;font-size:100%; color:Navy"><b>
<?php
echo "Your suggestion has been successfully added";
?>
</b></td></tr>
<tr>
<td colspan="2" rowspan="1" style="text-align: center;font-size:100%; color:Navy">
<br><br><a href="index.php">Home</a>&nbsp; &nbsp;
</tbody></table>
<?php
}
?>

</body>
</html>
