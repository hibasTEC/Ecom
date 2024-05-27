<?php
include("../Model/connexion.php");
//Verification si id_produit existe

$connexion=new Connexion();
        $con=$connexion->con;
        
if(isset($_GET['id'])) 
	{
        $v_id=$_GET['id'];
		$sql="SELECT * FROM livre WHERE id = $v_id";
		//EXECUTE LA REQUETTE
		$resultat=$con->query($sql);
	 }
//récuperation d'une ligne de résultat sous forme de tableau associatif
$livre =$resultat->fetch_assoc();
$affichage = "<br><a
 style='
 background-color:rgb(38, 255, 0); 
 width:120px;
 border-radius: 6px;
 color:black;
 margin-left:20px;
 padding: 5px;
    text-decoration: 0;
    display: flex;
    align-items:center;' href='choix.php?categorie=" .$livre['genre'] . "'>
<img style='color:rgb(255, 0, 0);
;width: 25px;' src='../images/back.png'>Retourner". "</a>";

$affichage.="<div style='

margin: auto;
width: 50%;
text-align:center;
padding: 10px;
'>";

$affichage.= "<h4 style='font-size:2rem; font-weight:700;'> $livre[genre]</h4><br>";

//$affichage .= "<input style='color:white' name='id' value='$produit[id]' />";
$affichage .="<div name='id'>$livre[id]<div>";
$affichage.= "<img src='../$livre[photo]' width='300' height='300' /><br>";
$affichage.= "Prix:$livre[prix] $<br>";
$affichage.="</div>";

if(!($livre['stock'] < 0))
{
	

	$affichage .= '<center><form method="post" action="panier.php?id=' .$livre['id']  . ' " >';

	$affichage .= '<center><label
	style="display: inline-block;
    padding: 4px 20px;
   
    color: rgb(38, 255, 0);
    font-weight: 500;
    letter-spacing: 1px;" for="quantite">Quantity: </label> </center> ';

	$affichage .= '<select id="quantite" name="quantite">';
	
			for($nb = 1; $nb <=$livre['stock'] && $nb <= $livre['stock']; $nb++)
			{
				$affichage .= "<option >$nb</option>";
			}

			
			$affichage .= '</select><br><input
			style="display: inline-block;
			margin-top: 20px;
			padding: 8px 20px;
			background:  white;
			color: rgb(38, 255, 0);
			font-family: cursive;
			border-radius: 8px;
			font-weight: 500;
			letter-spacing: 1px;
			text-decoration: none;" type="submit"   name="ajout_panier" value="Add to buy" /></form></center>';
			
}
else
{
	$affichage .= 'Sold out !';
}

?>
<html>
<head>
<link rel="stylesheet" href="../css/styleFront.css">
</head>
<body style="background-color:black;">
<section>
<div class="circle"></div>
            <header>
            <div class="hero">
    <nav>
        <h2 class="logo" style="color:rgb(140, 255, 0);"> HibaBooks</h2>
        <ul>
        <li><a>Home</a></li>
        <li><a href="../View/accueil.php">All Books</a></li>
        <li><a href="../View/choix.php">Books Categorie</a></li>
		<li><a href="../View/Panier.php">
                        <img src="../images/panier.png" width="20px" height="20px">
                    </a></li>
        </ul>
		<button type="button"><a href="seConnecter.php">Subscribe</a></button>
    </nav>
</div>  
                
            </header>
            <div style="color:white ">
            <?php echo $affichage ?>

</div>
</section>

</body>
</html>

