<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Récupère les données envoyées en POST
$id_tache = $_GET['id_tache'];
$nom = $_POST['name'];
$description = $_POST['description'];
$niveau = $_POST['niveau'];


// Requête pour modifier la liste correspondant à l'id envoyé
$sql = "UPDATE tache SET nom= :nom, description= :description, niveau= :niveau WHERE id_tache= :id_tache;";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':niveau', $niveau);
$stmt->bindParam(':id_tache', $id_tache, PDO::PARAM_INT);
// Exécute la requête avec les données fournies
if ($stmt->execute()) {
    echo "La liste a été modifiée avec succès.";
} else {
    echo "Erreur lors de la modification de la liste: " . $stmt->errorInfo()[2];
}
echo $id_liste.' '.$nom.' '.$description.' '.$niveau;
echo 'salut!!!';
?>
