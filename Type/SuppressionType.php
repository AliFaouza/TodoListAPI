<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Connexion à la base de données
$pdo = new PDO('mysql:dbname=todolistapi; host=localhost', 'root', '');

// Récupérer l'id de la liste à supprimer
$id_type = $_POST['id_type'];

 // Supprimer la liste de la base de données
$stmt = $pdo->prepare('DELETE FROM type WHERE id_type= :id_type');
$stmt->bindParam(':id_type', $id_type,PDO::PARAM_INT);


// Envoyer une réponse JSON pour indiquer que la suppression a été effectuée avec succès

if ($stmt->execute()) {
    echo "Les données ont été supprimer avec succès.";
} else {
    echo "Erreur lors de la suppression des données.";
}
echo $id_type;
?>

