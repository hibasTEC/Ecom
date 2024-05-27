<?php

include('../Model/clientCnx.php');

$products=new client();

$products->conClient($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet"  href="../CSS/cnx.css"/>

</head>
<body>
    <section>
        <div class="imgBox"></div>
        <div class="contentBox">
            <div class="formBox">
            <h2>Login to HibaBooks

            </h2></br>
           
            <form method="post" enctype="multipart/form-data" >
                    <div class="inputBx">
                        <span>Pseudo</span>
                        <input type="text" name="pseudo">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="mdp">
                    </div>
                    <div class="remember">
                        <label>     <input type="checkBox">Remember Me </label>
                    </div>
                    <div class="inputBx">
                       
                        <input type="submit" value= "Log In">
                    </div>
                    <div class="inputBx">
                    <p>Don't have an account ? <a href="inscription.php"> Sign up
                    </div>
            </form>     
            </div>    
        </div>
    </section>    
</body>
</html>