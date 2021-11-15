<?php

$username = 'root';
$password = '';
$dsn = 'mysql:host=localhost:3307; dbname=newyouhavebd';

try {

  $conn = new PDO($dsn, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

  echo "Fail to connect to the database ".$e->getMessage();

}

// $hostDB='localhost:3307';
// $nombreDB='newyouhavebd';
// $usuarioDB='root';
// $passwordDB='';

// // conexion
// $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
// $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

?>