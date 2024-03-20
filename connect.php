
<?php
	/* Script de connexion � la base de donn�es */

	/* Serveur o� est h�berg�e la base de donn�es */
	$serveur="localhost";
	
	/* Identifiant de connexion � la base de donn�es */
	$login="root";
	
	/* Mot de passe de connexion � la base de donn�es */
	$mdp="";
	
	/* Nom de la base de donn�es � utiliser */
	$base="bdd_gites";
	
	/* Connexion � la base de donn�es */
	$bd=mysqli_connect($serveur,$login,$mdp) or die("Probl�me de connexion � la base de donn�es");
	/* S�lection de la base de donn�es */
	$y=mysqli_select_db($bd,$base) or die ("Erreur dans la s�lection de la base de donn�es");
	
?>
