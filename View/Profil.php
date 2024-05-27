<?php 
//demarre
session_start();



$affichage = '<center><br/><br/><br/><br/><br/><br/><br/><br/><h1 style=color:"white"> Hi <strong style="color:rgb(140, 255, 0); ">' . $_SESSION['membres']['nom'] . '</strong> and welcome to</h1>';

$affichage.= '<br/><h1 style=" color:white;
font-size:28px;
color: rgb(140, 255, 0);
font-family: \'Bradley Hand\', cursive;">HibaBooks</h1><br>';
$affichage.='<h1>Go to the AllBooks page to see the books you are passionate about </h1></center>' ;


?>
<html>
<head>
<link rel="stylesheet" href="../CSS/styleFront.css"> 
</head>
<body style="background-color:black; background: linear-gradient(transparent,rgb(86, 176, 56)),url(../images/livres.jpg);height:100%">
<section>
            <div class="circle"></div>
            <header>
            <div class="hero">
    <nav>
        <h2 class="logo"> HibaBooks</h2>
        <ul>
        <li><a>Home</a></li>
        <li><a href="../View/accueil.php">All Books</a></li>
        <li><a href="../View/choix.php">Books Categorie</a></li>
        <li><a href="../View/Panier.php">
                        <img src="../images/panier.png" width="20px" height="20px">
                    </a></li>
        </ul>
       
    </nav>
</div> 
                
            </header>
            <div style="color:black; ">
            <?php echo$affichage ?>
</div>

        
            </section>

</body>
</html>