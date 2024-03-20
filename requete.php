<?php
include("connect.php");
$X=$_POST["varrequete"];
$req_res="SELECT * FROM gites WHERE ville NOT like '%$X%'";
			
$resultat=mysqli_query($bd,$req_res) or die("Erreur dans l'exécution de la requête");
echo "<br>";

while($ligne=mysqli_fetch_array($resultat))
	{	
		$nom_region=$ligne["region"];
		$nom_ville=$ligne["ville"];
		$numero_region=$ligne["numero"];



echo "<h4> resultat de la requete: </h4><br>";
		
		echo "Region :<b>$nom_region</b><br>";
		echo "Ville :<b>$nom_ville</b><br>";
		echo "Numero :<b>$numero_region</b><br>";
		
	}

mysqli_close($bd);

?>
