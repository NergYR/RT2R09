<?php
if (isset($_POST['nom'])) $nom=$_POST['nom'];   else $nom="";   // $nom =  (isset($_POST['nom']))?   $_POST['nom'];   else  "";
if(isset($_POST['prenom'])) $prenom=$_POST['prenom'];  else $prenom="";
if(isset($_POST['email'])) $email=$_POST['email'];  else $email="";
if(isset($_POST['url'])) $url=$_POST['url'];   else $url="";
if(isset($_POST['Tel'])) $tel=$_POST['Tel'];   else $tel="";
if(isset($_POST['Fax'])) $fax=$_POST['Fax'];   else $fax="";

if (empty($nom) OR empty($prenom) OR empty($email) OR empty($tel)
   OR empty($url))
{
echo '<font color= "red"> Attention, seul le champs <b>Fax</b> peut restervide ! </font> ';
} 
else {

$db = mysqli_connect("localhost", "root", "") or die('Erreur de connexion ');

//  la fonction DIE  ci-dessous s’exécute  
//si la connexion n’est pas réussie c’est pour ca on ecris OR DIE 
// on peut la remplacer par juste un test
// if ($db) echo “connexion réussie“;  else  echo “connexion non réussie“; 

$dbase=mysqli_select_db($db, 'famille')  or die('Erreur de sélection '.mysqli_error($db));

$requete = "SELECT id FROM membre WHERE nom = '$nom' and prenom = '$prenom'";
$resultat = mysqli_query($db,$requete) or die(' Erreur d execution'.mysqli_error($db));
while ($Identifiant = mysqli_fetch_assoc($resultat))
{  $id = $Identifiant['id'];
   } 
$sql = "INSERT INTO coordonnee (id, adresse_mail, telephone, fax, site_web) ";
$sql = $sql."VALUES ( $id , '$email', '$tel', '$fax','$url')"  ; 
mysqli_query($db,$sql) or die("Erreur SQL !".$sql."<br>".mysqli_error($db)); 
echo "Vos infos on été ajoutées" ;
mysqli_close($db);
         }
?>
