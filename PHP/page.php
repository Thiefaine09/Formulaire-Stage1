

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
    <form method="post" action="">
        <input type="hidden" name="btnSubmit" value="1">
        <h3>Formulaire de Ticket (Eau de Paris)</h3>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="txtEmail" class="form-control" placeholder="Votre Email" value="" />
              <div id="error-message2"></div>

            </div>
            <div class="form-group">
              <input type="text" name="txtName" class="form-control" placeholder="Votre nom" value="" />
            </div>
            
            <div class="form-group mb-3">
              <select name="txtService" class="form-control" placeholder="Votre service" value="">
                <option value="Informatique">Service Informatique</option>
                <option value="Juridique">Service Juridique</option>
                <option value="RH">Service Resource Humaine</option>
                <option value="Communication">Service Communication</option>
                <option value="Clientéle">Service Clientéle</option>
              </select>
            </div>
            
            <div class="form-group">
              <input type="text" name="txtPhone" class="form-control" placeholder="Votre numéro de téléphone" value="" />
              <div id="error-message3"></div>

            </div>
            <div class="form-group">
              <input type="submit" name="btnSubmit" class="btnContact" value="Envoyer" />
              <div id="error-message"></div>

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
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "eaudeparis";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if(isset($_POST['btnSubmit'])) {
  $txtName = $_POST['txtName'];
  $txtEmail = $_POST['txtEmail'];
  $txtService = $_POST['txtService'];
  $txtPhone = $_POST['txtPhone'];
  $txtMsg = $_POST['txtMsg'];

  // Vérifier si l'email est valide
  if (!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) {
      echo "<script>document.getElementById('error-message2').innerHTML = 'Veuillez entrer une adresse e-mail valide !';</script>";
  } 
  // Vérifier si le numéro de téléphone est valide
  elseif (!preg_match("/^[0-9]{10}$/", $txtPhone)) {
      echo "<script>document.getElementById('error-message3').innerHTML = 'Veuillez entrer un numéro de téléphone valide !';</script>";
  }
  else {
      // Vérifier si tous les champs sont remplis
      if(empty($txtName) || empty($txtService) ||  empty($txtMsg)) {
        echo "<script>document.getElementById('error-message').innerHTML = 'Veuillez remplir tous les champs !';</script>";
      } else {
        // Insérer les données dans la base de données
        $sql = "INSERT INTO ticket (name, email, domaine, tel, message) VALUES ('$txtName', '$txtEmail','$txtService', '$txtPhone', '$txtMsg')";

        if (mysqli_query($conn, $sql)) {
            echo "Votre ticket a été soumis avec succès. Nous vous contacterons bientôt.";
        } else {
            echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
  }
}

// Fermer la connexion à la base de données
mysqli_close($conn);


?>

</body>
</html>