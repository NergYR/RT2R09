
<?php
session_start();

setcookie('pseudo', $_SESSION['pseudo'], time() + 365*24*3600, null, null, false, true); // On écrit un cookie
setcookie('age', $_SESSION['age'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
setcookie('sexe', $_SESSION['sexe'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
setcookie('ville', $_SESSION['ville'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...

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

  echo ' cookie:'. "<br>";
  echo 'pseudo:'. $_COOKIE['pseudo']. "<br>";
  echo 'age:'. $_COOKIE['age']. "<br>";
  echo 'sexe:'. $_COOKIE['sexe']. "<br>";
  echo 'ville:'. $_COOKIE['ville']. "<br>";
  
  // suppression des cookies
    setcookie('pseudo', '');
    setcookie('age', '');
    setcookie('sexe', '');
    setcookie('ville', '');
    


}else{
  echo 'Une erreur est survenue, veuillez réessayer !';
}
?>
<html>

<head>
    <title>Connexion au site</title>
</head>

<body>
    <form method="post" action="cookie.php">
        <table border=" 0" width="400" align="center">
            <tr>
                <td width="200"><b>Votre login</b></td>
                <td width="200"><input type="text" name="login"></td>
            </tr>
            <tr>
                <td width="200"><b>Votre mot de passe<b></td>
                <td width="200"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" name="submit" value="login"></td>
            </tr>
        </table>
    </form>


</body>

</html>

<?php
