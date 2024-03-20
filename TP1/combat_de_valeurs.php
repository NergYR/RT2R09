<!DOCTYPE html>
<html>
<head>
    <title>Combat de Valeurs</title>
</head>
<body>

<h2>Combat de Valeurs</h2>

<form action="combat_de_valeurs.php" method="post">
    <label for="nombre1">Nombre 1:</label>
    <input type="number" id="nombre1" name="nombre1"><br><br>
    <label for="nombre2">Nombre 2:</label>
    <input type="number" id="nombre2" name="nombre2"><br><br>
    <input type="submit" value="Comparer">
</form>

<?php
// Vérifie si les données du formulaire sont soumises
    $nombre1 = $_POST["nombre1"];
    $nombre2 = $_POST["nombre2"];
    
    //echo "Nombre";
    
    function afficheRelation ($Nbre1, $Nbre2) {
        # si les deux nombres sont égaux 
        if ($Nbre1 == $Nbre2) {
            echo("Les nombres $Nbre1 et $Nbre2 sont égaux.");
        }
        # si le 1er nobmbre est plus grand que le 2e
        elseif ($Nbre1 < $Nbre2) {
            echo("$Nbre1 est inférieur à $Nbre2"); 
        }
        # si le 1er nombre est plus petit que le 2e
        elseif ($Nbre1 > $Nbre2) {
            echo("$Nbre1 est supérieur à $Nbre2"); 
        }
        }
        
    
    // Appelle la fonction afficheRelation avec les valeurs soumises
    afficheRelation($nombre1, $nombre2);
?>

</body>
</html>