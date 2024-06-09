<?php 
include '../../fonctions/admin/securityAdmin.php';
include '../../fonctions/bdd.php';

// Récupération des clients
$queryClients = $conn->prepare('SELECT * FROM users WHERE role = "client"');
$queryClients->execute();
$clients = $queryClients->fetchAll();

// Récupération du stockage utilisé par chaque client
foreach ($clients as $key => $client) {
    $queryStockage = $conn->prepare('SELECT SUM(taille) as stockage FROM fichiers WHERE id_user = :id_user');
    $queryStockage->execute(['id_user' => $client['id_user']]);
    $stockage = $queryStockage->fetch();
    $stockageUtilise = $stockage['stockage'] / 1000000; // On convertit en Go
    $stockageUtilise = round($stockageUtilise, 2);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Clients | ArchiDocs</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/nosClients.css">
    <script src="../../js/navbar.js" defer></script>
    <link rel="shortcut icon" href="../../assets/ArchiDocs-Logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3181ebab68.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Icon Bootstrap -->
</head>


<body>
    <?php include '../../includes/navbar.php'; ?>
    
    <div class="contenue nosClients">
        <div class="clients">
            
            <?php foreach ($clients as $client) { ?>
                <a href="./espaceClient.php?id=<?= $client['id_user'] ?>" class="client">
                    <div class="client-info">
                        <div class="client-nom"><h4><?= $client['nom'] ?></h4></div>
                        <div class="client-prenom"><?= $client['prenom'] ?></div>
                    </div>
                    <div class="client-stockage">
                        <small>
                            Stockage utilisé: <?= $stockageUtilise ?>Go
                        </small>
                    </div>
                </a>
            <?php } ?>
            
        </div>
    </div>
</body>

</html>