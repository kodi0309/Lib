<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title> Biblioteka </title>
  <link rel="stylesheet" href=" style.css " type="text/css">
</head>
<body>
<div id="mess">
	EDYTUJ UCZNIA
</div>
<div id="tresc">
	<?PHP
	include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM uczniowie WHERE iduczen =".$_GET["id"];
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				while ($wiersz = $result->fetch_assoc())
				{  
				echo "<form method='POST' action='aktualizujucz.php?id=".$wiersz['iduczen']."'>";

				echo "<input type='text' name='uczen' placeholder='uczeń' class='text' value='".$wiersz['uczen']. "'></br></br>";	
				};
				$baza->close();	
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM klasy";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				echo '<select name="idklasa" class="imputs">';
				echo '<option>Wybierz klasę</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idklasa'].'">'.$option['klasa'].'</option>';
					}
					echo '</select></br></br>';
				 $baza->close();	
	echo "<input type='submit' value='Aktualizuj' class='imputs' >";
	echo "</form>";	 
	?>





	</body>
	</html>

			