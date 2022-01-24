<?php
  $nom = $_POST['nom'];
  $date = $_POST['date'];
  $email = $_POST['email'];
  $num = $_POST['num'];
  $txt = $_POST['txt'];

  //connexion a la bdd
  $conn = new mysqli('localhost','root','','client_db');
  if($conn->connect_error){
      die('Connection Failed : '.$conn->connect_error);
  }else{
    header('location:../index.html');
    $stmt = $conn->prepare("insert into user(nom, date, email, num, txt)
    values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis",$nom, $date, $email, $num, $txt);
    $stmt->execute();
    $stmt->close();
    $conn->close();
  }