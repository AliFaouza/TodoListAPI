<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Récupérer les données soumises par le formulaire
$name = $_POST['name'];
$couleur = $_POST['couleur'];

// Préparer la requête SQL pour insérer les données
$stmt = $pdo->prepare("INSERT INTO type (nom, couleur) VALUES (:nom, :couleur)");

// Liage des valeurs des paramètres de la requête avec les valeurs récupérées du formulaire
$stmt->bindParam(':nom', $name);
$stmt->bindParam(':couleur', $couleur);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Les données ont été insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données.";
}

?>