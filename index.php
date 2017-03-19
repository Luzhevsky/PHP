<html>
<head>
<title>Лабораторная работа №2</title>
</head>
<body>
<ul>
<?php
$server = "localhost";
$username = "mysql";
$password = "mysql";
$db_name = "Library";
$connect =  mysqli_connect("localhost","mysql","mysql","Library");
mysqli_select_db($connect,"Library");

$result = mysqli_query($connect,'SELECT Name_book FROM Books');

echo "<B>Добавить: </B>";
echo "<ul type='disc'>";
	while($row = mysqli_fetch_array($result))
	{
		
		echo '<li>';
		//echo "Name_book: ".$row['Name_book']."<br>\n";
		
		echo '<a href = "upload.php?Name_book='.$row[0].'">';
		
		echo $row[Name_book];
		echo '</a>';
		echo '</li>';
	}
echo "</ul>";
echo "<B>Добавить: </B>";
echo "<ul>";
	while($row = mysqli_fetch_array($result))
	{
		
		echo '<li>';
		//echo "Name_book: ".$row['Name_book']."<br>\n";
		
		echo '<a href = "upload.php?Name_book='.$row[0].'">';
		
		echo $row[Name_book];
		echo '</a>';
		echo '</li>';
	}
echo "</ul>";
?>

<body>
</html>