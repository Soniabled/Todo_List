<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($passwd, $row['passwd'])) {
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        echo "Adresse email ou mot de passe incorrect.";
    }
}
?>




<!DOCTYPE html>
<html>
<head>
  <title>TODO LIST</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body background="glass.jpeg">
  
  <nav class="navbar navbar-expand-lg navbar-dark "style="background: rgba(215, 215, 196, 0.46);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.4px);
-webkit-backdrop-filter: blur(15 px);
border: 1px solid rgba(215, 215, 196, 0.35);">
    <div class="container-fluid ">
      <a class="navbar-brand text-center" href="#">Projet TODO LIST</a>
    </div>
  </nav>
<br><br>
<form action="" method="POST">
<div class="d-flex justify-content-center">
  <div class="card" style="width: 18rem; background: rgba(215, 215, 196, 0.46);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.4px);
-webkit-backdrop-filter: blur(15 px);
border: 1px solid rgba(215, 215, 196, 0.35);">
    <div class="card-body">
      
   
    <br>
      <h5 class="card-title">S'authentifier</h5>
      
      
      <div class="col-mb-3">
        <label for="email" class="form-label">Email</label> <br>
        <input type="text" class="form-control" placeholder="email"  name="email" >
      </div><br>

      <div class="col-mb-3">
        <label for="password" class="form-label">Mot de passe</label> <br>
        <input type="password" class="form-control" placeholder="Mot de passe"  name="passwd" >
      </div>
     <br>


        <button class="btn btn-outline-success" type="submit" id="button-addon2" name="login">Se connecter</button>
        <p>Pas de compte ?</p>
        <a href="register.php">S'inscrire</a>
        
    </div> 
  </div>
</div>
</form>




</body>
</html>
