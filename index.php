<?php session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"]))  {
    header('Location: test.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div>
        <h1> Se connecter :</h1>
    </div>
    <form action="test.php" method="post" enctype="multipart/form-data"> 
        <li>
            <label for="zone"> Username</label>
            <input type="text" name="username">
        </li>
        <li>
            <label for="zone"> Mot de Passe</label>
            <input type="text" name="password">
        </li>
        <li>
            <label for="zone"> Screenshot</label>
            <input type="file" name="files" value="bonjour">
        </li>
        <li>
            <input type="submit" value="Envoyer">
        </li>
    </form>
    <div>
        <p> Pas encore de compte ?</p>
        <a href="create.php"> <button> Créer un compte</button></a>
    </div>
</body>
</html>