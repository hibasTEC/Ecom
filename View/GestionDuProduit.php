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
<body style="" >
<div class="hero">
    <nav>
        <h2  style="color:white;
            font-size:28px;
            color: rgb(140, 255, 0);
            font-family: 'Bradley Hand', cursive;"> 
            HibaBooks</h2>
        <ul>
        <li><a>Home</a></li>
        <li><a href="../View/Ajout.php">ADD Book</a></li>
        <li><a href="../View/GestionDuProduit.php">All Books</a></li>
        </ul>
        <button  type="button"><a href="seConnecter.php">Subscribe</a></button>
    </nav>
</div>  

<!-- class="container" -->
    <div style="align-items:center;
    justify-content:center; 
    min-height: 100vh;
    position:relative;
    margin-left:50px;
    margin-top:50px"; >
        <a href="Ajout.php" class="Btn_add"><img style="width: 25px;color : white;" src="../images/add.png">Ajouter un produit</a>
   <centre> <h2 style="color:white;"> Vos produits</h2></centre>
        <table style="border:2px solid white;background-color:white;
         border-spacing: 0;
  border-collapse: separate;
  border-radius: 10px;">
        <thead>
        <tr id="items">
            <th>Id du produit </th>
        <th>Genre du produit</th>
            <th>Description du produit </th>
            <th>Image du produit</th>
            <th>Prix </th>
            <th>Stock</th>
            <th>Modifier le produit</th>
            <th>Supprimerle produit</th>
        </tr>
        </thead>
        <!-- <tr>
        <td>Soussi </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="Modifier.php"><img style="width: 50px;" src="../images/update.png"></td>
            <td><a href="Supprimer.php"><img style="width: 40px;" src="../images/delete.png"></td>
        </tr>     -->
        <tbody> 

        <?php
                  
                    include '../Model/classCrudProjet.php';
                     $productLivre = new livre();
                    $products = $productLivre->LiretoutLesproduit();
                    foreach ($products as $product) {                  
                    
                ?>
                 <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['genre'] ?></td>
                <td><?php echo $product['description'] ?></td>
                <td>
                    <img src="../<?php echo $product['photo'] ?>" alt="" style="width:50px;height:50px">
                    
                </td>
                <td><?php echo $product['prix'] ?></td>
                <td><?php echo $product['stock'] ?></td>
               
                
                <td><a href='modifier.php?id=<?php echo $product['id']?>' >
                    <img style="width: 50px;" 
                    src="../images/update.png">
                </td>
                <td>
                    <a href='../Controller/supprimer.php?id=<?php echo $product['id']?>'>
                        <img style="width: 40px;" 
                        src="../images/delete.png">
                    </td>
                    </tr>

                <?php 
                    }
                ?>
        </tbody>    

    </table>
    </div>
</body>
</html>