<?php
include('../Model/classcrudProjet.php');
// Création d'un nouvel objet client
if(isset($_GET['id']))
{ // Vérifier si l'id du client a été transmis en paramètre dans l'URL 
    $v_id = $_GET['id'];
    $livre = new livre();
    $livre->Supprimer($v_id);
}
else{
    echo'id du livre est introuvable';
}
?>