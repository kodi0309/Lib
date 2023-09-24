<!DOCTYPE html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="refresh" content="1;URL='http://localhost/biblioteka/uczniowie.php'" />    
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<?PHP
include 'db_conf.php';
$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
$k=$_POST['idklasa'];
$u=$_POST['uczen'];
$zapytanie = "INSERT INTO `uczniowie` (`iduczen`, `uczen`, `idklasau`) VALUES (NULL, '".$u."','".$k."')";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');
$baza->close();
?>

<div id="operacja">
	DODANO UCZNIA!
</div>

</body>
</html>