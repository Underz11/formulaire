<?php 
session_start();
$mysqlClient = new PDO(
	'mysql:host=localhost;dbname=users;port=3306;charset=utf8',
	'root',
	''
);
?>
<?php
$data = $mysqlClient->prepare('SELECT * FROM utilisateur');
?>
<?php
$data->execute();
$user = $data->fetchAll();
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    
    $verif = 0;
    foreach ($user as $users) {
        if ($_POST["username"] === $users["username"] && $_POST["password"] === $users["password"]) {
            $verif = 1;
        }
    }
    if ($verif === 0) {
        header('Location: error.php');
        exit();
    }
    else {
        if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];

        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__ . '/fonc.php')?>
<head>
    <meta charset="UTF-8">
    <meta name="view port" content="width=device-width, initial-scale=1.0">
    <title>validation</title>
</head>
<body>
    <?php require_once(__DIR__. '/header.php')?>
    <h1> Bonjour <?php echo $_SESSION["username"]?> </h1>
    <p> Votre mot de passe est <?php echo $_SESSION["password"] ?> </p>
    <button > Bonjour </button>
    <?php require_once(__DIR__. '/footer.php')?>
</body>
</html>