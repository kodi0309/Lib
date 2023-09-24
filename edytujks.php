<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title> Biblioteka </title>
  <link rel="stylesheet" href=" style.css " type="text/css">
</head>
<body>
<div id="mess">
	EDYTUJ KSIĄŻKĘ
</div>
<div id="tresc">


			<?PHP
	include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM ksiazki WHERE idksiazka =".$_GET["id"];
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				while ($wiersz = $result->fetch_assoc())
				{  
				echo "<form method='POST' action='aktualizujks.php?id=".$wiersz['idksiazka']."'>";

				echo "<input type='text' name='tytul' placeholder='tytuł' class='text' value='".$wiersz['tytul']. "'></br></br>";	
				};
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM kategorie";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				echo '<select class="imputs" name="idkategoria">';
				echo '<option>Wybierz kategorię</option>';
			
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idkategoria'].'">'.$option['kategoria'].'</option>';
					}
					echo '</select></br></br>';
				 $baza->close();	
			

	
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM autorzy";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				echo '<select class="imputs" name="idautor">';
				echo '<option>Wybierz autora</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idautor'].'">'.$option['autor'].'</option>';
					}
					echo '</select></br></br>';
				 $baza->close();	
			
			
			?>
			
			<input type="submit" name="aktualizuj" class="imputs" value="Aktualizuj"> 
	</form></br>

</div>

	</body>
	</html>