<?php
include 'db.php';

if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $hashedPassword = password_hash($passwd, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (nom, email, passwd) VALUES ('$nom', '$email', '$hashedPassword')";
    mysqli_query($conn, $query);

    echo "Inscription réussie !";

    header('location: login.php');
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
  <div class="card" style="width: 18rem; background: rgba(215, 215, 196, 0.46);border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.4px);-webkit-backdrop-filter: blur(15 px);border: 1px solid rgba(215, 215, 196, 0.35);">
    <div class="card-body">
      
   
    <br>
      <h5 class="card-title">Inscription</h5>
      
      <div class=" col-mb-3">
        <label for="Nom" class="form-label">Nom</label> 
        <input type="text" class="form-control" placeholder="Nom" name="nom">
      </div><br>

      <div class="col-mb-3">
        <label for="email" class="form-label">Email</label> <br>
        <input type="text" class="form-control" placeholder="email"  name="email" >
      </div><br>

      <div class="col-mb-3">
        <label for="password" class="form-label">Mot de passe</label> <br>
        <input type="password" class="form-control" placeholder="Mot de passe"  name="passwd" >
      </div>
     <br>


        <button class="btn btn-outline-success" type="submit" id="button-addon2" name="register">S'inscrire</button>
    </div>
  </div>
</div>
</form>




</body>
</html>
