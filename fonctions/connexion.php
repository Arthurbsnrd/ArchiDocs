<?php 
    session_start();
    require ('./fonctions/bdd.php'); // Chemin en partant du fichier d'inscription (form en front)

    if (isset($_POST['connexion'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if (!empty($username) AND !empty($password)) {
            $checkIfUserExists = $conn->prepare('SELECT * FROM users WHERE mail = ?');
            $checkIfUserExists->execute(array($username));
            $userInfos = $checkIfUserExists->fetch();

            if ($checkIfUserExists->rowCount() == 1) {
                if (password_verify($password, $userInfos['mdp'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $userInfos['id'];
                    $_SESSION['nom'] = $userInfos['nom'];
                    $_SESSION['prenom'] = $userInfos['prenom'];
                    $_SESSION['mail'] = $userInfos['mail'];

                    header('Location: ./pages/clients/offres.php');
                } else {
                    echo "Le mot de passe est incorrect";
                }
            } else {
                echo "L'utilisateur n'existe pas";
            }
        } else {
            echo "Veuillez remplir tous les champs";
        }
    }
