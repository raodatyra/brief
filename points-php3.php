<?php
        try {

          include "dbconnect.php";
        
        $requete = $conn->query("SELECT * FROM candidat WHERE nomine = 'producteur_contenu'");


        // Récupérer les résultats de la requête sous forme d'un tableau associatif
        $candidats = $requete->fetchAll(PDO::FETCH_ASSOC);

        // Afficher les candidats dans une liste
        foreach ($candidats as $candidat) {
      ?>
          <div class="candidats">
            <div class="categories">
              <div class="top"></div>
            </div>
            <div class="candidatinfo">
              <h2><?= $candidat['nom_prenom'] ?></h2>
              <div class="nbrvote"><?= $candidat['point'] ?></div>
              <br>
              <form action="vote.php" method="POST">
                <input type="hidden" name="id" value="<?= $candidat['id'] ?>">
                <button type="submit" class="btnvote" name="vote">VOTEZ ICI</button>
              </form>
            </div>
          </div>

      <?php
          // echo "<li>Nom : " . $candidat['nom_prenom'] . " - Points : " . $candidat['point'] . "</li>";
        }
      } catch (PDOException $e) {
        // En cas d'erreur de connexion à la base de données, afficher un pop-up d'erreur
        echo "<script>-
      Swal.fire({
          title: 'Erreur!',
          text: 'Une erreur est survenue lors de la connexion à la base de données.',
          icon: 'error',
          confirmButtonText: 'OK'
      });
  </script>";
      }
        ?>