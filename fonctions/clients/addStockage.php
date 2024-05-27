<?php
    session_start();
    require ('../../fonctions/bdd.php'); // Chemin en partant du fichier front

    // Ajouter 20go dans le stockage de l'utilisateur
    if(isset($_POST['addStockage']))
    {
        $id = $_SESSION['id_user'];
        $addStockage = $conn->prepare('UPDATE users SET stockage = stockage + 20 WHERE id_user = ?');
        $addStockage->execute(array($id));
        header("Location: ../../pages/clients/monCompte.php");
    }
    else
    {
        echo "Erreur lors de l'ajout de stockage";
    }
?>