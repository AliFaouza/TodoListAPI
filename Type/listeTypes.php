<?php 
header("Access-Control-Allow-Origin: *");
$pdo = new PDO(dsn:'mysql:dbname=todolistapi; host=localhost', username:'root', password:'');

$sql = 'Select * from type';
$prep = $pdo->prepare($sql);
$prep->execute();
$res=$prep->fetchAll();

    echo json_encode($res);


  
?>