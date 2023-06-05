<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'upload de fichiers</title>
</head>
<body>
    <form action="testImage.php" method="post" enctype="multipart/form-data">
        <h2>Upload Fichier</h2>
        <label for="fileUpload">Fichier:</label>
        <input type="file" name="photo" id="fileUpload">
        <input type="submit" name="submit" value="Upload">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
</body>
</html>

<?php

include("../conf/connexion.php");

function getAllImage() {
    try {
        // préparation de la requête
        $sql = "INSERT INTO photos (filename) VALUES (:filename)";
        $req_prep = Connexion::pdo()->prepare($sql);
        $req_prep->execute(array('filename' => $_FILES["photo"]["name"]));
        $tabResults = $req_prep->fetchAll();
        // renvoi du tableau de résultats
        return $tabResults;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die("Erreur lors de la recherche dans la base de données.");
    }
}

// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("Photos/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                $filePath = "Photos/" . $_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"], "Photos/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
                Connexion::connect();
                getAllImage($filePath);
                
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>