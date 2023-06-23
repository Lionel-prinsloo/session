<?php

//opdracht 1
session_start();
header('Location:variabele.php');
$_SESSION['naam'] = 'cringe';
$_SESSION['email'] = 'cringe@gmail.com';




//opdracht 2

$host = 'localhost:3307';
$db   = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected to $db";
} 
    catch (\PDOException $e) 
{
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query("SELECT * FROM winkel.producten");
$result = $stmt->fetchAll();

$stmt = $pdo->query("SELECT product_code FROM winkel.producten");
$resul = $stmt->fetchAll();



foreach ($result as $row) {
    echo $row['product_code'] . " " .$row['product_naam'] . " " . $row['prijs_per_stuck'] . $row['omschrijving'] . "<br>";
}

foreach ($resul as $ro) {
    echo $ro['product_code'] . "<br>";
}



$_SESSION['product_code'] =  $ro['product_code'] ;  



?>