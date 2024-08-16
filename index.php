<?php require ('./fonctions/connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | ArchiDocs</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="shortcut icon" href="./assets/ArchiDocs-Logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3181ebab68.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body class="authentication-bg pb-0">

    <div class="login-page">
        <!--Auth fluid left content -->
        <div class="login-form">
            <div class="card-body d-flex flex-column h-100 gap-3">
                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="" class="logo">
                        <span><img src="assets/ArchiDocs-Logo.png" alt="logo" height="33"></span>
                    </a>
                </div>

                <div class="my-auto">
                    <!-- title-->
                    <h4 class="mt-0">Connexion</h4>
                    <p class="text-muted mb-4">Entrez votre adresse e-mail et votre mot de passe pour accéder au compte.</p>

                    <!-- form -->
                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label required" for="username">Adresse e-mail</label>
                            <input type="text" id="username" name="username" required="required" class="form-control" placeholder="Entrez votre adresse e-mail">
                        </div>

                        <div class="mb-3">
                            <label class="form-label required" for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" required="required" class="form-control" placeholder="Entrez votre mot de passe">
                        </div>

                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary btn-login" type="submit" name="connexion"><i class="fa-solid fa-right-to-bracket"></i> Se connecter</button>
                        </div>
                    </form>
                    <small>
                        <p class="text-center mt-3">Vous n'avez pas de compte ? <a href="./pages/clients/inscription.php" class="text-primary">S'inscrire</a></p>
                        <!-- Lien pour ouvrir la modal CGU -->
                        <p class="text-center mt-1"><a href="#" id="cgu-link" class="text-primary">Conditions Générales d'Utilisation</a></p>
                    </small>
                    <!-- end form-->
                </div>

                <!-- Footer-->
                <footer class="footer footer-alt">
                </footer>

            </div> <!-- end .card-body -->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="login-texte">
            <div class="login-description">
                <h2 class="mb-3">ArchiDocs</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> Gérer vos fichiers avec efficacité et sécurité ! <i class="mdi mdi-format-quote-close"></i>
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->

    <!-- Modal pour les CGU -->
    <div class="modal fade" id="cguModal" tabindex="-1" aria-labelledby="cguModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cguModalLabel">Conditions Générales d'Utilisation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include './fonctions/clients/cgu.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour afficher la modal CGU
        document.getElementById('cgu-link').addEventListener('click', function(event) {
            event.preventDefault();
            var cguModal = new bootstrap.Modal(document.getElementById('cguModal'));
            cguModal.show();
        });
    </script>

</body>

</html>
