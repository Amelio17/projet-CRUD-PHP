<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Inclure la connexion à la base de données
include("connexion.php");

// Récupérer l'ID de la personne depuis le lien
$id = $_GET['id'];

// Requête pour afficher les informations d'une personne
$req = $connex->prepare("SELECT * FROM perso WHERE id = :id");
$req->bindParam(':id', $id);
$req->execute();
$row = $req->fetch(PDO::FETCH_ASSOC);

// Vérifier si le bouton de modification a été cliqué
if(isset($_POST['button'])){
    // Extraction des informations envoyées via la méthode POST
    extract($_POST);
    // Vérifier que tous les champs ont été remplis
    if(isset($nom) && isset($prenom) && isset($age) && isset($age) && isset($race ) && isset($paysOrigine)){
        // Requête de modification
        $req = $connex->prepare("UPDATE perso SET nom = :nom, prenom = :prenom, age = :age, race = :race, paysOrigine = :paysOrigine WHERE id = :id");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':age', $age);
        $req->bindParam(':race', $race);
        $req->bindParam(':paysOrigine', $paysOrigine);
        $req->bindParam(':id', $id);
        // Exécuter la requête
        if($req->execute()){
            // Redirection vers la page d'index si la modification est réussie
            header("location: index.php");
        } else {
            // Sinon, afficher un message d'erreur
            $message = " non modifié";
        }
    } 
}
?>

<div class="form">
    <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
    <h2>Modifier info d'une persome : <?= $row['nom'] ?></h2>
    <form action="" method="POST">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= $row['nom'] ?>">
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
        <label>Âge</label>
        <input type="number" name="age" value="<?= $row['age'] ?>">
        <label>race</label>
        <input type="text" name="race" value="<?= $row['race'] ?>">
        <label>pays</label>
        <input type="text" name="paysOrigine" value="<?= $row['paysOrigine'] ?>">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>
</body>
</html>
