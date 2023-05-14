<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Récupérer l'id de la liste à supprimer
$id_tache = $_POST['id_tache'];

 // Supprimer la liste de la base de données
$stmt = $pdo->prepare('DELETE FROM tache WHERE id_tache= :id_tache');
$stmt->bindParam(':id_tache', $id_tache,PDO::PARAM_INT);


// Envoyer une réponse JSON pour indiquer que la suppression a été effectuée avec succès

if ($stmt->execute()) {
    echo "Les données ont été supprimer avec succès.";
} else {
    echo "Erreur lors de la suppression des données.";
}
echo $id_type;
?>

