<!DOCTYPE html> 
<html>


<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title> Biblioteka </title>
  <link rel="stylesheet" href=" style.css " type="text/css">
</head>

<body>	


	<div id="baner">
		<h1> BIBLIOTEKA </h1>
	</div>

	<div id="menu"> 
		<table class="navtab">	<tr>    
			<td class="nav"> <a class="link" href="kategorie.php"> KATEGORIE </a> </td>	
			<td class="nav"> <a class="link" href="index.php"> KSIĄŻKI </a> </td>   
			<td class="nav"> <a class="link" href="autorzy.php"> AUTORZY </a>  </td> 
			</tr> <tr> 
			<td class="nav"> <a class="link" href="uczniowie.php"> UCZNIOWIE </a> </td>	
			<td class="nav"> <a class="link" href="klasy.php"> KLASY </a> </td>   
			<td class="nav"> <a class="link" href="wypozyczenia.php"> WYPOŻYCZENIA </a>  </td> 
		</tr> </table>
	</div>

	<div id="for">	

		<hr>
		<h3>
		<div class="box"> 
		Dodawanie wypożyczenia
		</h3>
		<form method="POST" action="dodajwyp.php">

			<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM uczniowie";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');

				echo '<select name="iduczen" class="inputs" >';
				echo '<option>Wybierz ucznia</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['iduczen'].'">'.$option['uczen'].'</option>';
					}
					echo '</select>';

				 $baza->close();	
			?>
				</br> </br>
			<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM ksiazki";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				echo '<select name="idksiazka" class="inputs">';
				echo '<option>Wybierz książkę</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idksiazka'].'">'.$option['tytul'].'</option>';
					}
					echo '</select>';
				 $baza->close();	
			?>
			
			</br> </br>
			<input type="date" name="data" class="data"></br> </br>
			<select name="status" class="inputs">
				<option> wypożyczona </option>
				<option> oddana </option>
			</select>
				</br> </br>
			<input type="submit" name="dodaj" value="Dodaj" class="inputs" class="prawo">  <br /> <br />
	</form>

		<hr>
		<h3>
		Dodawanie książki
		</h3>
		<form method="POST" action="dodajks.php">
			<input type="text" name="tytul" placeholder="tytuł" class="txt"> </br>
			</br>
			<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM kategorie";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');

				echo '<select name="idkategoria" class="inputs">';
				echo '<option>Wybierz kategorię</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idkategoria'].'">'.$option['kategoria'].'</option>';
					}
					echo '</select>';

				 $baza->close();	
			?>
			<br /> <br />
			<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM autorzy";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				echo '<select name="idautor" class="inputs">';
				echo '<option>Wybierz autora</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idautor'].'">'.$option['autor'].'</option>';
					}
					echo '</select>';
				 $baza->close();	
			?></br>
			</br>
			
			
			<input type="submit" name="Dodaj" value="dodaj" class="inputs">  
	</form></br>

		<hr>
		<h3>
		Dodawanie kategorii
		</h3>
		<form method="POST" action="dodajkat.php">
			<input  type="text" name="kategoria" placeholder="kategoria" class="txt"> </br></br>
			<input  type="submit" name="dodaj" value="Dodaj" class="inputs"> 
	</form></br>

		<hr>
		<h3>
		Dodawanie autora
		</h3>
		<form method="POST" action="dodajaut.php">
			<input type="text" name="autor" placeholder="autor" class="txt"></br></br>
			<input type="submit" name="dodaj" value="Dodaj" class="inputs">  
	</form></br>

		<hr>
		<h3>
		Dodawanie klasy
		</h3>
		<form method="POST" action="dodajkl.php">
			<input type="text" name="klasa" placeholder="klasa" class="txt"></br></br>
			<input type="submit" name="dodaj" value="Dodaj" class="inputs"> 
	</form></br>

		<hr>
		<h3>
		Dodawanie ucznia
		</h3>
		<form method="POST" action="dodajucz.php">
			<input type="text" name="uczen" placeholder="uczeń" class="txt"></br></br>
			<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$link = mysqli_select_db($baza, $db_name) or die( "Unable to select database");
				$zapytanie="SELECT * FROM klasy";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				echo '<select name="idklasa" class="inputs">';
				echo '<option>Wybierz klasę</option>';
				while($option = $result->fetch_assoc()) 
					{
					echo '<option value="'.$option['idklasa'].'">'.$option['klasa'].'</option>';
					}
					echo '</select>';
				 $baza->close();	
			?></br></br>
			<input type="submit" name="dodaj" value="Dodaj" class="inputs"> </br></br></br></br>
		</div>
	</form></br>

			</br></br>
	</div>


	<div id="stopka">
		<h2> Klaudiusz Kozłowski II Lc - strona na informatykę <br/> </h2>
	</div> 


</body>
</html>