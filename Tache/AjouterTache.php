<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Récupération des données du formulaire
$nom = $_POST['name'];
$description = $_POST['description'];
$niveau = $_POST['niveau'];
$id_liste = $_POST['id_liste'];

// Préparation et exécution de la requête SQL
$stmt = $pdo->prepare("INSERT INTO tache (nom, description, niveau, ref_liste) VALUES (:nom, :description, :niveau, :id_liste)");
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':niveau', $niveau);
$stmt->bindParam(':id_liste', $id_liste);

if ($stmt->execute()) {
    // Succès de l'insertion, redirection vers la page de la liste de tâches
    echo 'La tache à été avec succès!!!';
} else {
    // Échec de l'insertion, affichage d'un message d'erreur
    echo "Erreur lors de l'ajout de la tâche.";
}
echo $nom.' '.$description.' '.$niveau.' '.$id_liste ;
?>