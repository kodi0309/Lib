<!DOCTYPE html>

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
			<td class="nav"> <a class="link" href="index.php"> KSIĄŻKI </a> </td>	
			<td class="nav"> <a class="link" href="klasy.php"> KLASY </a> </td>   
			<td class="nav"> <a class="link" href="wypozyczenia.php"> WYPOŻYCZENIA </a>  </td> 
		</tr> </table>
	</div>

	<div id="tresc">	
		<table border="1" bordercolor="#FFFFFF" class="dane" cellpadding="5">
			<tr><td> LP. </td>	<td> UCZEŃ </td>	<td> KLASA </td>	<td> EDYTUJ </td></tr>

				<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$zapytanie="SELECT uczniowie.iduczen, uczniowie.uczen, klasy.klasa FROM klasy, uczniowie WHERE uczniowie.idklasau=klasy.idklasa ORDER BY klasa ASC";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				$lp=0;
				while ($wiersz = $result->fetch_assoc())
				 	{ 
				 	$lp=$lp+1;
				   	echo "<tr><td>".$lp ."</td><td>". $wiersz['uczen'] ."</td><td>". $wiersz['klasa']."</td>";
				   	echo "<td> <a href='edytujucz.php?id=".$wiersz['iduczen']."'>'<img src='images/edit.png'>'</a> </td>";
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