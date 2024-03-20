
<html>

<head>
    <title>déconnexion au site</title>
</head>

<body>
    <h1>utilisateur deconnecté</h1>

</body>

</html><?php
session_start();
$_SESSION =  array();
session_destroy();

?>