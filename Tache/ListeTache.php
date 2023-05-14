<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');

// Exécution de la requête avec l'id de la liste en paramètre
$id_liste = $_GET['id_liste'];
// Préparation de la requête
$stmt = $pdo->prepare('SELECT * FROM tache WHERE ref_liste = :id_liste');

$stmt->execute(array('id_liste' => $id_liste));

// Récupération des tâches sous forme de tableau associatif
$taches = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Encodage en JSON et envoi de la réponse au client
header('Content-Type: application/json');
echo json_encode($taches);
?>