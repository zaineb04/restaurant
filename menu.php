<?php
include 'connexion.php';

$stmt = $conn->query('SELECT * FROM menu ORDER BY category');
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Menu</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" ></script>
</head>
<body>
  
     
 
    <header>
        <h1>Menu</h1>
        <nav>
            <ul>
                <li><a href="index.php">acceuil</a></li>
                <li><a href="menu.php" class="active">Menu</a></li>
                <li><a href="order.php">Commander</a></li>
                <li><a href="reservation.php">Réserver une table</a></li>
                
            </ul>
        </nav>
    </header>
    <main>
        
        <ul>
             <?php
        $currentCategory = '';
        foreach ($menuItems as $item): 
            if ($item['category'] !== $currentCategory): 
                if ($currentCategory !== '') echo '</ul>'; // Fermer la liste précédente
                $currentCategory = $item['category'];
                echo "<h2 >" . htmlspecialchars($currentCategory) . "</h2><ul>";
            endif;
        ?>
            <?php echo htmlspecialchars($item['name']); ?> - <?php echo htmlspecialchars($item['price']); ?> dt<br>
            
       
            
        <?php endforeach; ?>
        

        </ul>
    </main>
</body>
</html>