<?php 

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    
}

include_once "db.php";






//echo "Bonjour, " . $_SESSION['email'] . "! Bienvenue sur la page d'accueil.";


// Empêcher la mise en cache de la page
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");


?>




<!DOCTYPE html>
<html>

<head>
  <title>TODO LIST</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="stylesheet" href="style.css">
</head>


<body background="glass.jpeg" style="background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">


<nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(215, 215, 196, 0.46);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.4px);
-webkit-backdrop-filter: blur(5 px);
border: 1px solid rgba(215, 215, 196, 0.35);
z-index:1;">
  <div class="container-fluid" style="z-index:1;">
    <a class="navbar-brand" href="#" style="margin-right: auto;">Projet TODO LIST</a>

    <div class="navbar-nav">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative; z-index: 3;">
          <?php echo $_SESSION['email']; ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start " aria-labelledby="profileDropdown" style="z-index: 3;">
          <li><a class="dropdown-item" style="" href="#">Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" name="logout" href="logout.php">Se déconnecter</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>




  <br><br>
  <div class="container position-relative" style="background: rgba(215, 215, 196, 0.46);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.4px);
-webkit-backdrop-filter: blur(15 px);
border: 1px solid rgba(215, 215, 196, 0.35);
z-index:2;">
    <div class="container-fluid">
      <br>
      <a type="button" class="btn btn-outline-success" href="add.php"><i class="bi bi-plus-lg"> Ajouter</i></a>
      <br><br>
    </div>

    <div class="container-fluid">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Date echeance</th>
            <th scope="col">Statut</th>
            <th scope="col">Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $readsql = "SELECT * FROM `taches` ";
          $res = mysqli_query($conn, $readsql);
          while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
              <td scope="row"><?php echo $row['id'] ?></td>
              <td scope="row"><?php echo $row['titre'] ?></td>
              <td scope="row"><?php echo $row['description'] ?></td>
              <td scope="row"><?php echo $row['date_ech'] ?></td>
              <td scope="row" class="text-white">
                <?php
                // Afficher le statut complet/incomplet
                if ($row['complete'] == 1) {
                  echo '<i class="bi bi-check-lg text-success"></i> Complet';
                } else {
                  echo '<i class="bi bi-x-lg text-danger"></i> Incomplet';
                }
                ?>
              </td>
              <td scope="row" class="text-white">
                <a href="edit.php?id=<?php echo $row['id'] ?>" type="submit" style="text-decoration:none; color:white;"
                  class="btn btn-primary">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <a href="delete.php?id=<?php echo $row['id'] ?>" style="text-decoration:none; color: aliceblue;"
                  class="btn btn-danger">
                  <i class="bi bi-x-lg"></i>
                </a>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

<script src="bootstrap.min.js"></script>
</body>

</html>
