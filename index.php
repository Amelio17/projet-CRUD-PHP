<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
        
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>race</th>
                <th>pays</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            // Inclure la page de connexion
            include("connexion.php");

            // Requête pour afficher la liste des personnes dans le BDD
            $req = $connex->prepare("SELECT * FROM perso");

            // Vérification de la préparation de la requête
            if (!$req) {
                // Gestion de l'erreur ici 
                echo "Erreur lors de la préparation de la requête.";
            } else {
                // Exécution de la requête
                $req->execute();

                // Si la requête est vide 
                if ($req->rowCount() === 0) {
                    echo "Il n'y a pas encore de personne ajouté !";
                } else {
                    // Afficher la liste de personne à l' interface
                    while ($ligne = $req->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $ligne["nom"]; ?></td>
                            <td><?php echo $ligne["prenom"]; ?></td>
                            <td><?php echo $ligne["age"]; ?></td>
                            <td><?php echo $ligne["race"]; ?></td>
                            <td><?php echo $ligne["paysOrigine"]; ?></td>
                            <td>
                                <a href="modifier.php?id=<?php echo $ligne['id']; ?>">
                                    <img src="images/pen.png">
                                </a>
                            </td>
                            <td>
                                <a href="supprimer.php?id=<?php echo $ligne['id']; ?>">
                                    <img src="images/trash.png">
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
