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
            <a href="" class="btn btn-success btn-achat-stock">Acheter plus de stockage</a>
            <p>
                Sinon vous pouvez supprimer vos fichiers inutiles pour libérer de l'espace.
            </p>
            <a href="" class="btn btn-dark  btn-achat-stock btn-look-fich">Consulter mes fichiers</a>
        </div>
        <div class="supp-compte">

        </div>
    </div>
</body>

</html>