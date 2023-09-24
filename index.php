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
			<td class="nav"> <a class="link" href="dodawanie.php"> DODAWANIE </a> </td>   
			<td class="nav"> <a class="link" href="autorzy.php"> AUTORZY </a>  </td> 
			</tr> <tr>
			<td class="nav"> <a class="link" href="uczniowie.php"> UCZNIOWIE </a> </td>	
			<td class="nav"> <a class="link" href="klasy.php"> KLASY </a> </td>   
			<td class="nav"> <a class="link" href="wypozyczenia.php"> WYPOŻYCZENIA </a>  </td> 
		</tr> </table>
	</div>


	<div id="tresc">
		<table border="1" bordercolor="#FFFFFF" class="dane" cellpadding="5">
			<tr><td> LP. </td>	<td> TYTUŁ </td>	<td> IMIĘ I NAZWISKO AUTORA </td>	<td> KATEGORIA </td>	<td> EDYTUJ </td></tr>
				<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$zapytanie="SELECT ksiazki.idksiazka, ksiazki.tytul, autorzy.autor, kategorie.kategoria FROM ksiazki, autorzy, kategorie WHERE ksiazki.idautork=autorzy.idautor AND ksiazki.idkategoriak=kategorie.idkategoria ORDER BY tytul ASC";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				$lp=0;
				while ($wiersz = $result->fetch_assoc())
				 	{ 
				 	$lp=$lp+1;
				   	echo "<tr><td>".$lp ."</td><td>". $wiersz['tytul'] ."</td><td>". $wiersz['autor']."</td><td>".$wiersz['kategoria']."</td>";
				   	echo "<td> <a href='edytujks.php?id=".$wiersz['idksiazka']."'>'<img src='images/edit.png'>'</a> </td>";
				   	echo "</tr>\n";
				 	};
				 $baza->close();
				?>
		</table>
		</br></br>
	</div>



	<div id="stopka">
		<h2> Klaudiusz Kozłowski II Lc - strona na informatykę <br/> </h2>
	</div> 
</body>
</html>	