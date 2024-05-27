
<?php
 
?>
</br>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    
    <link rel="stylesheet" href="../CSS/moncss.css">
    <link rel="stylesheet"  href="../CSS/styleFront.css"/>
   
    

</head> 
<body >
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

<div class="form" style="width:400px; margin-left: 450px;margin-top: 50px;">
        <a href="GestionDuProduit.php" class="Btn-back"><img style="width: 25px;" src="../images/back.png">Retourner</a>
    <h2 class="h2">Ajout du nouveau produit</h2>
    <p class="msg-erreur">
        Veuillez remplir tous les champs du formulaire !
    </p>

<form method="post" enctype="multipart/form-data" action="../Controller/add.php">
        <label for="genre">Genre :</label><br>
        <input type="text" id="genre" name="genre" placeholder="la genre du livre" required><br><br>
     
        <label for="description">Description</label><br>
        <textarea name="description" id="description" placeholder="la description du produit" required></textarea><br><br>
       
        <label for="photo">Photo</label><br>
        <input type="file" id="photo" name="photo" required><br><br>
     
        <label for="prix">Prix</label><br>
        <input type="text" id="prix" name="prix" placeholder="le prix du produit" required><br><br>
         
        <label for="stock">Stock</label><br>
        <input type="text" id="stock" name="stock" placeholder="le stock du produit" required><br><br>
         
        <input style="" type="submit"
        value="enregistrer le produit ">
   

 </form>
</div>
</body>   
</html>