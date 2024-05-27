

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du Produit</title>
     <link rel="stylesheet" href="../CSS/moncss.css"> 
     <link rel="stylesheet" href="../CSS/styleFront.css"> 


</head>
<body style="background-color:black;" >
<div class="circle"></div>
            <header>
            <div class="hero">
    <nav>
        <h2 class="logo" style="color:rgb(140, 255, 0);"> HibaBooks</h2>
        <ul>
        <li><a>Home</a></li>
        <li><a href="../View/accueil.php">All Books</a></li>
        <li><a href="../View/choix.php">Books Categorie</a></li>
        <li><a href="Panier.php">
                        <img src="../images/panier.png" width="20px" height="20px">
                    </a></li>
        </ul>
        
    </nav>
</div>  

<!-- class="container" -->
    <div style="align-items:center;
    justify-content:center; 
    min-height: 100vh;
    position:relative;
    margin-left:50px;
    margin-top:50px"; >
        <a href="choix.php" class="Btn_add"><img style="width: 25px;color : white;" src="../images/add.png">Ajouter un produit au panier</a>
   <centre> <h2 style="color:white;"> Votre panier</h2>
        <table style="border:2px solid white;background-color:white;
         border-spacing: 0;
  border-collapse: separate;
  border-radius: 10px;">
        <thead>
        <tr id="items">
            <th>Livre  </th>
           
            <th> Quantité  </th>
            <th> Prix </th>
            <th> Action</th>
           
        </tr>
        </thead>
       
        <tbody> 

        <?php
                  
                  include '../Controller/panierC.php';
                  //Cas où le panier est vide 
                  if(empty($_SESSION['panier']['id'])) 
                  {
                      echo "<tr><td >aucun produit </td></tr>";
                      echo "<tr><td ><a href='../View/accueil.php'>continuer vos achats</a></td></tr>";
                  }                  
                    
                  else
                  {
                      for($i = 0; $i < count($_SESSION['panier']['id']); $i++) 
                      
                      {?>
                           <tr>
                          <td> <?php echo $_SESSION['panier']['name'][$i]?></td>;
                          <td> <?php echo  $_SESSION['panier']['quantite'][$i] ?></td>;
                          <td> <?php echo $_SESSION['panier']['prix'][$i] ?></td>;
                          <?php
                          echo '<td><a href="?action=supp&id=' . $_SESSION['panier']['id'][$i] .'">Supprimer</a></td>';
                          echo '</tr>';
                          
                      }
                  
                      echo "<tr><th colspan='3'>Total</th><td colspan='2'>" .$panier->montantTotal() . " dollars</td></tr>";
                      echo '<form method="post" action="">';
                          echo '<tr><td colspan="4">
                          <centre><input style="width:1250px;" type="submit" name="payement" value="Valider  le paiement" />
                          </center></td></tr>';
                          echo '</form>';	
                  
                          
                      
                  
                  echo "</table><br />";
                  
                 }

                ?>
               <div style="align-items:center;
                justify-content:center; 
                min-height: 100vh;
                position:relative;
                
                margin-top:50px"; >
        <a href='?action=viderPanier' class="Btn_add">Vider le panier</a>
     

               
        </tbody>    

    </table>
    </centre>
    </div>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <title>HibaBooks</title>
    <link rel="stylesheet"  href="../CSS/stylePan.css"/>
</head>
<body>
    <a href="#" class="link">Panier <span>8</span></a>
    <centre>
    <section class="products_list">
            <table>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Prix</th>
                    <th>Action</th>

                </tr>
                <tr>
                        <td><img src="" alt=""></td>
                        <th>meat</th>
                        <th>12 $</th>
                        <th>5</th>
                        <th><img src="../images/delete.png" style="width: 40px;" alt=""></th>
                    
                </tr>
                <tr class="total">
                    <th></th>
                </tr>
            </table>
    </section>     
</centre>
</body>
</html> -->