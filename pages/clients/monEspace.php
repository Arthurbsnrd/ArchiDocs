<?php
include '../../fonctions/security.php';
include '../../fonctions/bdd.php';

// Ici on va récupérer les infos de l'utilisateur connecté pour les afficher
$queryUser = $conn->prepare('SELECT * FROM users WHERE id_user = ?');
$queryUser->execute(array($_SESSION['id_user']));
$userInfos = $queryUser->fetch();

// Récupération des fichiers de l'utilisateur avec l'id de session
$queryDocuments = $conn->prepare('SELECT * FROM fichiers WHERE id_user = ? ORDER BY id_fichier DESC');
$queryDocuments->execute(array($_SESSION['id_user']));
$documents = $queryDocuments->fetchAll();


// Récupération des fichiers avec tri 
$sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'id_fichier';
$sortOrder = 'DESC';

if ($sortOption === 'date') {
    $orderBy = 'date';
} elseif ($sortOption === 'taille') {
    $orderBy = 'taille';
} else {
    $orderBy = 'id_fichier';
}

$queryDocuments = $conn->prepare("SELECT * FROM fichiers WHERE id_user = ? ORDER BY $orderBy $sortOrder");
$queryDocuments->execute(array($_SESSION['id_user']));
$documents = $queryDocuments->fetchAll();


// Récupérer les types de fichiers
$queryTypes = $conn->prepare('SELECT * FROM types_fichier');
$queryTypes->execute();
$types = $queryTypes->fetchAll();

// Récupération du stockage utilisé par l'utilisateur
$queryStockageUsed = $conn->prepare('SELECT SUM(taille) as total FROM fichiers WHERE id_user = ?');
$queryStockageUsed->execute(array($_SESSION['id_user']));
$stockageUsed = $queryStockageUsed->fetch();
if ($stockageUsed['total'] == null) {
    $stockageUsed['total'] = 0;
    $stockageRestant = $userInfos['stockage'];
    $pourcentageStockage = 0;
} else if ($userInfos['stockage'] !== 0) {
    $stockageUsed = $stockageUsed['total'] / 1000000; // On convertit en Go
    $stockageRestant =  $userInfos['stockage'] - $stockageUsed;
    $pourcentageStockage = ($stockageUsed / $userInfos['stockage']) * 100;
} else {
    $stockageUsed = 0;
    $stockageRestant = 0;
    $pourcentageStockage = 0;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace | ArchiDocs</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/monEspace.css">
    <script src="../../js/navbar.js" defer></script>
    <link rel="shortcut icon" href="../../assets/ArchiDocs-Logo.png" />
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

    <div class="contenue monEspace">
        <div class="header-espace">
            <h1>Bienvenue sur votre espace</h1>
            <p>Retrouvez ici tout vos documents et ajoutez en d'autre si besoin</p>
        </div>

        <div class="liste-fichier">
            <div class="les-fichiers">
                <div class="stockage">
                    <div class="progress" style="color: black;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $pourcentageStockage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $pourcentageStockage; ?>%;">Utilisation de <?= $stockageUsed; ?>Go</div>
                        <?php if ($stockageRestant > 0) { ?>
                            Espace restant: <?= round($stockageRestant, 2); ?>Go
                        <?php } ?>
                    </div>
                    <div class="total-stock">
                        <h5>
                            Total: <?= $userInfos['stockage']; ?>Go
                        </h5>
                    </div>
                </div>
                <div class="div-btn-upload">

                    <!-- Trier les fichiers -->
                    <div class="tri-fichier">
                        <select name="tri" id="tri" class="btn btn-dark" onchange="updateSorting()">
                            <option value="default">Trier par...</option>
                            <option value="date">Date</option>
                            <option value="taille">Taille</option>
                        </select>
                        <select name="filtre" id="filtre" class="btn btn-dark">
                            <option value="all">Tous les types</option>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?= strtolower($type["libellé_type"]); ?>"><?= $type["libellé_type"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button data-bs-toggle="modal" data-bs-target="#uploadModal" class="btn btn-upload">Ajouter un document <i class="fas fa-file-upload"></i></button>
                </div>
                <!-- Barre de recherche -->
                <div class="search-bar mb-3">
                    <input type="text" class="form-control" placeholder="Rechercher un document">
                </div>
                <?php if (empty($documents)) : ?>
                    <div class="alert alert-warning" role="alert">
                        Vous n'avez pas de document pour le moment.
                    </div>
                <?php endif; ?>
                <?php foreach ($documents as $document) : ?>
                    <?php
                    $queryType = $conn->prepare('SELECT * FROM types_fichier WHERE id_type_fichier = ?');
                    $queryType->execute(array($document["id_type"]));
                    $type = $queryType->fetch();
                    ?>
                    <div class="fichier <?= strtolower($type["libellé_type"]); ?>">
                        <div class="fichier-img">
                            <?= $type["logo"] ?>
                            <small><?= $document["date"] ?></small>
                        </div>
                        <div class="fichier-info">
                            <h3><a href="<?= $document["chemin"] ?>"><?= $document["nom_fichier"] ?></a></h3>
                            <p>Document <?= $type["libellé_type"] ?></p>
                            <?php if (number_format($document["taille"] / 1073741824, 2) != 0.00) : ?>
                                <p>Taille: <?= number_format($document["taille"] / 1073741824, 2) ?> Go </p>
                            <?php else : ?>
                                <p>Taille: <?= number_format($document["taille"] / 1048576, 2) ?> Mo </p>
                            <?php endif; ?>
                        </div>
                        <div class="fichier-action">
                            <a href="<?= $document["chemin"] ?>" download="<?= $document['nom_fichier'] ?>" class="btn btn-dark">Télécharger <i class="bi bi-download"></i></a>
                            <form action="../../fonctions/clients/delDocument.php" method="post">
                                <input type="hidden" name="id_fichier" value="<?= $document["id_fichier"] ?>">
                                <button type="submit" class="btn btn-danger" name="del_document">Supprimer <i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade upload-modal" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Ajouter un document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body upload-form">
                    <form action="../../fonctions/clients/addDocument.php" enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du fichier</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Choisir un fichier</label>
                            <input type="file" class="form-control" id="file" name="file" accept="image/*, application/pdf, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, .ppt, .pptx, text/plain">
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_document">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php'; ?>
</body>

<script>
    //focntion de recherche fichiers par nom de fichier
    document.querySelector('.search-bar input').addEventListener('input', function() {
        var search = this.value.toLowerCase();
        var allFiles = document.querySelectorAll('.fichier h3');
        allFiles.forEach(file => {
            if (file.textContent.toLowerCase().includes(search)) {
                file.parentElement.parentElement.style.display = '';
            } else {
                file.parentElement.parentElement.style.display = 'none';
            }
        });
    });


    //fonction pour trier les fichiers
    function updateSorting() {
        const tri = document.getElementById('tri').value;
        window.location.href = `monEspace.php?sort=${tri}`;
    }
    //fonction pour filtrer les fichiers

    document.getElementById('filtre').addEventListener('change', function() {
        var type = this.value;
        var allFiles = document.querySelectorAll('.fichier');
        allFiles.forEach(file => {
            if (type === 'all' || file.classList.contains(type)) {
                file.style.display = '';
            } else {
                file.style.display = 'none';
            }
        });
    });
</script>

</html>