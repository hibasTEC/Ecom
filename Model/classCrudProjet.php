<?php
include("connexion.php");
class livre{
//insertion des données
public function insert($post){
    //se connecter à la db
    $connexion=new Connexion();
    $con=$connexion->con;
    //récupéerer les donnée saisie dans le formulaire
        $v_genre = $_POST['genre'];
        $v_description = $_POST['description'];
        $v_prix = $_POST['prix'];
        $v_stock = $_POST['stock'];
  
  
   //vérifier si le formulaire a été transmis
    if(!empty($_FILES))
    {   //enregistrer le nom de la photo  
        $nom_photo = $_FILES['photo']['name']; 
       //le nom de la photo à stocker à la 
        $photo_bd = "photo/" . $nom_photo;	
        //contient le chemin complet du répertoire de destination où le fichier sera copié.
        $photo_dossier="C:/xampp/htdocs/Books/photo/".$nom_photo;
        //chemin d'acces temporaire du fichier sur le serveur 
        copy($_FILES['photo']['tmp_name'],$photo_dossier);            
    }
   
   
    $sql="INSERT INTO livre (id, genre, description, photo,
        prix, stock) values ('', '$v_genre',  '$v_description', '$photo_bd',
          '$v_prix',  '$v_stock')"; 
    $result = $con->query($sql);
    if($result){
        header("Location:../View/GestionDuProduit.php");        
    }
    else{
        echo 'Échec de l\'inscription, réessayez !';
    }       
   
    
}

 public function LiretoutLesproduit(){
    //se connecter à la base de donné
    $connexion=new Connexion();
    $con= $connexion->getConnexion();
    //la requette sql pour lire tout les produit
    $sql = "SELECT * FROM livre";
   
  
   $resultat = $con->query($sql);
      //récupérer les données d'une requête SQL
        if($resultat->num_rows > 0){
            //les stocker dans un tableau PHP,
            $data = array();
            //stocker chaque lignesous form de tableau assoc
            while($ligne = $resultat->fetch_assoc()){
                //stocker toute les ligne dans un tableau multidimentiinnel
                $data[] = $ligne;
            }

            return $data;
        }
   else{
    echo"vous avez 0 produit enregistrer";
   }
 }

//selectioner le produit à l'aide de son id
public function selectById($id){
    //se connecter à la base de donner à l'aide de la fct getConnexion qui permet d'instancier la connexion
    $connexion=new Connexion();
    $con=$connexion->getConnexion();
    // la requette sql pour 
    $new_query = "SELECT * FROM livre WHERE id = '$id'";
    //executer la requette
    $result = $con->query($new_query);
//verifier si il existe un enre 
    if($result->num_rows > 0){  
        //stocker l'enr sous form de taleau assoc
       $row = $result->fetch_assoc();
        return $row;
    }
    else{
        echo 'enregistrement non trouvé!';
    }
}
  
public function update($post){
    //Se connecter à la db
    $connexion=new Connexion();
    $con=$connexion->getConnexion();
    //recupérer les info à modifier 
    $v_id = $_POST['id'];
    $v_genre = $_POST['genre'];
    $v_description = $_POST['description'];
    $v_prix = $_POST['prix'];
    $v_stock = $_POST['stock'];
    
//vérifier si la photo à été télécharger
    if(!empty($_FILES['photo']['name']))
        {   
            $nom_photo = $_FILES['photo']['name']; // permet de recuperer le nom de la photo selectionné
        
            $photo_bdd = "photo/" . $nom_photo;	//le lien à stocker dans la DB
            //le lien vers le répértoire pour récupérer l 'image    
            $photo_dossier="C:/xampp/htdocs/Books/photo/".$nom_photo;
            //chemin d'acces temporaire du fichier sur le serveur 
            copy($_FILES['photo']['tmp_name'],$photo_dossier); 
        //si les deux variables (id/sont pas vide 
            if(!empty($v_id) && !empty($post)){
              //
                $sql = "UPDATE livre SET 
                  genre = '$v_genre',
                  description ='$v_description',
                  prix = '$v_prix',
                  stock = '$v_stock',        
                  photo = '$photo_bdd' WHERE id = '$v_id'";
                                   
                $result = $con->query($sql);
                if($result){
                                      
                    header("Location:../View/GestionDuProduit.php");
                    //echo"CLIENT MODIFIER AVEC SUCESS";
                }else{
                    echo 'Échec de la mise à jour, réessayez!';
                }
            } 
        }
        else{
           
            if(!empty($v_id) && !empty($post)){
                
              
                $sql = "UPDATE livre SET 
                genre = '$v_genre',
                description ='$v_description',
                prix = '$v_prix',
                stock = '$v_stock',        
                photo = '$photo_bdd' WHERE id = '$v_id'";

                $result = $con->query($sql);
                if($result){
                     echo 'Object updated successfully! <br/>';
                    // Redirect to index.php                  
                    //header("Location:../View/index_pro.php");
                }else{
                    echo 'Failed to update, try again!';
                }
            }

        }
}

//supprimer
public function Supprimer($id){
    $connexion=new Connexion();
    $con=$connexion->getConnexion();

    $sql = "DELETE FROM livre WHERE id = '$id'";
    $result = $con->query($sql);

    if($result){            
        header("Location:../View/GestionDuProduit.php");
    }
    else{
        echo 'le livre n\'est pas supprimé';
    }
}


}
?>