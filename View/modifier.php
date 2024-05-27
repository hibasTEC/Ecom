<?php
include("../Model/classCrudProjet.php"); // Inclure la classe Clients

if(isset($_GET['id'])){ // Vérifier si l'id du client a été transmis en paramètre dans l'URL
    $v_id = $_GET['id'];
    $client = new livre(); // Instancier la classe Clients
    $result = $client->selectById($v_id); // Appeler la méthode selectById() pour récupérer les données du client
    if($result){ // Vérifier si des données ont été trouvées pour ce client
        if(isset($_POST['submit'])){ // Vérifier si le formulaire a été soumis
            // Appeler la méthode updateRecord() pour mettre à jour les informations dans la base de données
            $client->update($_POST);}

?>
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
    <h2>Modifier le produit</h2>
    <p class="msg-erreur">
        Veuillez remplir tous les champs du formulaire !
    </p>

        
        <form method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
            <label>Genre du livre :</label>
            <input type="text" name="genre" value="<?php echo $result['genre']; ?>" /><br /><br />
            <label>Description :</label>
            <input type="text" name="description" value="<?php echo $result['description']; ?>" /><br /><br />
            <label>Photo :</label>
            <input type="file" name="photo" /><br /><br />
            <label>Prix :</label>
            <input type="text" name="prix" value="<?php echo $result['prix']; ?>" /><br /><br />
            <label>Stock :</label>
            <input type="text" name="stock" value="<?php echo $result['stock']; ?>" /><br /><br />
           
            
            <input type="submit" name="submit" value="Modifier" />
        </form>
        </div>
<?php
    } else {
        echo "Le client avec l'id $id n'existe pas.";
    }
} else {
    echo "L'id du client n'a pas été transmis en paramètre dans l'URL.";
}
?>
