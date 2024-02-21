<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres | Mon espace</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/monEspace.css">
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
    
    <div class="contenue monEspace">
        <div class="header-espace">
            <h1>Bienvenue sur votre espace</h1>
            <p>Retrouvez ici tout vos documents et pourrez en ajouter d'autre</p>
        </div>
        <div class="div-btn-upload">
            <a href="" class="btn btn-upload">Ajouter un document <i class="fas fa-file-upload"></i></a>
        </div>
        <div class="liste-fichier">
            <div class="les-fichiers">
                <div class="fichier">
                    <div class="fichier-img">
                        <i class="fas fa-file-word"></i>
                        <small>03/02/2024</small>
                    </div>
                    <div class="fichier-info">
                        <h3><a href="">Document 1</a></h3>
                        <p>Document word</p>
                        <p>Taille: 25mo</p>
                    </div>
                    <div class="fichier-action">
                        <a href="" class="btn btn-dark">Télécharger <i class="bi bi-download"></i></a>
                        <a href="" class="btn btn-danger">Supprimer <i class="bi bi-trash"></i></a>
                    </div>
                </div>
                <div class="fichier">
                    <div class="fichier-img">
                        <i class="fas fa-file-pdf"></i>
                        <small>23/03/2024</small>
                    </div>
                    <div class="fichier-info">
                        <h3><a href="">Document 2</a></h3>
                        <p>Document pdf</p>
                        <p>Taille: 25mo</p>
                    </div>
                    <div class="fichier-action">
                        <a href="" class="btn btn-dark">Télécharger <i class="bi bi-download"></i></a>
                        <a href="" class="btn btn-danger">Supprimer <i class="bi bi-trash"></i></a>
                    </div>
                </div>
                <div class="fichier">
                    <div class="fichier-img">
                        <i class="fas fa-file-excel"></i>
                        <small>03/02/2024</small>
                    </div>
                    <div class="fichier-info">
                        <h3><a href="">Document 3</a></h3>
                        <p>Document excel</p>
                        <p>Taille: 25mo</p>
                    </div>
                    <div class="fichier-action">
                        <a href="" class="btn btn-dark">Télécharger <i class="bi bi-download"></i></a>
                        <a href="" class="btn btn-danger">Supprimer <i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>