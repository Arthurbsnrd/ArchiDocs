<?php 
include '../../fonctions/security.php'; 
include '../../fonctions/bdd.php';

// Ici on va récupérer les infos de l'utilisateur connecté pour les afficher

$queryUser = $conn->prepare('SELECT * FROM users WHERE id_user = ?');
$queryUser->execute(array($_SESSION['id_user']));
$userInfos = $queryUser->fetch();


$queryStockageUsed = $conn->prepare('SELECT SUM(taille) as total FROM fichiers WHERE id_user = ?');
$queryStockageUsed->execute(array($_SESSION['id_user']));
$stockageUsed = $queryStockageUsed->fetch();
$stockageUsed = $stockageUsed['total'] / 1000000; // On convertit en Go

$stockageRestant =  $userInfos['stockage'] - $stockageUsed;

// Récupérer les factures de l'utilisateur
$queryFactures = $conn->prepare('SELECT * FROM factures WHERE id_user = ?');
$queryFactures->execute(array($_SESSION['id_user']));
$factures = $queryFactures->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte | ArchiDocs</title>
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
        <div class="monCompte-element msg-bienvenue">
            <h3>
                Bienvenue sur votre compte <?php echo $userInfos['nom'] . " " . $userInfos['prenom']; ?>
            </h3>
            <?php if ($userInfos['role'] == "admin") { ?>
                <p>
                    Vous êtes administrateur, vous pouvez gérer les utilisateurs et les documents.
                </p>
            <?php } else { ?>
                <p>
                    Vous êtes utilisateur, vous pouvez consulter vos documents et gérer votre compte.
                </p>
            <?php } ?>
        </div>
        <div class="offre-actuelle monCompte-element">
            <div class="header-offre-actuelle">
                <div class="nom-offre-actuelle"><h5>Votre stockage disponible: </h5> </div>
                <div class="stockage">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $stockageUsed;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $stockageUsed; ?>%">Utilisation de <?php echo $stockageUsed; ?>Go</div>
                        Espace restant: <?php echo $stockageRestant; ?>Go
                    </div>
                    <div class="total-stock">
                        Total: <?php echo $userInfos['stockage']; ?>Go
                    </div>
                </div>
            </div>
        </div>
        <div class="plus-stockage monCompte-element">
            <h5>Vous désirez plus de stockage ?</h5>
            <p>
                Pour 20€ vous pouvez bénéficier de 20Go de stockage supplémentaire sur notre site, soit 1€ par giga et ceci à vie.
            </p>
            <a href="./offres.php" class="btn btn-success btn-achat-stock">Acheter plus de stockage</a>
            <p>
                Sinon vous pouvez supprimer vos fichiers inutiles pour libérer de l'espace.
            </p>
            <a href="./monEspace.php" class="btn btn-info  btn-achat-stock btn-look-fich">Consulter mes fichiers</a>
        </div>
        <div class="factures monCompte-element">
            <h5>Factures</h5>
            <p>
                Vous avez <?= count($factures); ?> factures.
            </p>
            <span  style="width: 100%; display: flex; justify-content: flex-end;">
                <button class="btn btn-dark" id="toggle_facture"><i class="fas fa-chevron-down"></i></button>
            </span>
            <?php if (count($factures) > 0) : ?>
                <table class="table table-striped" id="factures_table">
                    <thead>
                        <tr>
                            <th scope="col">Numéro de facture</th>
                            <th scope="col">Date</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Télécharger</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($factures as $facture) : ?>
                            <tr>
                                <td>
                                    <?= $facture['nom_facture'] ?>
                                </td>
                                <td><?= $facture['date'] ?></td>
                                <td><?= $facture['prix_ttc'] ?> €</td>
                                <td>
                                    <a href="../../facturesClient/<?= $userInfos['nom'].$userInfos['prenom'] ?>/<?= $facture["nom_facture"]?>.pdf" download="<?= $facture['nom_facture'].$userInfos["nom"].$userInfos["prenom"] ?>" class="btn btn-dark">Télécharger <i class="bi bi-download"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div class="supp-compte monCompte-element">
            <h5>Supprimer mon compte</h5>
            <p>
                Vous pouvez supprimer votre compte à tout moment, cependant cette action est irréversible. <br>
                Vous perdrez l'ensemble de vos fichiers stockés sur notre site et ne pourrez plus les récupérer.
            </p>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delCompte">Supprimer mon compte</button>

        </div>
    </div>
    <div class="modal fade" id="delCompte" tabindex="-1" aria-labelledby="delCompteLabel" aria-hidden="true" style="color: black;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delCompteLabel">Suppression de compte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer votre compte ? <br>
                    Cette action est irréversible et supprimera toutes vos données.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <a href="../../fonctions/delCompte.php" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <?php include '../clients/cgu.php'; ?> -->
</body>
<script>
    // Fonction pour afficher/masquer les factures
    function toggle_facture() {
        const facture = document.getElementById('factures_table');
        if (facture.style.display === 'none') {
            facture.style.display = '';
        } else {
            facture.style.display = 'none';
        }
    }
    document.getElementById('toggle_facture').addEventListener('click', toggle_facture);
</script>
</html>