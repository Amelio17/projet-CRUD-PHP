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
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyées dans des variables par la méthode POST
           extract($_POST);
           //vérifier que tous les champs ont été remplis
           if(isset($nom) && isset($prenom) && isset($age) && isset($race) && isset($paysOrigine)){
                //connexion à la base de données
                include ("connexion.php") ;
                //requête d'ajout
                $req = $connex->prepare("INSERT INTO perso (nom, prenom, age, race, paysOrigine) VALUES (:nom, :prenom, :age, :race, :paysOrigine)");
                // Liaison des paramètres nom, prenom, age et race
                $req->bindParam(':nom', $nom);
                $req->bindParam(':prenom', $prenom);
                $req->bindParam(':age', $age);
                $req->bindParam(':race', $race);
                $req->bindParam(':paysOrigine', $paysOrigine);
                // Exécution de la requête
                if($req->execute()){
                    // si la requête a été effectuée avec succès, on fait une redirection
                    header("location: index.php");
                } else {
                    $message = "non ajouté";
                }
           } 
       }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>ajouter une personne</h2>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Âge</label>
            <input type="number" name="age">
            <label>Race</label>
            <input type="text" name="race">
            <label>Pays</label>
            <input type="text" name="paysOrigine">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>
