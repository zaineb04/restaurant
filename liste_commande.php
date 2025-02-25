<?php
include 'connexion.php';

// Récupérer tous les éléments du menu
$stmt = $conn->prepare("SELECT id, plat, nombre, client_name FROM commander"); // Ajout de client_name
$stmt->execute();
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>liste de commande</title>
</head>
<body>
    
    <header>
        <h1>liste de commande </h1>
        <nav>
            <ul>
                
                <li><a href="liste_commande.php" class="active">listes des commandes </a></li>
                <li><a href="liste_reservation.php">listes des reservations </a></li>
                <li><a href="menuAdmin.php">menu de l'admin</a></li>

                <li><a href="add_menu.php">Ajouter un élément au menu</a></li>
                <li><a href="index.php" title="Déconnexion" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">&#x21AA; Déconnexion  </a> </li>

            </ul>
        </nav>
    </header>
    <main>
    <ul> 
        <table>
            <tr>
                <th>Nom du Client</th>
                <th>Plat</th>
                <th>Nombre</th> <!-- Nouvelle colonne pour le nom du client -->
            </tr>
            <?php foreach ($menuItems as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['client_name']); ?></td>  
                    <td><?php echo htmlspecialchars($item['plat']); ?></td>
                    <td><?php echo htmlspecialchars($item['nombre']); ?></td> <!-- Affichage du nom du client -->
                </tr>
            <?php endforeach; ?>
        </table>
        </ul>
      
    </main>
</body>
</html>