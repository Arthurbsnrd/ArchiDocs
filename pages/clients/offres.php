<?php include '../../fonctions/security.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres | ArchiDocs</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/offres.css">
    <script src="../../js/navbar.js" defer></script>
    <link rel="shortcut icon" href="../../assets/ArchiDocs-Logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3181ebab68.js" crossorigin="anonymous"></script>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Icon Bootstrap -->
</head>


<body>
    <?php include '../../includes/navbar.php'; ?>
    
    <div class="contenue offres">
        <div class="bg-card">
            <div class="card-offre">
                <div class="header-card">
                    <div class="logo-offre"><i class="bi bi-graph-up-arrow"></i></div>
                    <div class="nom-offre">Offre standard</div>
                </div>
    
                <div class="prix-card"><span class="prix">20</span> €</div>
    
                <div class="description-card">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto nisi aperiam quam facilis corporis ducimus, assumenda nihil necessitatibus culpa veritatis.
                </div>

                <div class="btn-achat">
                    <form action="../../fonctions/clients/addStockage.php" method="POST">
                        <button name="addStockage" class="btn btn-success" type="submit">Acheter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>