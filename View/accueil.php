
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="../CSS/styleFront.css"/>
    <link rel="stylesheet"  href="../CSS/acc.css"/>

</head>

<body style="background-color:black;">
  <div class="hero">
    <nav>
        <h2 class="logo"> HibaBooks</h2>
        <ul>
        <li><a>Home</a></li>
        <li><a href="../View/accueil.php">All Books</a></li>
        <li><a href="../View/choix.php">Books Categorie</a></li>
        
        <li><a href="../View/Panier.php">
                        <img src="../images/panier.png" width="20px" height="20px">
                    </a></li></ul>
        <button type="button"><a href="seConnecter.php">Subscribe</a></button>
    </nav>
</div>  
<main>
        <section class="product-list">

        <?php
include("../Model/connexion.php");

$connexion=new Connexion();
$con=$connexion->con;

$affichage='<center><div><center>
<strong><h2 style="color: white;
font-size: 3em;
font-weight: 900;
font-family: cursive;
font-style:italic;
">All books</h2></strong><br><br> ';
$Requette= "SELECT * FROM livre";
$resultat=$con->query($Requette);
$affichage.= '<ul>';
//récuperation d'une ligne de résultat sous forme de tableau associatif
while($livre = $resultat->fetch_assoc())

{?>
      <div class="product">
            <img src="../<?php echo  $livre['photo'] ?>" style="height: 250px;" alt="Titre du livre 1">
            <h2><?php echo  $livre['genre'] ?></h2>
            <p><?php echo  $livre['description'] ?></p>
            <p class="price"><?php echo  $livre['prix'] ?>$</p>
           
            <a style="display: inline-block;
                margin-top: 20px;
                padding: 8px 20px;
                background:  white;
                width:280px;
                color: rgb(38, 255, 0);
                font-family: cursive;
                border-radius: 8px;
                font-weight: 500;
                letter-spacing: 1px;
                text-decoration: none;" 
                href="affByGe.php?id='<?php echo  $livre['id'] ?>'">Add book</a>
            
          </div>
<?php

}
?>
          
          <!-- Ajoutez d'autres produits ici -->
        </section>
      </main>

</body>
</html>