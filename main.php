

<html>
<head>
<meta charset=utf-8>
<title>TP Informatique sur les bases de donnees</title>
</head>

<body bgcolor="#0099FF" text="#000000" link="#FFFFFF">
<center>
<h1> TP d'informatique sur les bases de donnees </h1>
<h3>Gestion de la table GITES </h3>
<hr width="75%">

   <form name="form" method="post" action="main.php">
   <table width="54%" border="0" height="225" align="center" cellspacing="1">
         <tr> 
           <td width="25%" height="99"> 
           <center> les regions et les villes et les numeros pour les villes qui ne contient pas 
           </center>
           </td>
        </tr>
         <tr> 
            <td width="25%" height="34"> 
              <center>
                 <input type="text" name="varrequete">
        
              </center>
            </td>
         </tr>
          <tr> 
             <td width="25%" height="65"> 
               <center>
	              <input type="submit" name="okrequete" value="Executer">
               </center>
             </td>
          </tr>
     </table>
  </form>
  
<hr width="75%">

<?php	
		
		if (isset($_POST["okrequete"]))
			{
				include("requete.php");
			}
				
  		   		
?>				

</center>

</body>
