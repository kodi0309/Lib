<!DOCTYPE html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="refresh" content="1;URL='http://localhost/biblioteka/kategorie.php'" />    
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<?PHP
include 'db_conf.php';
$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
$k=$_POST['kategoria'];
$zapytanie = "INSERT INTO `kategorie` (`idkategoria`, `kategoria`) VALUES (NULL, '".$k."')";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');
$baza->close();
?>
<div id="operacja">
	DODANO KATEGORIĘ!
</div>
</body>
</html>