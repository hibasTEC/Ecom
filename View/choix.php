
<?php
include("../Model/connexion.php");

$connexion=new Connexion();
$con=$connexion->con;

$affichage='<div><center>
<strong><h2 style="color: white;
font-size: 3em;
font-weight: 900;
font-family: cursive;
font-style:italic;
">Choose your favorite book</h2></strong><br><br> ';
$Requette= "SELECT DISTINCT genre FROM livre";
$resultat=$con->query($Requette);
$affichage.= '<ul>';
//récuperation d'une ligne de résultat sous forme de tableau associatif
while($genre = $resultat->fetch_assoc())
{

$affichage.= "<strong><li style='
display:inline-block;
vertical-align:middle;
text-align:center;
cursor:pointer;
margin:5px;
font-family: cursive;
text-decoration:none;
border:#000 1px solid;
background-color: #5ac90e ;
color:#fff;
height:40px;
padding:8px 20px;
border-radius:6px;' ><a style='color:white' href='?genre=" . $genre['genre'] . "'>" . $genre['genre'] . "</a></li> </strong>";

}
$affichage .= "</ul></div>";

$affichage .= '<div style="display: inline-block;
flex-wrap: wrap;
margin: left 5px;
justify-content: space-between;
margin: 20px;">';
//Verification si categorie existe
if(isset($_GET['genre']))
{
$Requette= "SELECT id,genre,description,photo,prix,stock FROM livre WHERE genre='$_GET[genre]'";
$data=$con->query($Requette);
while($livre = $data->fetch_assoc())
{
$affichage .= '<center><div style=" color: #fff;
width: 300px;
margin-left:500px;
margin-bottom: 20px;
padding: 10px;
border: 1px solid #ccc;
border-radius: 5px;">';
$affichage .= "<h2 style='color: #fff;
font-size: 24px;
margin-top: 10px;
margin-bottom: 5px;' >$livre[genre]</h2>";
$affichage .= "<img src='../$livre[photo]' style='width: 100%;height: 250px;
border-radius: 5px;'></a>";
$affichage .= "<h3><p style='font-size: 20px;
font-weight: bold;
color: rgb(3, 204, 0);
margin: 10px 0;'>Price :  $livre[prix] $</p></h3>";
$affichage .= '<a 
style="display: inline-block;
margin-top: 20px;
padding: 8px 20px;
background:  white;
color: rgb(38, 255, 0);
font-family: cursive;
border-radius: 8px;
font-weight: 500;
letter-spacing: 1px;
text-decoration: none;" href="affByGe.php?id='.$livre['id'].'">Add book</a>';
$affichage .= '</div></center>';
}
}
$affichage .= '</center></div>';



?>
<html>
<head>
<link rel="stylesheet" href="../CSS/styleFront.css">
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
            <div style="color:white ,background-color:rgb(140, 255, 0); ">
            <?php echo $affichage ?>

 </div>

        
            </section>

</body>
</html>
