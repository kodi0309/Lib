<!DOCTYPE html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="refresh" content="1;URL='http://localhost/biblioteka/wypozyczenia.php'" />    
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<?PHP
include 'db_conf.php';
$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
$id=$_GET["id"];
$k=$_POST['idksiazka'];
$u=$_POST["iduczen"];
$s=$_POST['status'];
$d=$_POST['data'];
$zapytanie = "UPDATE wypozyczenia SET idksiazkaw = '".$k."', iduczenw = '".$u."', status = '".$s."', data = '".$d."' WHERE wypozyczenia.idwypozyczenie =".$id;

$result = $baza->query($zapytanie) or die ('bledne zapytanie');
$baza->close();
?>
<div id="operacja">
	ZAKTUALIZOWANO WYPOŻYCZENIE!
</div>
</body>
</html>