<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Récupérer les données soumises par le formulaire
$name = $_POST['name'];
$description = $_POST['description'];
$niveau = $_POST['niveau'];
$id_liste = $_POST['id_liste'];

// Préparer la requête SQL pour insérer les données
$stmt = $pdo->prepare("INSERT INTO tache (nom, description, niveau, ref_liste) VALUES (:nom, :description, :niveau, :id_liste)");

// Liage des valeurs des paramètres de la requête avec les valeurs récupérées du formulaire
$stmt->bindParam(':nom', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':niveau', $niveau);
$stmt->bindParam(':id_liste', $id_liste, PDO::PARAM_INT);

Exécution de la requête
if ($stmt->execute()) {
    echo "Les données ont été insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données.";
}
echo $name.' '.$description.' '.$niveau.' '.$id_liste;
?>