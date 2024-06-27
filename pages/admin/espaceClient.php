<?php include '../../fonctions/admin/securityAdmin.php';?>

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
    <title>Espace de NOMCLIENT | ArchiDocs</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/espaceClient.css">
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
    
    <div class="contenue espaceDuClient">
        <div class="header-espace">
            <h1>Bienvenue dans l'espace de NOMCLIENT</h1>
            <p>Retrouvez ici tout ses documents</p>
        </div>
        
        <div class="liste-fichier">
            <div class="les-fichiers">
                <div class="stockage">
                    <div class="progress" style="color: black;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">Utilisation de 15Go</div>
                        Espace restant: 5Go
                    </div>
                    <div class="total-stock">
                        <h5>
                            Total: 20Go
                        </h5>    
                    </div>
                </div>
                <div class="div-btn-upload">
                    <!-- trier les fichier -->
                    <div class="tri-fichier">
                        <select name="tri" id="tri" class="btn btn-dark">
                            <option value="default">Trier par...</option>
                            <option value="date">Trier par date</option>
                            <option value="date">Trier par taille</option>
                        </select>
                            <select name="filtre" id="filtre" class="btn btn-dark">
                                <option value="default">Filtrer par...</option>
                                <?php foreach($documents as $document): ?>
                                    <option value="<?= $document["type"] ?>">Filtrer par <?= $document["type"] ?></option>
                                <?php endforeach; ?>                                
                            </select>
                    </div>
                </div>
                <!-- barre de recherche -->
                <div class="search-bar mb-3">
                    <input type="text" class="form-control" placeholder="Rechercher un document">
                </div>
                
                <?php foreach($documents as $document): ?>
                    <div class="fichier">
                        <div class="fichier-img">
                            <?php if($document["type"] == "word"): ?>
                                <i class="fas fa-file-word"></i>
                            <?php elseif($document["type"] == "pdf"): ?>
                                <i class="fas fa-file-pdf"></i>
                            <?php elseif($document["type"] == "excel"): ?>
                                <i class="fas fa-file-excel"></i>
                            <?php endif; ?>
                            <small><?= $document["date"] ?></small>
                        </div>
                        <div class="fichier-info">
                            <h3><a href=""><?= $document["name"] ?></a></h3>
                            <p>Document <?= $document["type"] ?></p>
                            <p>Taille: <?= $document["size"] ?></p>
                        </div>
                        <div class="fichier-action">
                            <a href="" class="btn btn-dark">Télécharger <i class="bi bi-download"></i></a>
                            <a href="" class="btn btn-danger">Supprimer <i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>