<?php
include 'connexion.php';

$stmt = $conn->query('SELECT * FROM reservation');
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><?php
// Récupérer tous les éléments du menu
$stmt = $conn->prepare("SELECT id, name, date, time FROM reservation");
$stmt->execute();
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="assets/css/style.css">
    <title>liste de reservetion</title>
   
</head>
<body>
    
    <header>
        <h1>liste de reservetion</h1>
        <nav>
            <ul>

                
                <li><a href="liste_commande.php">listes des commandes </a></li>
                <li><a href="menuAdmin.php">menu de l'admin</a></li>

                <li><a href="liste_reservation.php "class="active">listes des reservations </a></li>

                <li><a href="add_menu.php">Ajouter un élément au menu</a></li>
                <li><a href="index.php" title="Déconnexion" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">&#x21AA; Déconnexion  </a> </li>

            </ul>
        </nav>
    </header>
    <main>
    <ul>
            
                <html>
                    <table>
                    
                        <tr>
                            <td> le nom de client</td>
                            <td> date</td>
                            <td> time</td>
                        </tr>
                        <?php foreach ($menuItems as $item): ?>
                        <tr>
                   
                          <td><?php echo htmlspecialchars($item['name']); ?></td>  
                          <td><?php echo htmlspecialchars($item['date']); ?></td>
                          <td><?php echo htmlspecialchars($item['time']) ; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
               
               
         
        </ul>
      
    </main>
</body>
</html>