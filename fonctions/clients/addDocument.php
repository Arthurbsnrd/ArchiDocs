<?php
session_start();
require ('../../fonctions/bdd.php'); // Chemin en partant du fichier front
include '../../fonctions/security.php';

if(isset($_POST['add_document'])) {
    $id_user = $_SESSION['id_user'];

    // Récupérer les informations de l'utilisateur, y compris le stockage total alloué
    $queryUser = $conn->prepare('SELECT * FROM users WHERE id_user = ?');
    $queryUser->execute(array($id_user));
    $userInfos = $queryUser->fetch();

    $storageLimit = $userInfos['stockage'] * 1073741824; // Stockage total alloué à l'utilisateur | 1 Go = 1,073,741,824 octets

    // Calculer la taille totale des fichiers déjà uploadés par l'utilisateur
    $queryTotalSize = $conn->prepare('SELECT SUM(taille) AS total_size FROM fichiers WHERE id_user = ?');
    $queryTotalSize->execute(array($id_user));
    $totalSize = $queryTotalSize->fetchColumn();

    // Récupérer les informations du formulaire
    $name = $_POST['name'];
    $file = $_FILES['file'];

    // Vérifier les erreurs de téléchargement
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Erreur lors de l'upload du fichier.");
    }

    // Vérifier si l'utilisateur a assez d'espace de stockage
    if ($totalSize + $file['size'] > $storageLimit) {
        die("Espace de stockage insuffisant pour uploader ce fichier.");
    }

    // Définir le répertoire de destination
    $uploadDir = '../../fichiersClient/'. $userInfos['nom'].'_'.$userInfos['prenom'].'_'.$userInfos['id_user'].'/';
    
    // Vérifier si le dossier existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Crée le dossier si il n'existe pas
    }

    // Déplacer le fichier téléchargé dans le répertoire de destination
    $filePath = $uploadDir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Obtenir le type de fichier automatiquement
        $fileType = mime_content_type($filePath);

        // Insérer les informations du fichier dans la base de données
        $stmt = $conn->prepare("INSERT INTO fichiers (id_user, nom_fichier, taille, date, type_fichier, chemin) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($_SESSION['id_user'], $name, $file['size'], date('Y-m-d H:i:s'), $fileType, $filePath));

        echo "Le fichier a été téléchargé et les informations ont été enregistrées.";

        // Rediriger l'utilisateur vers la page monCompte.php
        header("Location: ../../pages/clients/monEspace.php");
    } else {
        echo "Erreur lors du déplacement du fichier.";
    }
}
?>
