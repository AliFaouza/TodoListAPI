<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Connexion à la base de données
$pdo = new PDO('mysql:dbname=todolistapi; host=localhost', 'root', '');

// Récupérer l'id de la liste à supprimer
$id_liste = $_POST['id_liste'];

// // Supprimer la liste de la base de données
$stmt = $pdo->prepare('DELETE FROM liste WHERE id_liste= :liste');
$stmt->bindParam(':liste', $id_liste, PDO::PARAM_INT);


// // Envoyer une réponse JSON pour indiquer que la suppression a été effectuée avec succès

if ($stmt->execute()) {
    echo "Les données ont été insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données.";
}
?>

