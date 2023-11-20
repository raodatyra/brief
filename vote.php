<?php
include("dbconnect.php"); // Inclure le fichier de connexion à la base de données

try {
    // Obtenir l'adresse IP de l'utilisateur
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // Adresse IP de l'appareil de l'utilisateur via le proxy
    } else {
        $ip = $_SERVER['REMOTE_ADDR']; // Adresse IP de l'appareil de l'utilisateur
    }

    $candidat_id = $_POST['id']; // ID du candidat choisi

    function aDejaVote($conn, $ip)
    {
        // Obtenez la date actuelle au format Y-m-d (année-mois-jour)
        $dateActuelle = date("Y-m-d");

        // Requête SQL pour vérifier si l'adresse IP a déjà voté aujourd'hui
        $sql = "SELECT COUNT(*) FROM vote WHERE ip = ? AND DATE(vote_date) = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$ip, $dateActuelle]);

        // Comptez le nombre de lignes retournées (0 si l'adresse IP n'a pas voté aujourd'hui, 1 ou plus sinon)
        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    function mettreAJourPointsCandidat($conn, $candidat_id)
    {
        // Requête SQL pour augmenter le nombre de points du candidat en fonction du vote
        $sql = "UPDATE candidat SET point = point + 1 WHERE id = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$candidat_id])) {
            // La mise à jour des points du candidat a réussi
        } else {
            die("Erreur lors de la mise à jour des points du candidat : " . implode(", ", $stmt->errorInfo()));
        }
    }

    // Vérification si l'adresse IP a déjà voté aujourd'hui (à implémenter)
    if (!aDejaVote($conn, $ip)) {
        // Enregistrement du vote dans la base de données
        $sql = "INSERT INTO vote (ip, candidat_id, vote_date) VALUES (?, ?, NOW())";

        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$ip, $candidat_id])) {
            // Mettre à jour le nombre de points du candidat (à implémenter)
            mettreAJourPointsCandidat($conn, $candidat_id);
            echo "Vote enregistré avec succès!";
        } else {
            echo "Erreur lors de l'enregistrement du vote : " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "Vous avez déjà voté aujourd'hui.";
    }
} catch (PDOException $e) {
    echo "l'erreur est:" . $e->getMessage();
}

$conn = null;
?>
