<?php
// Récupération du code depuis la requête GET
$code = $_GET['item'] ?? null;

// Vérification que le code est défini
if (!$code) {
    header("Location:/projet_stage/menu.php?message=code_indefini");
    exit;
}

// Connexion à la base de données
require_once("connexion.php");

try {
    // Préparation de la requête SQL pour supprimer l'étudiant basé sur le code
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = :id");

    // Exécution de la requête avec liaison des paramètres
    if ($stmt->execute([':id' => $code])) {
        // Rediriger avec un message de succès
        header("Location: /projet_stage/menu.php?message=suppression_reussie");
        exit;
    } else {
        // Rediriger avec un message d'erreur
        header("Location: /projet_stage/menu.phpmessage=erreur_suppression");
        exit;
    }
} catch (PDOException $e) {
    // Gestion des erreurs de la base de données
    error_log("Erreur PDO : " . $e->getMessage());
    header("Location: /projet_stage/menu.php?message=erreur_exception");
    exit;
}
