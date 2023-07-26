<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $delsql= "DELETE FROM `taches` WHERE id=$id";

    $result= mysqli_query($conn,$delsql);

    if ($result) {
        echo "Supprimer avec succees";
        header('location:index.php');  
    }else {
        die(mysqli_error($conn));
    }
}



?>