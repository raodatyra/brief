<?php
// Configuration de la base de données
$serveur ="localhost"; // Adresse du serveur MySQL
$utilisateur = "spcom1_raoda"; // Nom d'utilisateur MySQL
$motDePasse = "VGtQ0jSQHNwc"; // Mot de passe MySQL
$bd = "spcom1_raodadb"; 
// Connexion à la base de données
try {
  $conn = new PDO("mysql:host=$serveur;dbname=$bd", $utilisateur, $motDePasse);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "erreur est:" . $e->getMessage();
}


?>