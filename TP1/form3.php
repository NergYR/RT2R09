<html>

<head>
    <title>Connexion au site</title>
</head>

<body>
    <form method="post" action="verifLogin.php">
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


// On appelle la session
echo "session status :". session_status(). "<br>";
if(session_start()){
   
    echo 'Pseudo : ',$_SESSION['pseudo'],'<br />
     Age : ',$_SESSION['age'],'<br />
     Sexe : ',$_SESSION['sexe'],'<br />
     Ville : ',$_SESSION['ville'],'<br />';
     echo '<a href="logout.php">Déconnexion</a>';
};


// On affiche une phrase résumant les infos sur l'utilisateur courant

?>
