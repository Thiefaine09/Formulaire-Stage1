

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eau de Paris | Formulaire Utilisateur - Ticket</title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../PHP/style.css">

</head>
<body>
  <div class="animation">
  <div class="container contact-form">
     
    <div class="contact-image">
      <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
    </div>
    <input type="hidden" name="btnSubmit" value="1">
      <form method="post" action="">
        <h3>Formulaire de Ticket (Eau de Paris)</h3>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="txtEmail" class="form-control" placeholder="Votre Email" value="" />
            </div>
            <div class="form-group">
              <input type="text" name="txtName" class="form-control" placeholder="Votre nom" value="" />
            </div>
            
            <div class="form-group mb-3">
              <select name="txtService" class="form-control" placeholder="Votre service" value="">
                <option value="service">Service Informatique</option>
                <option value="service1">Service Juridique</option>
                <option value="service2">Service Resource Humaine</option>
                <option value="service3">Service Communication</option>
                <option value="service4">Service Clientéle</option>
              </select>
            </div>
            
            <div class="form-group">
              <input type="text" name="txtPhone" class="form-control" placeholder="Votre numéro de téléphone" value="" />
            </div>
            <div class="form-group">
              <input type="submit" name="btnSubmit" class="btnContact" value="Envoyer" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea name="txtMsg" class="form-control" placeholder="Quelles est votre probléme ?" style="width: 100%; height: 150px;"></textarea>
            </div>
          </div>
        </div>
      </form>
</div>
<?php
if(isset($_POST['btnSubmit'])) {
    $to = "thiefaine.sofiane@gmail.com";
    $subject = "Nouveau ticket soumis";
    $txtName = $_POST['txtName'];
    $txtEmail = $_POST['txtEmail'];
    $txtService = $_POST['txtService'];
    $txtPhone = $_POST['txtPhone'];
    $txtMsg = $_POST['txtMsg'];
    $message = "Nom: ".$txtName."\nEmail: ".$txtEmail."\nService: ".$txtService."\nTéléphone: ".$txtPhone."\nMessage: ".$txtMsg;
    $headers = "From: ".$txtEmail;

    mail($to,$subject,$message,$headers);

    echo "Votre ticket a été soumis avec succès. Nous vous contacterons bientôt.";
}
?>

</body>
</html>