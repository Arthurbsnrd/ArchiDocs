<?php
session_start();
require ('../../fonctions/bdd.php'); // Chemin en partant du fichier front
include '../../fonctions/security.php';

if(isset($_POST['del_document'])) {
    $id_user = $_SESSION['id_user'];

    // récupérer les informations de l'utilisateur
    $queryUser = $conn->prepare('SELECT * FROM users WHERE id_user = ?');
    $queryUser->execute(array($id_user));
    $userInfos = $queryUser->fetch();

    // Récupérer les informations du document
    $id_fichier = $_POST['id_fichier'];

    // Définir le répertoire de destination
    $uploadDir = '../../fichiersClient/'. $userInfos['nom'].'_'.$userInfos['prenom'].'_'.$userInfos['id_user'].'/';
    
    // vérifie si le dossier existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Crée le dossier si il n'existe pas
    }

    // Récupérer le chemin du fichier
    $queryFile = $conn->prepare('SELECT * FROM fichiers WHERE id_fichier = ?');
    $queryFile->execute(array($id_fichier));
    $fileInfos = $queryFile->fetch();

    $filePath = $fileInfos['chemin'];

    // Supprimer le fichier dans la base de données
    $stmt = $conn->prepare("DELETE FROM fichiers WHERE id_fichier = ?");
    $stmt->execute(array($id_fichier));

    // Supprimer le fichier dans le dossier fichiersClient
    if (unlink($filePath)) {
        echo "Le fichier a été supprimé.";
    } else {
        echo "Erreur lors de la suppression du fichier.";
    }

    // Rediriger l'utilisateur
    header('Location: ../../pages/clients/monEspace.php');
}
?>
