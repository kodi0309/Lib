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
			<td class="nav"> <a class="link" href="index.php"> KSIĄŻKI </a>  </td> 
		</tr> </table>
	</div>


<div id="tresc">	

		<table border="1" bordercolor="#FFFFFF" class="dane" cellpadding="5">
			<tr><td> LP. </td>	<td> TYTUŁ </td>	<td> UCZEŃ </td>	<td> DATA </td>		<td> STATUS </td>		<td> EDYTUJ </td>  <td> USUŃ </td> </tr>

				<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$u=$_POST['uczen'];
				$zapytanie="SELECT wypozyczenia.iduczenw, wypozyczenia.idksiazkaw, wypozyczenia.idwypozyczenie, ksiazki.tytul, uczniowie.uczen, wypozyczenia.data, wypozyczenia.status FROM ksiazki, uczniowie, wypozyczenia WHERE ksiazki.idksiazka=wypozyczenia.idksiazkaw AND uczniowie.iduczen=wypozyczenia.iduczenw AND uczen LIKE '%".$u."%'ORDER BY data DESC";
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
	</div>
</body>
</html>