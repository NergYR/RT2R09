<?php
// On démarre la session
session_start();
$loginOK = false;


$conn = mysqli_connect("localhost", "root", "");
if ($conn){
    echo "Success". "<br>";
}else{
    echo "Failed";
}

$db = mysqli_select_db($conn, "famille");
// On n'effectue les traitement qu'à la condition que 
// les informations aient été effectivement postées
if ( isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['password'])) ) {

  extract($_POST);  // je vous renvoie à la doc de cette fonction

  // On va chercher le mot de passe afférent à ce login
  $sql = "SELECT pseudo, age, sexe, ville, mdp FROM users WHERE login = '".addslashes($login)."'";
  $req = mysqli_query($conn, $sql) or die('Erreur SQL : <br />'.$sql);
  
  // On vérifie que l'utilisateur existe bien
  if (mysqli_num_rows($req) > 0) {
     $data = mysqli_fetch_assoc($req);
    
    // On vérifie que son mot de passe est correct
    if ($password == $data['mdp']) {
      $loginOK = true;
    }
  }
}

// Si le login a été validé on met les données en sessions
if ($loginOK) {
  $_SESSION['pseudo'] = $data['pseudo'];
  $_SESSION['age'] = $data['age'];
  $_SESSION['sexe'] = $data['sexe'];
  $_SESSION['ville'] = $data['ville'];
  // redirection vers la page form3.php
    header('Location: form3.php');

}else{
  echo 'Une erreur est survenue, veuillez réessayer !';
}



?>
