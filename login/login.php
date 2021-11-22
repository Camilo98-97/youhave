<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert client</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <link rel="stylesheet" href="../css/material.min.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/ajaxjq.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../js/material.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
    <link rel="icon" href="../assets/img/icon.png">
</head>

<?php

require_once 'session.php';
require_once 'db_connect.php';

if(isset($_POST['login-btn'])) {

    $user = $_POST['username'];
    $password = $_POST['password'];

    try {
      $SQLQuery = "SELECT * FROM users WHERE username = :username";
      $statement = $conn->prepare($SQLQuery);
      $statement->execute(array(':username' => $user));

      while($row = $statement->fetch()) {
        $id = $row['id'];
        $hashed_password = $row['password'];
        $username = $row['username'];

        if(password_verify($password, $hashed_password)) {
          $_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
          echo "<script>
                swal({
                    title: 'BIENEVENIDO',
                    text: 'Credenciales validas.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../home.php';
                });
               </script>";
          // header('location: ../home.php');
        }
        else {
          echo "<script>
                swal({
                    title: 'Error',
                    text: 'Usuario o contraseña incorrectos',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 1500
                }, function() {
                    window.location.href = '../index.php';
                });
               </script>";
        }
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>