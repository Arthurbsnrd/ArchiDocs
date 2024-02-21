<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres | Mon compte</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/monCompte.css">
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
    
    <div class="contenue monCompte">
        <div class="offre-actuelle">
            <div class="header-offre-actuelle">
                <div class="nom-offre-actuelle"><h5>Votre stockage disponible: </h5> </div>
                <div class="stockage">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">Utilisation de 15Go</div>
                        Espace restant: 5Go
                    </div>
                    <div class="total-stock">
                        Total: 20Go
                    </div>
                </div>
            </div>
        </div>
        <div class="plus-stockage">
            <h5>Vous désirez plus de stockage ?</h5>
            <p>
                Pour 20€ vous pouvez bénéficier de 20Go de stockage supplémentaire sur notre site, soit 1€ par giga et ceci à vie.
            </p>
            <a href="./offres.php" class="btn btn-success btn-achat-stock">Acheter plus de stockage</a>
            <p>
                Sinon vous pouvez supprimer vos fichiers inutiles pour libérer de l'espace.
            </p>
            <a href="" class="btn btn-dark  btn-achat-stock btn-look-fich">Consulter mes fichiers</a>
        </div>
        <div class="supp-compte">
            <h5>Supprimer mon compte</h5>
            <p>
                Vous pouvez supprimer votre compte à tout moment, cependant cette action est irréversible. <br>
                Vous perdrez l'ensemble de vos fichiers stockés sur notre site et ne pourrez plus les récupérer.
            </p>
            <button type="button" class="btn btn-danger btn-achat-stock" data-bs-toggle="modal" data-bs-target="#delCompte">Supprimer mon compte</button>

            <div class="modal fade" id="delCompte" tabindex="-1" aria-labelledby="delCompteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delCompteLabel">Suppression de compte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir supprimer votre compte ? <br>
                            Cette action est irréversible.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href="" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>