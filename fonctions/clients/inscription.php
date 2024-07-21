<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../../vendor/autoload.php';
    
    session_start();
    require ('../../fonctions/bdd.php'); // Chemin en partant du fichier d'inscription (form en front)

    // Charger les variables d'environnement
    $dotenv = Dotenv\Dotenv::createImmutable('../../'); // Chemin vers le fichier .env
    $dotenv->load();

    // Validate the FORM
    if(isset($_POST['validate'])){
        //Check if the user filled the form.
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']))
        {
            //User's DATAS.
            $user_nom = htmlspecialchars($_POST['nom']);
            $user_prenom = htmlspecialchars($_POST['prenom']);
            $user_mail = htmlspecialchars($_POST['mail']);
            $user_password = $_POST['mdp'];
            $user_password_verif = $_POST['mdpconfirme'];
            //Check if the user already exists on the websit
            $checkIfUserAlreadyExists = $conn->prepare('SELECT mail FROM users WHERE mail = ? ');
            $checkIfUserAlreadyExists->execute(array($user_mail));

            if($checkIfUserAlreadyExists->rowCount() == 0)
            {
                // Verify if the password is the same
                if($user_password == $user_password_verif)
                {
                    // Hash du mdp après vérification
                    $user_password = password_hash($user_password, PASSWORD_DEFAULT);

                    //Insert the user on the database
                    $InsertUserOnWebsite = $conn ->prepare('INSERT INTO users(nom, prenom, mail, mdp) VALUES( ?, ?, ?, ?)');
                    $InsertUserOnWebsite->execute(array($user_nom, $user_prenom, $user_mail, $user_password));
    
                    //Get user's informations.
                    $GetInfosOfThisUser = $conn ->prepare('SELECT * FROM users WHERE mail = ?');
                    $GetInfosOfThisUser->execute(array($user_mail));
    
                    $usersInfos = $GetInfosOfThisUser->fetch();
    
                    $_SESSION['auth'] = true;
                    $_SESSION['id_user'] = $usersInfos['id_user'];
                    $_SESSION['nom'] = $usersInfos['nom'];
                    $_SESSION['prenom'] = $usersInfos['prenom'];
                    $_SESSION['mail'] = $usersInfos['mail'];
                    $_SESSION['role'] = $usersInfos['role'];
    
                    echo "Vous êtes inscrit sur le site";

                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = $_ENV['phpmailer_host'];                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = $_ENV['phpmailer_username'];                     //SMTP username
                        $mail->Password   = $_ENV['phpmailer_password'];                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = $_ENV['phpmailer_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom($_ENV['phpmailer_username'], $_ENV['phpmailer_from_name']);
                        $mail->addAddress($usersInfos['mail'], $usersInfos['prenom'] . ' ' . $usersInfos['nom']);     //Add a recipient

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Votre inscription chez ArchiDocs';
                        $mail->Body    = 'Bonjour, votre compte <b>Archidocs</b> à été créé avec succès !';

                        $mail->send();
                        echo 'Message Envoyé !';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
    
                    header("Location: offres.php");
                }
                else
                {
                    echo "Les mots de passe ne sont pas identiques $user_password ET $user_password_verif";
                }

            }
            else
            {
                $error_msg = "L'utilisateur existe déja sur le site";
            }
        }
        else
        {
            $error_msg = "Veuillez completer tous les champs...";
            echo $error_msg;
        }
    }


?>