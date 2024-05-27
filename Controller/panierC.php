<?php
include '../Model/panierM.php';
$panier=new panier();
//creer le panier lors du click sur

if(isset($_POST['ajout_panier']))//verifie si le champ panier existe dans les données soumis par la méthode POST
{   
    //ajouter l'article au pannier si le panier est déja créer 
    $produit=$panier->ajout_Panier($_GET['id']);
    //si le panier n'est pas créer  -->
    if (!isset($_SESSION['panier']))
    {
        $panier->creationDuPanier();
    } //Ajouter le produit dans le panier
    $panier->ajoutProduit($produit['genre'],$_GET['id'],$_POST['quantite'],$produit['prix']);
}

//retirer un produit du panier
if(isset($_GET['action']) && $_GET['action'] == "supp")
{
	$panier->retirerProduit($_GET['id']);
}

//vider le panier 
if((isset($_GET['action']) && $_GET['action'] == "viderPanier"))
{
	$panier->viderLePanier();
}

//MAJ de stock dans la base de données
if(isset($_POST['payement']))
{
    $produit=$panier->validerPaiement();
    $panier->viderLePanier();
}
?>