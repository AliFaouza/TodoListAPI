<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');


$pdo = new PDO('mysql:dbname=todolistapi; host=localhost', 'root', '');
$sql = 'Select * from liste';
$prep = $pdo->prepare($sql);
$prep->execute();
$res=$prep->fetchAll();

echo json_encode($res);
?>
