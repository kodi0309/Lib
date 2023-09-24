<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="refresh" content="1;URL='http://localhost/biblioteka/klasy.php'" />    
  <link rel="stylesheet" href="style.css.css" type="text/css">
</head>
<body>

<?PHP
include 'db_conf.php';
$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
$id=$_GET["id"];
$k=$_POST['klasa'];
$zapytanie = "UPDATE klasy SET klasa = '".$k."' WHERE klasy.idklasa =".$id;

$result = $baza->query($zapytanie) or die ('bledne zapytanie');
$baza->close();
?>
<div id="operacja">
	ZAKTUALIZOWANO KLASĘ!
</div>
</body>
</html>