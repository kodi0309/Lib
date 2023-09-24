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
			<td class="nav"> <a class="link" href="index.php"> KSIĄŻKI </a>  </td> 
			</tr> <tr> 
			<td class="nav"> <a class="link" href="uczniowie.php"> UCZNIOWIE </a> </td>	
			<td class="nav"> <a class="link" href="klasy.php"> KLASY </a> </td>   
			<td class="nav"> <a class="link" href="wypozyczenia.php"> WYPOŻYCZENIA </a>  </td> 
		</tr> </table>
	</div>

	<div id="tresc">	
		<table border="1" bordercolor="#FFFFFF" class="dane" cellpadding="5">
			<tr><td> LP. </td>	<td> AUTOR </td>	<td> EDYTUJ </td></tr>

				<?PHP
				include 'db_conf.php';
				$baza = mysqli_connect($db_server,$db_user, $db_pass, $db_name) or die ('error'); 
				$zapytanie="SELECT autorzy.idautor, autorzy.autor FROM  autorzy ORDER BY autor ASC";
				$result = $baza->query($zapytanie) or die ('bledne zapytanie');
				$lp=0;
				while ($wiersz = $result->fetch_assoc())
				 	{ 
				 	$lp=$lp+1;
				   	echo "<tr><td>".$lp ."</td><td>". $wiersz['autor']."</td>";
				   	echo "<td> <a href='edytujaut.php?id=".$wiersz['idautor']."'>'<img src='images/edit.png'>'</a> </td>";
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