<?php
include 'connexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Réservation</title>
</head>
<body>
    <header>
        <h1>Réserver une table</h1>
        <nav>
    <ul>
    <li><a href="index.php">acceuil</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="order.php">Commander</a></li>
        <li><a href="reservation.php" class="active">Réserver une table</a></li>
        
 </nav>
    </header>
  
    <main>
        <form action="reservation.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
            <label for="time">Heure :</label>
            <input type="time" id="time" name="time" required>
            <input type="submit" value="Réserver">                
            </form>
    </main>
</body>
</html>

<?php
if(isset($_POST['name']) && isset($_POST['date']) && isset($_POST['time'])){
     
    $stmt = $conn->prepare("INSERT INTO reservation (name, date,time) VALUES (:name, :date,:time)");
    $stmt->execute(['name' => $_POST['name'],
     'date' => $_POST['date'],
     'time' =>$_POST['time']
    ]);
    echo "<p>La réservation de " .$_POST['name']." a été ajouté  avec succès !</p>";
}
?>