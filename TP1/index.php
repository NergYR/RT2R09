<?php
// Connexion a la base
$success = mysqli_connect("localhost", "root", "");
if ($success){
    echo "Success". "<br>";
}else{
    echo "Failed";
}

$x = mysqli_select_db($success, "famille");

if ($x){
    $request = "SELECT id, nom, prenom, status, date_format(date_de_naissance, '%d/%m/%Y') as date2 FROM membre ";
    $result = mysqli_query($success, $request);

    while ($row = mysqli_fetch_assoc($result)){
       // echo "id: " . $row["id"]. "</br>";
       // echo "nom: " . $row["nom"]. "</br>";
        echo "prenom: " . $row["prenom"]. "</br>";
       // echo "status: " . $row["status"]. "</br>";
       echo "date: " . $row["date2"]. "</br>";
    }

    echo "Second Way" . "</br>";
    $request = "SELECT * FROM membre ";
    $result = mysqli_query($success, $request);

    while ($row = mysqli_fetch_assoc($result)){
       // echo "id: " . $row["id"]. "</br>";
       // echo "nom: " . $row["nom"]. "</br>";
        echo "prenom: " . $row["prenom"]. "</br>";
       // echo "status: " . $row["status"]. "</br>";
       //echo "date: " . $row["date_de_naissance"]. "</br>";
       $a = substr($row["date_de_naissance"], 0, 4);
       $m = substr($row["date_de_naissance"], 5, 2);
       $j = substr($row["date_de_naissance"], 8, 2);
       echo "date: " . $j . "/" . $m . "/" . $a . "</br>";
    }

}else{
    echo "base Not Found 404";
}

mysqli_close($success);



?>


