<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="engine.php">
        <table>
            <tr>
                <td>id</td>
                <td><input type="number" name="id"></td>
            </tr>
            <tr>
                <td>nom</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>prenom</td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>status</td>
                <td><input type="text" name="status"></td>
            </tr>
            <tr>
                <td>date</td>
                <td><input type="date" name="date_de_naissance"></td>
            </tr>

            <tr>
                <td><input type="submit" value="Envoyer"></td>
            </tr>

        </table>
    </form>
</body>
</html>
