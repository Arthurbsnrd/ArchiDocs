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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

    <!-- Lien vers la modal des CGU -->
    <div class="text-center mt-3">
        <p><a href="#" id="cgu-link" class="text-primary">Conditions Générales d'Utilisation</a></p>
    </div>

    <!-- Modal pour afficher les CGU -->
    <div class="modal fade" id="cguModal" tabindex="-1" aria-labelledby="cguModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cguModalLabel">Conditions Générales d'Utilisation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include '../../fonctions/clients/cgu.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-0z2PY86A1ZR8BbJ6J3ONISL7Yk96RmtqNBH+LOzI5mds8VJY6k9A8R7q8yKt6w2m" crossorigin="anonymous"></script>
    <script>
        document.getElementById('cgu-link').addEventListener('click', function(event) {
            event.preventDefault();
            var cguModal = new bootstrap.Modal(document.getElementById('cguModal'));
            cguModal.show();
        });
    </script>
</body>

</html>
