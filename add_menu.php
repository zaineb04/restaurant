
<?php
include 'connexion.php';



$notif="";
if (isset($_POST['name']) && isset($_POST['price']) && is_numeric($_POST['price']) && $_POST['price'] > 0 && isset($_POST['category'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];// Assurez-vous que le prix est récupéré ici

  
    
$stmt = $conn->prepare("INSERT INTO menu (name, price, category) VALUES (:name, :price, :category)");
$stmt->execute(['name' => $name, 'price' => $price, 'category' => $category]);
$notif = "<p>L'élément '$name' a été ajouté au menu avec succès !</p>";
    
} else if(isset($_POST['name'])  && $_POST['price']< 0) {
   $notif="<p>Le prix doit être un nombre positif.</p>";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Ajouter un élément au menu</title>
</head>
<body>
    <header>
        <h1>Ajouter un élément au menu</h1>
        <nav>
    <ul>
        
        
        <li><a href="liste_commande.php">listes des commandes </a></li>
        <li><a href="liste_reservation.php">listes des reservations </a></li>
        <li><a href="menuAdmin.php">menu de l'admin</a></li>

        <li><a href="add_menu.php" class="active">Ajouter un élément au menu</a></li> <!-- Nouveau lien -->
        <li><a href="index.php" title="Déconnexion" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">&#x21AA; Déconnexion  </a> </li>
                        
                  
               
    </ul>
</nav>

    </header>
    <main>

    <form action="add_menu.php" method="post">
    <label for="name">Nom de l'élément :</label>
    <input type="text" id="name" name="name" required>
    
    <label for="price">Prix :</label>
    <input type="number" step="1" min="1" id="price" name="price" required>
    
    <label for="category">Catégorie :</label>
    <input type="text" id="category" name="category" required>
    
    <?php echo $notif; ?>
    <input type="submit" value="Ajouter" class="btn">
</form>
    </main>
</body>
</html>