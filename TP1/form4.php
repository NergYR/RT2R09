<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "famille";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fonction pour récupérer les données de la table famille_tbl et remplir la liste déroulante
function REMPLIR($conn)
{
    $sql = "SELECT nom, prenom FROM membre";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<select name='nom_prenom' id='nom_prenom' onchange='getAgeAndAverageAge()'>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['nom'] . " " . $row['prenom'] . "'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
        }
        echo "</select>";
    } else {
        echo "0 results";
    }
}

// Affichage de la liste déroulante
echo "<form>";
echo "Sélectionnez un nom : ";
REMPLIR($conn);
echo "</form>";

// Fermeture de la connexion à la base de données
$conn->close();
?>
<script>
    function getAgeAndAverageAge() {
        var selectedName = document.getElementById("nom_prenom").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                document.getElementById("age_personne").innerHTML = "Âge : " + data.age;
                document.getElementById("moyenne_age").innerHTML = "Moyenne des âges de la famille : " + data.avg_age;
            }
        };
        xhttp.open("GET", "get_age_and_average_age.php?name=" + selectedName, true);
        xhttp.send();
    }
</script>
<div id="age_personne"></div>
<div id="moyenne_age"></div>
