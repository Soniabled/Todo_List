<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    
}

include_once "db.php";


if (isset($_POST['ajouter'])) {
  
  $id=$_POST['id'];
  $titre  = $_POST['titre'];
  $description  = $_POST['description'];
  $date_ech  = $_POST['date_ech'];
  
  
  $insertsql = "INSERT INTO `taches`(`id`, `titre`, `description`, `date_ech`) VALUES ('$id','$titre','$description','$date_ech')";
  $resultat = mysqli_query($conn,$insertsql);
  if ($resultat) {
	echo "Ajouter avec succees";
	header('location:index.php');
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
  
<nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(215, 215, 196, 0.46);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.4px);
-webkit-backdrop-filter: blur(5 px);
border: 1px solid rgba(215, 215, 196, 0.35);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="margin-right: auto;">Projet TODO LIST</a>

    <div class="navbar-nav">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['email']; ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="profileDropdown" style="z-index: 999;">
          <li><a class="dropdown-item" href="#">Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" name="logout" href="logout.php">Se déconnecter</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<br><br>
<form action="add.php" method="POST">
<div class="d-flex justify-content-center">
  <div class="card" style="width: 18rem; background: rgba(215, 215, 196, 0.46);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.4px);
-webkit-backdrop-filter: blur(15 px);
border: 1px solid rgba(215, 215, 196, 0.35);">
    <div class="card-body">
      
    <a class="btn btn-outline-danger" href="index.php" ><i class="bi bi-box-arrow-left"> Retour</i></a>
    <br><br>
      <h5 class="card-title">Ajouter une tache</h5>
      
      <div class=" col-mb-3">
        <label for="Titre" class="form-label">Titre</label> 
        <input type="text" class="form-control" placeholder="Titre" name="titre">
      </div>

      <div class="col-mb-3">
        <label for="description" class="form-label">Description</label> <br>
        <input type="text" class="form-control" placeholder="Description"  name="description" >
      </div>

      <div class="col-mb-3">
        <label for="" class="form-label">Date echeance</label><br>
        <input type="date" class="form-control" placeholder="Date echeance" name="date_ech">
      </div>
      <br>

        <button class="btn btn-outline-success" type="submit" id="button-addon2" name="ajouter"> <i class="bi bi-plus-lg"> Ajouter</i></button>
    </div>
  </div>
</div>
</form>

<script src="bootstrap.min.js"></script>




</body>
</html>