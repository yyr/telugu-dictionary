<?php
include_once("db.php");

if(!$dbconnect = mysql_connect($host,$username,$password))
{
 echo " connection to host is failed";
 exit;
}
if(!mysql_select_db($database))
{
  echo " connection to database is failed" ;
  exit;
}
$table_id = 'eng2te';
$query = "SELECT * FROM $table_id";
$dbresult = mysql_query($query, $dbconnect);
$doc = new DomDocument('1.0', 'utf-8');
$doc->formatOutput = true;
$root = $doc->createElement("Dictionary");
$root = $doc->appendChild($root);
while($row = mysql_fetch_assoc($dbresult))
{
$occ = $doc->createElement("Entry");
$occ = $root->appendChild($occ);
 foreach($row as $fieldname => $fieldvalue)
   {
      $child = $doc->createElement($fieldname);
      $child = $occ->appendChild($child);
      $value = $doc->createTextNode($fieldvalue);
      $value = $child->appendChild($value);
   }
  
}
$xml_string= $doc->saveXML();
echo $xml_string;
?>
