<?php
<<<<<<< HEAD
    session_start();
    require ('../../fonctions/bdd.php');
    require '../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
=======
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require('../../vendor/phpmailer/phpmailer/src/Exception.php');
    require('../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
    require('../../vendor/phpmailer/phpmailer/src/SMTP.php');


    //Load Composer's autoloader
    require '../../vendor/autoload.php';


    session_start();
    require ('../../fonctions/bdd.php');

    // Charger les variables d'environnement
    $dotenv = Dotenv\Dotenv::createImmutable('../../');
    $dotenv->load();

    $id_user = $_SESSION['id_user'];

    // Récupérer toutes les informations de l'utilisateur
    $queryUser = $conn->prepare('SELECT * FROM users WHERE id_user = ?');
    $queryUser->execute(array($id_user));
    $userInfos = $queryUser->fetch();

>>>>>>> 3ad3e5a36674a82f3361d20f2279db1effa22904

    if (isset($_POST['addStockage'])) {
        $id = $_SESSION['id_user'];
        $addStockage = $conn->prepare('UPDATE users SET stockage = stockage + 20 WHERE id_user = ?');
        
        if ($addStockage->execute([$id])) {
            $mail = new PHPMailer(true);
            try {
<<<<<<< HEAD
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = getenv('MAIL_USERNAME');  
                $mail->Password = getenv('MAIL_PASSWORD');
                $mail->SMTPSecure = 'tls'; // tls SI TU PEU VERIFIER SI CEST BIEN CA
                $mail->Port = 587;  // PorT AUSSI A VERIFIER

                $mail->setFrom('from@example.com', 'Archidocs'); // mail   anaselkhiat78@gmail.com ?
                $mail->addAddress($_SESSION['mail']); 

                $mail->isHTML(true);
                $mail->Subject = 'Confirmation de l\'ajout de stockage';
                $mail->Body = 'Merci pour votre achat, votre stockage a été augmenté de 20Go.';
=======
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $_ENV['phpmailer_host'];                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $_ENV['phpmailer_username'];                     //SMTP username
                $mail->Password   = $_ENV['phpmailer_password'];                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = $_ENV['phpmailer_port'];   

                $mail->setFrom($_ENV['phpmailer_username'], $_ENV['phpmailer_from_name']);
                $mail->addAddress($userInfos['mail'], $userInfos['prenom'] . ' ' . $userInfos['nom']);     //Add a recipient

                $mail->isHTML(true);
                $mail->Subject = 'Confirmation d\'achat de stockage';
                $mail->Body = 'Merci pour votre achat, votre stockage a été augmenté de 20Go avec succès !';
>>>>>>> 3ad3e5a36674a82f3361d20f2279db1effa22904

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            require ('./genFacture.php');
            header("Location: ../../pages/clients/monCompte.php");
        } else {
            echo "Erreur lors de l'ajout de stockage";
        }
    }
?>
