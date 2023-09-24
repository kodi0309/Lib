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
$u=$_POST['iduczen'];
$k=$_POST['idksiazka'];
$s=$_POST['status'];
$d=$_POST['data'];
$zapytanie = "INSERT INTO `wypozyczenia` (`idwypozyczenie`, `idksiazkaw`, `iduczenw`, `data`, `status`) VALUES (NULL, '".$k."', '".$u."', '".$d."', '".$s."')";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');
$baza->close();
?>
<div id="operacja">
	DODANO WYPOŻYCZENIE!
</div>

</body>
</html>