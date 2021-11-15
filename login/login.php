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
          header('location: ../home.php');
        }
        else {
          echo "<script>alert('Credenciales no validas');window.location='../index.php';</script>";
        }
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>