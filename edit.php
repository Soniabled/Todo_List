<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    
}

require_once 'db.php';

$id=$_GET['id'];
$selSql = "SELECT * FROM `taches` WHERE id=$id";
$resultat = mysqli_query($conn, $selSql);
$r = mysqli_fetch_assoc($resultat);

if (isset($_POST['modifier'])) {
  $titre  = $_POST['titre'];
  $description  = $_POST['description'];
  $date_ech  = $_POST['date_ech'];
  $complete=$_POST['complete'];
  
  $updatesql = "UPDATE `taches` SET `titre`='$titre',`description`='$description',`date_ech`='$date_ech',`complete`='$complete' WHERE id='$id'";
  $resultat = mysqli_query($conn,$updatesql);
  if ($resultat) {
	echo "Modifier avec succees";
	header('location:index.php');
  }
  
}


// Récupérer la valeur du checkbox
if (isset($_POST['complete'])) {
	$complete = 1; // Case cochée
  } else {
	$complete = 0; // Case non cochée
  }
  
 
  
  // Préparer et exécuter la requête d'insertion
  $stmt = $conn->prepare("UPDATE taches SET complete = ? WHERE id = ?");
  $stmt->bind_param("ii", $complete, $id);
  $stmt->execute();
  
  // Vérifier si la mise à jour a réussi
  if ($stmt->affected_rows > 0) {
	//echo "Mise à jour réussie.";
  } else {
	//echo "Erreur lors de la mise à jour.";
  }
  
  // Fermer la connexion à la base de données
  $stmt->close();
  $conn->close();
  
?>


<!DOCTYPE html>
<html lang="en">

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
	<form action="" method="POST">
		<div class="d-flex justify-content-center">
			<div class="card" style="width: 18rem; background: rgba(215, 215, 196, 0.46);
				border-radius: 16px;
				box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
				backdrop-filter: blur(6.4px);
				-webkit-backdrop-filter: blur(15 px);
				border: 1px solid rgba(215, 215, 196, 0.35);">
				<div class="card-body">
					<a href="index.php" class="btn btn-outline-danger" ><i class="bi bi-box-arrow-left"> Retour</i></a><br><br>
					<h5 class="card-title">Modifier une tache</h5>

					<div class=" col-mb-3">
						<label for="Titre" class="form-label">Titre</label>
						<input type="text" class="form-control" placeholder="titre" value="<?php echo $r['titre'] ?>" name="titre">
					</div>

					<div class="col-mb-3">
						<label for="description" class="form-label">Description</label> <br>
						<input type="text" class="form-control" placeholder="description" value="<?php echo $r['description'] ?>" name="description">
					</div>

					<div class="col-mb-3">
						<label for="" class="form-label">Date echeance</label><br>
						<input type="date" class="form-control" placeholder="date_ech" value="<?php echo $r['date_ech'] ?>" name="date_ech">
					</div><br>
					<div class="col-mb-3">
						<input type="checkbox" class="" placeholder="" value="<?php echo $r['complete'] ?>" name="complete">
						<label for="" class="form-label" name="complete">Complete</label><br>
					</div>
					<br>

					<button class="btn btn-outline-success" type="submit" id="button-addon2"
						name="modifier"><i class="bi bi-brush"></i> Modifier
					</button>
				</div>
			</div>
		</div>
	</form>

	<script src="bootstrap.min.js"></script>

</body>

</html>