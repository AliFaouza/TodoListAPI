<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Récupère les données envoyées en POST
$id_type = $_GET['id_type'];
$nom = $_POST['name'];
$couleur = $_POST['couleur'];

// Requête pour modifier la liste correspondant à l'id envoyé
$sql = "UPDATE type SET nom=:nom, couleur=:couleur WHERE type.id_type=:id_type;";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':couleur', $couleur);
$stmt->bindParam(':id_type', $id_type, PDO::PARAM_INT);

// Exécute la requête avec les données fournies
if ($stmt->execute()) {
    echo "La liste a été modifiée avec succès.";
} else {
    echo "Erreur lors de la modification de la liste: " . $stmt->errorInfo()[2];
}

?>
