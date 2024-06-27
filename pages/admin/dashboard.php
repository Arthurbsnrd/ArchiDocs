<?php 
include '../../fonctions/admin/securityAdmin.php';
include '../../fonctions/bdd.php';

// Récupération des clients
$queryClients = $conn->prepare('SELECT * FROM users WHERE role = "client"');
$queryClients->execute();
$clients = $queryClients->fetchAll();

// Récupération du stockage utilisé par chaque client
$clientsData = [];
foreach ($clients as $key => $client) {
    $queryStockage = $conn->prepare('SELECT SUM(taille) as stockage FROM fichiers WHERE id_user = :id_user');
    $queryStockage->execute(['id_user' => $client['id_user']]);
    $stockage = $queryStockage->fetch();
    $stockageUtilise = $stockage['stockage'] / 1000000; // On convertit en Go
    $stockageUtilise = round($stockageUtilise, 2);

    $clientsData[] = [
        'label' => $client['nom']." ".$client['prenom'],
        'y' => $stockageUtilise
    ];
}

// Convertir les données en JSON pour les utiliser dans le JavaScript
$clientsDataJSON = json_encode($clientsData);

// Récupération du nombre de fichier dépôsé aujourd'hui par des clients
$queryFichiers = $conn->prepare('SELECT *, users.id_user, users.role FROM fichiers INNER JOIN users ON fichiers.id_user = users.id_user WHERE date = CURDATE() AND role = "client"');
$queryFichiers->execute();
$fichiersDuJour = $queryFichiers->fetchAll();
$nbFichiersDuJour = count($fichiersDuJour);

// Récupérer les fichiers déposés par les clients
$queryFichiers = $conn->prepare('SELECT *, users.id_user, users.role FROM fichiers INNER JOIN users ON fichiers.id_user = users.id_user WHERE role = "client"');
$queryFichiers->execute();
$fichiers = $queryFichiers->fetchAll();
$nbFichiers = count($fichiers);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ArchiDocs</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/dashboard.css">
    <script src="../../js/navbar.js" defer></script>
    <link rel="shortcut icon" href="../../assets/ArchiDocs-Logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3181ebab68.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Icon Bootstrap -->
    <script>
        window.onload = function () {
            var dataPoints = <?php echo $clientsDataJSON; ?>;
            
            var chart = new CanvasJS.Chart("chartContainer", { 
                title: {
                    text: "Répartition des fichiers par client"
                },
                data: [
                    {
                        type: "pie", // Pour afficher le graphique en camembert
                        indexLabel: "{label} : #percent%", // Pour afficher le pourcentage
                        toolTipContent: "{label}: {y} Go", // Pour afficher la valeur
                        dataPoints: dataPoints // Les données
                    }
                ]
            });

            chart.render();
        }
    </script>
</head>

<body>
    <?php include '../../includes/navbar.php'; ?>
    
    <div class="contenue">
        <div class="dashboard">
            <!-- Section: Statistics with subtitles -->
            <section class="chart">
               <div class="row" style="display: flex">
                   <div class="col-xl-6 col-md-12 mb-4">
                       <div class="card">
                       <div class="card-body">
                           <div class="d-flex justify-content-between p-md-1">
                           <div class="d-flex flex-row">
                               <div class="align-self-center">
                               <i class="fas fa-user text-success fa-3x me-4"></i>
                               </div>
                               <div>
                               <h4>Nombre de clients</h4>
                               <p class="mb-0"></p>
                               </div>
                           </div>
                           <div class="align-self-center">
                               <?php
                               echo "<h2 class='h1 mb-0'>" . count($clients) . "</h2>";
                               ?>
                           </div>
                           </div>
                       </div>
                       </div>
                   </div>
                   <div class="col-xl-6 col-md-12 mb-4">
                       <div class="card">
                       <div class="card-body">
                           <div class="d-flex justify-content-between p-md-1">
                           <div class="d-flex flex-row">
                               <div class="align-self-center">
                               <i class="fas fa-chart-pie text-warning fa-3x me-4"></i>
                               </div>
                               <div>
                               <h4>Total de fichier</h4>
                               <p class="mb-0"></p>
                               </div>
                           </div>
                           <div class="align-self-center">
                               <h2 class="h1 mb-0"><?php echo $nbFichiers; ?></h2>
                           </div>
                           </div>
                       </div>
                       </div>
                   </div> 
                   <div class="col-xl-12 col-md-12 mb-4">
                       <div class="card">
                       <div class="card-body">
                           <div class="d-flex justify-content-between p-md-1">
                           <div class="d-flex flex-row">
                               <div class="align-self-center">
                               <i class="fas fa-chart-pie text-warning fa-3x me-4"></i>
                               </div>
                               <div>
                               <h4>Nombre de fichier du jour</h4>
                               <p class="mb-0"></p>
                               </div>
                           </div>
                           <div class="align-self-center">
                               <h2 class="h1 mb-0"><?php echo $nbFichiersDuJour; ?></h2>
                           </div>
                           </div>
                       </div>
                       </div>
                   </div> 
               </div>
               <!-- Repartition des fichier par client -->
               <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
                <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
            </section>
            <!-- Section: Main chart -->
        </div>
    </div>
</body>

</html>
