<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title> Biblioteka </title>
  <link rel="stylesheet" href=" style.css " type="text/css">
</head>
<body>

<div id="info">
	<table border="1" bordercolor="#FFFFFF" class="dane" cellpadding="5">
			<tr><td> LP. </td>	<td> TYTUŁ </td>	<td> UCZEŃ </td>	<td> DATA </td>		<td> STATUS </td>		 </tr>

				<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$zapytanie="SELECT wypozyczenia.iduczenw, wypozyczenia.idksiazkaw, wypozyczenia.idwypozyczenie, ksiazki.tytul, uczniowie.uczen, wypozyczenia.data, wypozyczenia.status FROM ksiazki, uczniowie, wypozyczenia WHERE ksiazki.idksiazka=wypozyczenia.idksiazkaw AND uczniowie.iduczen=wypozyczenia.iduczenw AND idwypozyczenie =".$_GET["id"];
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				$lp=0;
				while ($wiersz = $result->fetch_assoc())
				 	{ 
				 	$lp=$lp+1;
				   	echo "<tr><td>".$lp ."</td><td>". $wiersz['tytul'] ."</td><td>". $wiersz['uczen']."</td><td>".$wiersz['data']."</td><td>". $wiersz['status']."</td>";
				   
				   	echo "</tr>\n";
				 	};
				 $baza->close();
				?>
		</table>
</div>

<div id="mess">
	EDYTUJ WYPOŻYCZENIE
</div>
<div id="tresc">


			<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM wypozyczenia WHERE idwypozyczenie =".$_GET["id"];
				$result = $baza->query($zapytanie) or die ('bledne zapytanie1');
				while ($wiersz = $result->fetch_assoc())
				{  
				echo "<form method='POST' action='aktualizujwyp.php?id=".$wiersz['idwypozyczenie']."'>";

				};
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT ksiazki.idksiazka, ksiazki.tytul FROM ksiazki";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie2');
				echo '<select class="imputs" name="idksiazka">';
				echo '<option>Wybierz książkę</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idksiazka'].'">'.$option['tytul'].'</option>';
					}
					echo '</select></br></br>';
				 $baza->close();	
			

	
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM uczniowie";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie3');
				echo '<select class="imputs" name="iduczen">';
				echo '<option>Wybierz ucznia</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['iduczen'].'">'.$option['uczen'].'</option>';
					}
					echo '</select></br></br>';
				 $baza->close();	
				 ?>
				<input type="date" name="data" class="term"></br> </br>

				<select name="status" class="imputs">
				<option> wypożyczona </option>
				<option> oddana </option>
				</select></br> </br>
			
			
			
			
			<input type="submit" name="aktualizuj" class="imputs" value="Aktualizuj"> 
	</form></br>


			


</div>

	</body>
	</html>