<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | ArchiDocs</title>
    <link rel="stylesheet" href="../../styles/index.css">
    <link rel="shortcut icon" href="../../assets/ArchiDocs-Logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3181ebab68.js" crossorigin="anonymous"></script>
</head>

<body class="authentication-bg pb-0">

    <div class="login-page">
        <!-- Auth fluid left content -->
        <div class="login-form">
            <div class="card-body d-flex flex-column h-100 gap-3">
                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="#" class="logo">
                        <span><img src="../../assets/ArchiDocs-Logo.png" alt="logo" height="33"></span>
                    </a>
                </div>

                <div class="my-auto">
                    <!-- title-->
                    <h4 class="mt-0">Inscription</h4>
                    <p class="text-muted mb-4">Entrez vos informations afin de créer votre compte</p>

                    <!-- form -->
                    <form method="post" action="" onsubmit="return checkPassword(this)">
                        <div class="mb-3">
                            <label class="form-label required" for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" required="required" class="form-control" placeholder="Entrez votre nom">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label required" for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" required="required" class="form-control" placeholder="Entrez votre prénom">
                        </div>

                        <div class="mb-3">
                            <label class="form-label required" for="mail">Adresse e-mail</label>
                            <input type="text" id="mail" name="mail" required="required" class="form-control" placeholder="Entrez votre adresse e-mail">
                        </div>

                        <div class="mb-3">
                            <label class="form-label required" for="mdp">Mot de passe</label>
                            <input type="password" id="mdp" name="mdp" required="required" class="form-control" placeholder="Entrez votre mot de passe">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label required" for="mdpconfirme">Confirmer votre mot de passe</label>
                            <input type="password" id="mdpconfirme" name="mdpconfirme" required="required" class="form-control" placeholder="Confirmer votre mot de passe">
                        </div>

                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary btn-login" type="submit" name="validate"><i class="fa-solid fa-user-plus"></i> S'inscrire</button>
                        </div>
                    </form>
                    <small>
                        <p class="text-center mt-3">Vous avez déjà un compte ? <a href="../../index.php" class="text-primary">Se connecter</a></p>
                    </small>
                    <!-- end form-->
                </div>

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <div class="text-center">
                        <p><a href="#" id="cgu-link" class="text-primary" data-bs-toggle="modal" data-bs-target="#cguModal">Conditions Générales d'Utilisation</a></p>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour vérifier si les mots de passe sont identiques
        function checkPassword(form) {
            const password1 = form.mdp.value;
            const password2 = form.mdpconfirme.value;

            // Si les mots de passe sont identiques
            if (password1 === password2) {
                return true;
            } else {
                alert("Les mots de passe ne sont pas identiques");
                return false;
            }
        }
    </script>
</body>

</html>
