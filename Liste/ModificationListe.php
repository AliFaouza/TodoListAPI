<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
$pdo = new PDO('mysql:dbname=todolistapi; host=localhost', 'root', '');

// Récupère les données envoyées en POST
$id_liste = $_GET['id_liste'];
$nom = $_POST['name'];
$description = $_POST['description'];

// Requête pour modifier la liste correspondant à l'id envoyé
$sql = "UPDATE liste SET nom=:nom, description=:description WHERE liste.id_liste=:id_liste;";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':id_liste', $id_liste, PDO::PARAM_INT);
// Exécute la requête avec les données fournies
if ($stmt->execute()) {
    echo "La liste a été modifiée avec succès.";
} else {
    echo "Erreur lors de la modification de la liste: " . $stmt->errorInfo()[2];
}
echo $id_liste.' '.$nom.' '.$description;
?>
