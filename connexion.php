<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start(); // Démarrer la session

// Vérifier si l'utilisateur est déjà connecté, rediriger vers le tableau de bord si c'est le cas
if (isset($_SESSION['id']) && isset($_SESSION['nom_utilisateur'])) {
    // L'utilisateur est connecté, redirigez-le vers le tableau de bord
    header("Location: page.php");
    exit(); // Assurez-vous de sortir du script après la redirection
}
include("dbconnect.php");
// Inclure le fichier de connexion à la base de données

    // Vérification des informations de connexion de l'utilisateur
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $motDePasse = $_POST["password"];

        try {
            // Récupérer l'utilisateur avec l'adresse e-mail spécifiée
            $selectRequestUser = $conn ->prepare("SELECT * FROM inscription WHERE email = ?");
            $selectRequestUser->execute([$email]);
            $user = $selectRequestUser->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($motDePasse, $user["mdp"])) {
                // L'utilisateur est authentifié avec succès, enregistrez les informations de session
                $_SESSION['id'] = $user['id'];
                $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
    
                // Rediriger l'utilisateur vers le tableau de bord après la connexion
                header("Location: firstpage.php");
                exit();
            } else {
                header("Location: ../sq.php");
                $message = "Adresse e-mail ou mot de passe incorrect.";
                // echo $message;
            }
        } catch (PDOException $e) {
            header("Location: ../sq.php");
            die("Erreur lors de la connexion de l'utilisateur : " . $e->getMessage());
        }
}

// Fermer la connexion à la base de données

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <h2>Connexion</h2>
    <?php
    if (isset($erreur_message)) {
        echo "<p>$erreur_message</p>";
    }
    ?>
    <div id="formulaire">
        <form action="" method="post">
            <div class="imput">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required><br><br>
            </div>

            <div class="imput">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" id="password" name="password" required><br><br>
            </div>

            <input type="submit" value="Soumettre">
        </form>
    </div>
    <a href="inscription.php">
        s'inscrire
    </a>
</body>

</html>
?>

