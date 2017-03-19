<?php
$server = "localhost";
$username = "mysql";
$password = "mysql";
$db_name = "Library";
$connect =  mysqli_connect("localhost","mysql","mysql","$db_name");
mysqli_select_db($connect,$db_name);
$strSQL = "SELECT * FROM Books";
$rs = mysql_query($strSQL)
while ($row = mysql_fetch_array($rs))
{
	echo $row['Name_Book'] . "<br \>";
	
}

?>