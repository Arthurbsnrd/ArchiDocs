<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/phpmailer/phpmailer/src/Exception.php');
require('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require('../vendor/phpmailer/phpmailer/src/SMTP.php');


//Load Composer's autoloader
require '../vendor/autoload.php';

session_start();
require ('../fonctions/bdd.php'); // Chemin en partant du fichier d'inscription (form en front)

$id_user = $_SESSION['id_user'];

// Récupérer tout les fichier de l'utilisateur
$getFichiers = $conn->prepare('SELECT * FROM fichiers WHERE id_user = ?');
$getFichiers->execute(array($id_user));
$fichiers = $getFichiers->fetchAll();

$nbFichiers = count($fichiers);

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

// Récupérer toutes les informations de l'utilisateur
$queryUser = $conn->prepare('SELECT * FROM users WHERE id_user = ?');
$queryUser->execute(array($id_user));
$userInfos = $queryUser->fetch();

$queryAdmin = $conn->prepare('SELECT * FROM users WHERE role = ?');
$queryAdmin->execute(array('admin'));
$adminInfos = $queryAdmin->fetch();


if (!empty($userInfos)) {
    // Envoie d'un mail de confirmation
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anaselkhiat78@gmail.com';                     //SMTP username
        $mail->Password   = 'ucspkoolbbzfokjo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('anaselkhiat78@gmail.com', 'ArchiDocs');
        $mail->addAddress($userInfos['mail'], $userInfos['prenom'] . ' ' . $userInfos['nom']);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Suppression de votre compte ArchiDocs';
        $mail->Body    = 'Bonjour, votre compte <bArchidocs</b> à été supprimé avec succès !';

        $mail->send();
        echo 'Message Envoyé !';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (!empty($adminInfos)) {
    // Envoie d'un mail de confirmation
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anaselkhiat78@gmail.com';                     //SMTP username
        $mail->Password   = 'ucspkoolbbzfokjo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('anaselkhiat78@gmail.com', 'ArchiDocs');
        $mail->addAddress($adminInfos['mail']);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Suppression du compte ArchiDocs de ' . $userInfos['prenom'] . ' ' . $userInfos['nom'];
        $mail->Body    = 'Bonjour, le compte <bArchidocs</b> de ' . $userInfos['prenom'] . ' ' . $userInfos['nom'] . ' à été supprimé avec succès !
        <br>Au total, ' . $nbFichiers . ' fichiers ont été supprimés.';

        $mail->send();
        echo 'Message Envoyé !';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



// Supprimer l'utilisateur
$deleteUser = $conn->prepare('DELETE FROM users WHERE id_user = ?');
$deleteUser->execute(array($id_user));

session_destroy();
header('Location: ../index.php');

?>