<?php
  require_once '../conf/connexion.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT prenom FROM utilisateur WHERE prenom LIKE :input_prenom';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['input_prenom' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['prenom'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>