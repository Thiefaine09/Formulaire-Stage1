<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
if (!empty($_POST)) {
  $prenom = htmlspecialchars($_POST['prenom']);
  $nom = htmlspecialchars($_POST['nom']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  $mail = new PHPMailer(true);
  try {
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'cpanel.illusioncloud.biz';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contact@therique.fr';                     //SMTP username
    $mail->Password   = 'HpOrlSq0UeJ6Yboa';                               //SMTP password
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = false;
    $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom('contact@therique.fr', 'Site portfolio'); //mets ton compte e-mail qui envoye les messages
    $mail->addAddress('thiefaine.sofiane@gmail.com', 'Thiefaine');     //ici tu mets to adresse e-mail ou tu veux recevoir les messages
    $mail->Subject = 'Vous avez recu un message sur votre site!';
    $mail->Body    = 'Vous avez recu un message de la part de ' . $prenom . ' ' . $nom . ' (' . $email . ') : ' . $message;
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->send();
    $output = 'Message envoye avec succes!';
  } catch (Exception $e) {
    $output = "Votre message n'a pas pu etre envoye. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="contact.css">
  <title>Contactez moi</title>
</head>

<body>
  <div class="container">
    <h1>Contactez moi </h1>
    <?php if (!empty($output)) {
      echo $output;
    } ?>
    <form method="post">
      <label for="fname">Prenom</label>
      <input type="text" id="prenom" name="prenom" placeholder="Votre prenom" required>
      <form action="">
        <label for="fname">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Votre Nom" required>


        <label for="emailAddress">Email</label>
        <input id="emailAddress" type="email" name="email" placeholder="Votre email" required>


        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Votre message" style="height:200px" required></textarea>

        <input type="submit" value="Envoyer">
      </form>
  </div>

</body>

</html>