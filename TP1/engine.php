<?php

// Récupération des variables
$id = $_POST["id"];
$name = $_POST["nom"];
$prenom = $_POST["prenom"];
$status = $_POST["status"];
$date = $_POST["date_de_naissance"];




//Verification des champs

if (empty($id) || empty($name) || empty($prenom) || empty($status) || empty($date)){
    echo "Veuillez remplir tous les champs";
    exit();
}





//connexion à la base de donnée
$success = mysqli_connect("localhost", "root", "");
if ($success){
    echo "Success". "<br>";
}else{
    echo "Failed";
}

// Choix de la base de donnée
$x = mysqli_select_db($success, "famille");

// Insertion dans la table membre des valeurs
if ($x){
    $request = "INSERT INTO membre (id, nom, prenom, status, date_de_naissance) VALUES ('$id', '$name', '$prenom', '$status', '$date')";
    $result = mysqli_query($success, $request);


    
    $request = "SELECT * FROM membre";
    $result = mysqli_query($success, $request);

    while ($row = mysqli_fetch_assoc($result)){
        echo "id: " . $row["id"]. "</br>";
        echo "nom: " . $row["nom"]. "</br>";
        echo "prenom: " . $row["prenom"]. "</br>";
        echo "status: " . $row["status"]. "</br>";
        echo "date: " . $row["date_de_naissance"]. "</br>";
    }

}else{
    echo "base Not Found 404";
}

// Affichage de la table

    

// Déconnexion de la base.
mysqli_close($success);

?>