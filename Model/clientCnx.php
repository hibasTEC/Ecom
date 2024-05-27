<?php
include("connexion.php");
class client{
    //connection à la base de donnée
    //insertion desclient après vérification  dans la base de donnée

    public function appClient($post){
        //se connecter à la db
        $connexion=new Connexion();
        $con=$connexion->con;
        //si le formulaire est soumis
        if($_POST){
            //récupérer les information du formulaire à partire de l'attribut name
            $v_nom = $_POST['nom'];
            $v_pseudo = $_POST['pseudo'];
            $v_mdp = $_POST['mdp'];
            //la req sql pour inserer le nouveau client
            $req="INSERT INTO client (id_Client, nom, pseudo, mdp) 
              values ('', '$v_nom',  '$v_pseudo', '$v_mdp')";
           //Executer la requette sql
            $result = $con->query($req);
        //si la requette est executer avec succes
        if($result){
            //Se dériger vers la bage de connection
            header("location:../View/seConnecter.php"); 
           
        }
        
        else{
            echo ' Erreur,Recommencer de nouveau ';
        }       
       
    }  
    }
    public function conClient($post){
        //ouvrire une session
        session_start();
        //se connecter à la base de donnée
        $connexion=new Connexion();
        $con=$connexion->con;
 //si le formulaire est soumis
if($_POST)
{
    //requette sql pour verifier la présence du pseudo dans la DB
    $Requette = "SELECT * FROM client WHERE pseudo='$_POST[pseudo]'";
    //Executer la requette
    $resultat=$con->query($Requette);
    //si le enregistrement existe dans la base de donnée 
    if(!($resultat->num_rows == 0))//num_rows Retourne le nombre de lignes 
    {   
        //récuperation de l'enregistrement sous forme de tableau associatif
        $membres = $resultat->fetch_assoc();
        //verifier si le mot de pas est correcte à celui entrer dans le formulaire
        if($membres['mdp'] == $_POST['mdp']) 
        {
           
            //stocker la valeur dans la variable  membres en utilisant le nom du champ comme clef
            
            foreach($membres as $clef => $champ)
            {
                if($clef != 'mdp')
                {
                    //$_SESSION permet de stocker des informations pour un utilisateur pendant la durée de sa visite sur le site.
                    //stocker tous les champs sauf le champ du mdp
                    $_SESSION['membres'][$clef] = $champ;
                }
            }

            header("location:../View/profil.php"); 
        }
        //si le mdp est incorrecte
        else
        {
            $affichage.= '<div>Votre mot de passe est incorrect</div>';
        }       
    }
    //sinon si le pseudo n'existe pas dans la DB
    else
    {
        $affichage.= '<div>Votre pseudo est incorrect</div>';
    }
    echo$affichage;
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//



    }
 } 

?>