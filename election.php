<?php

include("./assets/includes/head.php");
include("./assets/includes/header.php");
include("./assets/includes/config.php");
if (!isset($_SESSION['login'])) {
  header ('Location: login.php');
  exit();
}

$mysqli = new mysqli("172.16.196.254", "aimericv", "aimericv", "cybervoteaimericv");
$mysqli->set_charset("utf8");
$requete = "SELECT * FROM Election";
$resultat = $mysqli->query($requete);


while ($ligne = $resultat->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $ligne['nom_election'] . '</td>';
  echo' ';
  echo '<td>' . $ligne['date_election'] . '</td>';
  echo '<td>
        <form action="vote.php?id_election=' . $ligne['id_election'] . '" method="post">
          <input type="submit" class="btn btn-primary" name="' . $ligne['Id_candidat'] . '" value="Vote">
        </form>
      </td>';
  echo '</tr>';
}




  

 

?>