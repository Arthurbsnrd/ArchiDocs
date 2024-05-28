<?php
session_start();
require ('../../fonctions/bdd.php'); // Chemin en partant du fichier front

if(isset($_POST['add_document'])) {
    // Récupérer les informations du formulaire
    $name = $_POST['name'];
    $type = $_POST['type'];
    $file = $_FILES['file'];

    // Vérifier les erreurs de téléchargement
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Erreur lors de l'upload du fichier.");
    }

    // Définir le répertoire de destination
    $uploadDir = '../../fichiersClient/';
    
    // vérifie si le dossier existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Crée le dossier si il n'existe pas
    }

    // Déplace le fichier téléchargé dans le répertoire de destination
    $filePath = $uploadDir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Insérer les informations du fichier dans la base de données
        $stmt = $conn->prepare("INSERT INTO fichiers (id_user, nom_fichier, taille, date, id_type, chemin) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($_SESSION['id_user'], $name, $file['size'], date('Y-m-d H:i:s'), $type, $filePath));

        echo "Le fichier a été téléchargé et les informations ont été enregistrées.";

        // Rediriger l'utilisateur vers la page monCompte.php
        header("Location: ../../pages/clients/monEspace.php");
    } else {
        echo "Erreur lors du déplacement du fichier.";
    }
}
?>
