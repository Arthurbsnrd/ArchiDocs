<?php
    session_start();
    require ('../../fonctions/bdd.php');
    require '../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['addStockage'])) {
        $id = $_SESSION['id_user'];
        $addStockage = $conn->prepare('UPDATE users SET stockage = stockage + 20 WHERE id_user = ?');
        
        if ($addStockage->execute([$id])) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = getenv('MAIL_USERNAME');  
                $mail->Password = getenv('MAIL_PASSWORD');
                $mail->SMTPSecure = 'tls'; // tls SI TU PEU VERIFIER SI CEST BIEN CA
                $mail->Port = 587;  // PorT AUSSI A VERIFIER

                $mail->setFrom('from@example.com', 'Archidocs');
                $mail->addAddress($_SESSION['mail']); 

                $mail->isHTML(true);
                $mail->Subject = 'Confirmation de l\'ajout de stockage';
                $mail->Body = 'Merci pour votre achat, votre stockage a été augmenté de 20Go.';

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
