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
    <title>Modifier votre Menu</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" ></script>
</head>
<body>
  
     
 
    <header>
        <h1> Modifier votre Menu</h1>
        <nav>
            <ul>
                
                <li><a href="liste_commande.php">listes des commandes </a></li>
                 <li><a href="liste_reservation.php">listes des reservations </a></li>
                 <li><a href="menuAdmin.php"class="active">menu de l'admin</a></li>

                <li><a href="add_menu.php">Ajouter un élément au menu</a></li>
                <li><a href="index.php" title="Déconnexion" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">&#x21AA; Déconnexion  </a> </li>

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
            <?php echo htmlspecialchars($item['name']); ?> - <?php echo htmlspecialchars($item['price']); ?> dt
            <a href="/projet_stage/modifier.php?item=<?php echo urlencode($item['id']); ?>"><i class='far fa-edit'></i></a>
                    
            <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')" href="/projet_stage/suprimmer.php?item=<?php echo urlencode($item['id']); ?>"><i class='far fa-trash-alt'></i></a><br>
       
            
        <?php endforeach; ?>
        

        </ul>
    </main>
</body>
</html>