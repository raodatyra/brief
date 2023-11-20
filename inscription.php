<?php

if (isset($_SESSION['utilisateur_id']) && isset($_SESSION['name'])) {
  // L'utilisateur est connecté, redirigez-le vers le tableau de bord
  header("Location: ./view/page.php");
  exit(); // Assurez-vous de sortir du script après la redirection
}
include("dbconnect.php"); 
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $motDePasse = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hasher le mot de passe
  $email = $_POST["email"];

  try {
  // Vérifier si l'adresse e-mail est déjà utilisée
        $requete_email_existe = $conn->prepare("SELECT * FROM inscription WHERE email = ?");
        $requete_email_existe->execute([$email]);

        if ($requete_email_existe->rowCount() > 0) {
            header("Location: ../sq.php");
            $message = "L'adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
        } else {
            // Insérer un nouvel utilisateur dans la base de données
            $requete_insert_utilisateur = $conn->prepare("INSERT INTO inscription (nom, prenoms, mdp, email) VALUES (?, ?, ?, ?)");
            $requete_insert_utilisateur->execute([$nom, $prenom, $motDePasse , $email]);

            // Rediriger l'utilisateur vers la page de connexion après l'inscription
            header("Location: connexion.php");
            exit();

  //$sql = "INSERT INTO inscription (nom, prenoms, mdp, email) VALUES ('$nom', '$prenom', '$motDePasse', '$email')";
  //$conn->exec($sql);

}
} 
catch(PDOException $e) {
  die("Erreur lors de l'inscription de l'utilisateur : " . $e->getMessage());
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Formulaire d'inscription</h1>
    <div id="formulaire">
    <form action="" method="post">
        <div class="imput">
          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom" required><br><br>
        </div>
        
        <div class="imput">
          <label for="prenom">Prénom :</label>
          <input type="text" id="prenom" name="prenom" required><br><br>
        </div>
        
       <div class="imput">
          <label for="motdepasse">Mot de passe :</label>
          <input type="password" id="password" name="password" required><br><br>
       </div>
        
        <div class="imput">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" required><br><br>
        </div>
        
        <input type="submit" value="Valider">
    </form>
    </div>
    <a href="connexion.php">se connecter</a>
</body>
</html>




