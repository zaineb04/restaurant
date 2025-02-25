<?php
include "connexion.php";
session_start();

$notif = "";
//$correct_password = "zaineb"; // Remplacez par votre mot de passe

if (isset($_POST['password']) && isset($_POST['email'])) {
 
    $stmt = $conn->query('SELECT * FROM users WHERE email="'.$_POST['email'].'"');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($users) && $users[0]['password']==$_POST['password']) {
        $_SESSION['loggedin'] = true; // Démarrer la session
        header("Location: add_menu.php"); // Rediriger vers la page protégée
        exit();
    } else {
        $notif = "<p style='color:red;'>Email ou mot de passe incorrect.</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Connexion</title>
</head>
<body>
    <header>
        <h1>Connexion</h1>
    </header>
    <main>
        <form action="login.php" method="post">
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <?php echo $notif; ?>
            <input type="submit" value="Se connecter">
        </form>
    </main>
</body>
</html>