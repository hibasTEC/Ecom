<?php
//connexion à la base de donnée
include("connexion.php");

session_start();
class panier{
    //Ajouter le produit dans le panier
    //premier cas passer l id en param
    //ne pas passer l'id
    public function ajout_panier($id)
    {
        $connexion=new Connexion();
        $con=$connexion->getConnexion();

        $sql = "SELECT * FROM livre WHERE id = '$_GET[id]'";
        $result = $con->query($sql);
        //stocker l'enreg dan un tableau assoc
        $ligne = $result->fetch_assoc();
        return $ligne;
    }
    //Création du panier
    public function creationDuPanier()
    {
       //Création du panier
          $_SESSION['panier']=array();
          //Création des champs de panier
          $_SESSION['panier']['name'] = array();
          $_SESSION['panier']['id'] = array();
          $_SESSION['panier']['quantite'] = array();
          $_SESSION['panier']['prix'] = array();

       
    }
    //Ajouter le produit dans le panier
     public function ajoutProduit($name,$id,$quantite,$prix)
    {
        //verifier l'existance du produit dans le panier
        //utiliser arraySersh prend 2 paramètrel'élémentà chercher , où
	    $pos_pro = array_search($id,  $_SESSION['panier']['id']); 
       //return la position
        if ($pos_pro !== false)
        {//si le produit existe modifier la quantite
            $_SESSION['panier']['quantite'][$pos_pro] += $quantite ;
        }
        else 
        {//sinon ajouter le produit
            $_SESSION['panier']['name'][] = $name;
            $_SESSION['panier']['id'][] = $id;
            $_SESSION['panier']['quantite'][] = $quantite;
            $_SESSION['panier']['prix'][] = $prix;
        }
    }
    //Supprimer le produit à l'aide de l id
    public function retirerProduit($id)
    {   //chercher la position de de l'id
        $pos_pro = array_search($id,  $_SESSION['panier']['id']);
        if ($pos_pro !== false)
        {
            //suprimmer les info de l'id à retirer
            array_splice($_SESSION['panier']['name'], $pos_pro, 1);
            array_splice($_SESSION['panier']['id'], $pos_pro, 1);
            array_splice($_SESSION['panier']['quantite'], $pos_pro, 1);
            array_splice($_SESSION['panier']['prix'], $pos_pro, 1);
        }
    }
    //Vider le panier
    public function viderLePanier()
    {
        unset($_SESSION['panier']);

    }

    public function montantTotal()
    {
        $montant=0;
        //calcule du montant on passant les elements du panier dans la boucle
        for($elm = 0; $elm < count($_SESSION['panier']['id']); $elm++) 
        {               //calculer le montant en fct de la quentité et du prix 
            $montant += $_SESSION['panier']['quantite'][$elm] * $_SESSION['panier']['prix'][$elm];
        }
        return round($montant,2);
    }

    public function validerPaiement()
    {
        //seConnecter à la base de donnée
        $connexion=new Connexion();
        $con=$connexion->getConnexion();
        //passer les element du panier dans la boucle for
        for($elm=0 ;$elm < count($_SESSION['panier']['id']) ; $elm++) 
	    {
            $quant=$_SESSION['panier']['quantite'][$elm];
            $sql = "SELECT * FROM livre WHERE id=" . $_SESSION['panier']['id'][$elm];
            $result=$con->query($sql);
            $row = $result->fetch_assoc();
            $stock=$row['stock'];
            //stock-quantité
            $sql2="UPDATE livre set   stock=$stock-$quant WHERE id=" . $_SESSION['panier']['id'][$elm];
            $res=$con->query($sql2);
        }

    }


}

?>