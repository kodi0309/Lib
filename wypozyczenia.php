<!DOCTYPE html>

<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title> Biblioteka </title>
  <link rel="stylesheet" href="style.css " type="text/css">
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
			<td class="nav"> <a class="link" href="index.php"> KSIĄŻKI </a>  </td> 
		</tr> </table>
	</div>
	
	<div id="szukaj" border="1">
		

		<form method="POST" action="szukajks.php">
			<input  type="text" name="tytul" placeholder="tytuł" class="szukaj"> 
			<button name="znajdz" class="przycisk"> <img src="images/lupa.png"> </button>
	</form></br> 
	
		<form method="POST" action="szukajucz.php">
			<input  type="text" name="uczen" placeholder="uczeń" class="szukaj"> 
			<button name="znajdz" class="przycisk"> <img src="images/lupa.png">  </button>
	</form></br>
	
	</div>

	<div id="tresc">	

		<table border="1" bordercolor="#FFFFFF" class="dane" cellpadding="5">
			<tr><td> LP. </td>	<td> TYTUŁ </td>	<td> UCZEŃ </td>	<td> DATA </td>		<td> STATUS </td>		<td> EDYTUJ </td>  <td> USUŃ </td> </tr>

				<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$zapytanie="SELECT wypozyczenia.iduczenw, wypozyczenia.idksiazkaw, wypozyczenia.idwypozyczenie, ksiazki.tytul, uczniowie.uczen, wypozyczenia.data, wypozyczenia.status FROM ksiazki, uczniowie, wypozyczenia WHERE ksiazki.idksiazka=wypozyczenia.idksiazkaw AND uczniowie.iduczen=wypozyczenia.iduczenw AND status LIKE 'wypożyczona' ORDER BY data DESC";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				$lp=0;
				while ($wiersz = $result->fetch_assoc())
				 	{ 
				 	$lp=$lp+1;
				   	echo "<tr><td>".$lp ."</td><td>". $wiersz['tytul'] ."</td><td>". $wiersz['uczen']."</td><td>".$wiersz['data']."</td><td>". $wiersz['status']."</td>";
				   	echo "<td> <a href='edytujwyp.php?id=".$wiersz['idwypozyczenie']."'>'<img src='images/edit.png'>'</a> </td>";
				   	echo "<td> <a href='usun.php?id=".$wiersz['idwypozyczenie']."'>'<img src='images/delete.png'>'</a> </td>";
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