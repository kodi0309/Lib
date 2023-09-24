<!DOCTYPE html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="refresh" content="1;URL='http://localhost/biblioteka'" />    
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<?PHP
include 'db_conf.php';
$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
$id=$_GET["id"];
$t=$_POST['tytul'];
$a=$_POST["idautor"];
$k=$_POST['idkategoria'];
$zapytanie = "UPDATE ksiazki SET tytul = '".$t."', idautork = '".$a."', idkategoriak = '".$k."' WHERE ksiazki.idksiazka =".$id;

$result = $baza->query($zapytanie) or die ('bledne zapytanie');
$baza->close();
?>

<div id="operacja">
	ZAKTUALIZOWANO KSIĄŻKĘ!
</div>

</body>
</html>