<?php
// Connexion à la base de données
include ("connexion.php") ;

// Récupération de l'ID depuis le lien
$id = $_GET['id'];

// Requête de suppression
$req = $connex->prepare("DELETE FROM perso WHERE id = :id");
$req->bindParam(':id', $id);
$req->execute();

// Redirection vers la page index.php
header("Location: index.php");
?>
