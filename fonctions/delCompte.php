<?php
session_start();
require ('../fonctions/bdd.php'); // Chemin en partant du fichier d'inscription (form en front)

$id_user = $_SESSION['id_user'];

$deleteUser = $conn->prepare('DELETE FROM users WHERE id_user = ?');
$deleteUser->execute(array($id_user));

session_destroy();
header('Location: ../index.php');

?>