<?php
session_start();
require ('../fonctions/bdd.php'); // Chemin en partant du fichier d'inscription (form en front)

$id_user = $_SESSION['id_user'];

// Récupérer tout les fichier de l'utilisateur
$getFichiers = $conn->prepare('SELECT * FROM fichiers WHERE id_user = ?');
$getFichiers->execute(array($id_user));
$fichiers = $getFichiers->fetchAll();

// Supprimer tout les fichiers de l'utilisateur
foreach ($fichiers as $fichier) {
    // Supprimer les fichiers du serveur
    unlink("./clients/" . $fichier['chemin']); // On pars sur clients pour viser le bon dossier car le chemin commence par ../
    $filePath =  "./clients/" . $fichier['chemin'];

    // Vérifier si le fichier existe
    if (file_exists($filePath)) {
        // Essayer de supprimer le fichier
        if (unlink($filePath)) {
            echo "Le fichier " . $filePath . " a été supprimé avec succès.<br>";
        } else {
            echo "Erreur : Impossible de supprimer le fichier " . $filePath . ".<br>";
        }
    } else {
        echo "Erreur : Le fichier " . $filePath . " n'existe pas.<br>";
    }

    // Supprimer les fichiers de la base de données
    $deleteFichier = $conn->prepare('DELETE FROM fichiers WHERE id_fichier = ?');
    $deleteFichier->execute(array($fichier['id_fichier']));
}

// Supprimer l'utilisateur
$deleteUser = $conn->prepare('DELETE FROM users WHERE id_user = ?');
$deleteUser->execute(array($id_user));

session_destroy();
header('Location: ../index.php');

?>