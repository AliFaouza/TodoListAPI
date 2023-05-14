<?php 
header("Access-Control-Allow-Origin: *");
$pdo = new PDO(dsn:'mysql:dbname=to-do list; host=localhost', username:'root', password:'root');

$sql = 'Select * from type';
$prep = $pdo->prepare($sql);
$prep->execute();
$res=$prep->fetchAll();

    echo json_encode($res);


  
?>