<?php

session_start();
require ('../../fonctions/bdd.php'); // Chemin en partant du fichier front
use Dompdf\Dompdf;
use Dompdf\Options;
use FontLib\Table\Type\head;

require '../../vendor/autoload.php';

// Récupération des données de la personne
$id = $_SESSION['id_user'];
$userInfosSql = "SELECT * FROM users WHERE id_user = ?";
$reqUserInfos = $conn->prepare($userInfosSql);
$reqUserInfos->execute(array($id));
$userInfos = $reqUserInfos->fetch();

$nbFacture = "SELECT COUNT(*) FROM factures WHERE id_user = ?";
$reqNbFacture = $conn->prepare($nbFacture);
$reqNbFacture->execute(array($id));
$nbFacture = $reqNbFacture->fetch();

// Insertion de la facture dans la BDD
$factureSql = "INSERT INTO factures (id_user, nom_facture, date, prix_ht, prix_ttc, quantite, TVA) VALUES (?, ?, ?, ?, ?, ?, ?)";
$reqFacture = $conn->prepare($factureSql);
$reqFacture->execute(array($id, "Facture_".$nbFacture[0]+1 ."946", date('Y-m-d'), 16, 20, 1, 20));

ob_start(); // On démarre le buffer
require_once './factureSquelette.php'; // On inclut le fichier facture.php
$html = ob_get_contents(); // On récupère le contenu du buffer
ob_end_clean(); // On vide le buffer

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');


$dompdf->render();

// Définir le chemin où enregistrer le fichier PDF
$directory = "../../facturesClient/".$userInfos["nom"].$userInfos["prenom"];
if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}
$filePath = $directory . "/Facture_" . ($nbFacture[0] + 1) . ".pdf";

// Sauvegarder le PDF dans le dossier
file_put_contents($filePath, $dompdf->output());


?>
