<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Récupérer les données soumises par le formulaire
$name = $_POST['name'];
$description = $_POST['description'];

// Préparer la requête SQL pour insérer les données
$stmt = $pdo->prepare("INSERT INTO liste (nom, description) VALUES (:nom, :description)");

// Liage des valeurs des paramètres de la requête avec les valeurs récupérées du formulaire
$stmt->bindParam(':nom', $name);
$stmt->bindParam(':description', $description);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Les données ont été insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données.";
}

?>