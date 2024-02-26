<?php
    $documents = [
        [
            "id" => 1,
            "name" => "Document 1",
            "type" => "word",
            "size" => "25mo",
            "date" => "03/02/2024"
        ],
        [
            "id" => 2,
            "name" => "Document 2",
            "type" => "pdf",
            "size" => "25mo",
            "date" => "23/03/2024"
        ],
        [
            "id" => 3,
            "name" => "Document 3",
            "type" => "excel",
            "size" => "25mo",
            "date" => "03/02/2024"
        ]
    ];
    
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
            <div class="client">
                <div class="client-info">
                    <div class="client-nom"><h4>Nom</h4></div>
                    <div class="client-prenom">Prenom</div>
                </div>
                <div class="client-stockage">
                    <small>
                        Stockage utilisé: 15/20Go
                    </small>
                </div>
            </div>
            <div class="client">
                <div class="client-info">
                    <div class="client-nom"><h4>Nom</h4></div>
                    <div class="client-prenom">Prenom</div>
                </div>
                <div class="client-stockage">
                    <small>
                        Stockage utilisé: 15/20Go
                    </small>
                </div>
            </div>
            <div class="client">
                <div class="client-info">
                    <div class="client-nom"><h4>Nom</h4></div>
                    <div class="client-prenom">Prenom</div>
                </div>
                <div class="client-stockage">
                    <small>
                        Stockage utilisé: 15/20Go
                    </small>
                </div>
            </div>
            <div class="client">
                <div class="client-info">
                    <div class="client-nom"><h4>Nom</h4></div>
                    <div class="client-prenom">Prenom</div>
                </div>
                <div class="client-stockage">
                    <small>
                        Stockage utilisé: 15/20Go
                    </small>
                </div>
            </div>
        </div>
    </div>
</body>

</html>