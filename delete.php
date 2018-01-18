<?php  

$id = $_GET['id'];
$con = new PDO('mysql:host=localhost;dbname=thu', 'root', '');
$statement = $con->prepare('delete from teachers where id=:id');
$statement->execute([
  ':id' => $id
]);

header('Location: /');

