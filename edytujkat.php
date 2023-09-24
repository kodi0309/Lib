<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title> Biblioteka </title>
  <link rel="stylesheet" href=" style.css " type="text/css">
</head>
<body>
<div id="mess">
	EDYTUJ KATEGORIĘ
</div>
<div id="tresc">

<?PHP
include 'db_conf.php';

$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 

$zapytanie="SELECT * FROM kategorie WHERE idkategoria =".$_GET["id"];

$result = $baza->query($zapytanie) or die ('bledne zapytanie');

while ($wiersz = $result->fetch_assoc())
 {  

echo "<form method='POST' action='aktualizujkat.php?id=".$wiersz['idkategoria']."'>";

echo "<input type='text' name='kategoria' placeholder='kategoria' class='text' value='".$wiersz['kategoria']. "'></br></br>";
echo "<input type='submit' class='imputs' value='Aktualizuj'>";
echo "</form>";

 };


 $baza->close();
?>








</div>

</body>
</html>
