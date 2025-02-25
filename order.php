<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Récupérer tous les éléments du menu depuis la base de données
$stmt = $conn->query('SELECT * FROM menu');
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC); // Stocker les éléments du menu dans un tableau associatif
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> <!-- Définir l'encodage des caractères -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Lien vers la feuille de style CSS -->
    <title>Commander</title> <!-- Titre de la page -->
</head>
<body>
    <header>
        <h1>Passer une commande</h1> <!-- Titre principal de la page -->
        <nav>
            <ul>
                <li><a href="index.php">acceuil</a></li> <!-- Lien vers la page d'accueil -->
                <li><a href="menu.php">Menu</a></li> <!-- Lien vers la page du menu -->
                <li><a href="order.php" class="active">Commander</a></li> <!-- Lien vers la page de commande -->
                <li><a href="reservation.php">Réserver une table</a></li> <!-- Lien vers la page de réservation -->
               
            </ul>
        </nav>
    </header>
    <main>
    <form action="order.php" method="post"> <!-- Formulaire pour passer une commande -->
    <h3 class="hh">Choisissez vos plats :</h3> <!-- Sous-titre pour la sélection des plats -->
    
    <!-- Nouveau champ pour le nom du client -->
    <label for="client_name">Nom du client :</label>
    <input type="text" id="client_name" name="client_name" required> <!-- Champ pour le nom du client -->
    
    <div id="order-items"> <!-- Conteneur pour les éléments de commande -->
        <div class="order-item"> <!-- Un élément de commande -->
            <label for="item[]">Choisissez un plat :</label> <!-- Étiquette pour le choix du plat -->
            <select name="item[]" required> <!-- Liste déroulante pour sélectionner un plat -->
                <option value="">Sélectionnez un plat</option> <!-- Option par défaut -->
                <?php foreach ($menuItems as $item): ?> <!-- Boucle pour afficher chaque plat du menu -->
                    <option value="<?php echo htmlspecialchars($item['name']); ?>"> <!-- Option pour chaque plat -->
                        <?php echo htmlspecialchars($item['name']); ?> - <?php echo htmlspecialchars($item['price']); ?> dt <!-- Afficher le nom et le prix du plat -->
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="quantity[]">Nombre de plats :</label> <!-- Étiquette pour la quantité -->
            <input type="number" name="quantity[]" min="1" value="1" required> <!-- Champ pour entrer la quantité -->
        </div>
    </div>
    <button type="button" onclick="addOrderItem()">Ajouter un autre plat</button> <!-- Bouton pour ajouter un autre plat -->
    <input type="submit" value="Commander"> <!-- Bouton pour soumettre la commande -->
</form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clientName = $_POST['client_name']; // Récupérer le nom du client
            $items = $_POST['item']; // Récupérer les plats sélectionnés
            $quantities = $_POST['quantity']; // Récupérer les quantités correspondantes
        
            // Boucle à travers chaque plat et sa quantité
            foreach ($items as $index => $item) {
                $quantity = intval($quantities[$index]); // Convertir la quantité en entier
        
                // Vérifier si l'élément existe dans le menu
                $stmt = $conn->prepare("SELECT * FROM menu WHERE name = :name");
                $stmt->execute(['name' => $item]); // Exécuter la requête pour vérifier l'existence du plat
        
                // Si le plat existe, insérer la commande dans la base de données
                if ($stmt->rowCount() > 0) {
                    // Préparer la requête d'insertion dans la table commander
                    $insertStmt = $conn->prepare("INSERT INTO commander (plat, nombre, client_name) VALUES (:plat, :nombre, :client_name)");
                    $insertStmt->execute(['plat' => $item, 'nombre' => $quantity, 'client_name' => $clientName]); // Exécuter l'insertion
                }
            }
        
            // Message de confirmation de la commande
            echo "<p>Votre commande a été reçue et enregistrée pour le client '$clientName' !</p>";
        }
        ?>
    </main>

    <script>
        // Fonction pour ajouter dynamiquement un autre élément de commande
        function addOrderItem() {
            const orderItemsDiv = document.getElementById('order-items'); // Récupérer le conteneur des éléments de commande
            const newOrderItem = document.createElement('div'); // Créer un nouvel élément div
            newOrderItem.classList.add('order-item'); // Ajouter une classe à l'élément
            newOrderItem.innerHTML = `
                <label for="item[]">Choisissez un plat :</label>
                <select name="item[]" required>
                    <option value="">Sélectionnez un plat</option>
                    <?php foreach ($menuItems as $item): ?>
                        <option value="<?php echo htmlspecialchars($item['name']); ?>">
                            <?php echo htmlspecialchars($item['name']); ?> - <?php echo htmlspecialchars($item['price']); ?> dt
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="quantity[]">Nombre de plats :</label>
                <input type="number" name="quantity[]" min="1" value="1" required>
            `; // Ajouter le contenu HTML pour le nouvel élément de commande
            orderItemsDiv.appendChild(newOrderItem); // Ajouter le nouvel élément au conteneur
        }
    </script>
</body>
</html>