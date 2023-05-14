<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$pdo = new PDO('mysql:dbname=to-do list; host=localhost', 'root', 'root');
$sql = 'Select * from liste';
$prep = $pdo->prepare($sql);
$prep->execute();
$res=$prep->fetchAll();

echo json_encode($res);
?>
