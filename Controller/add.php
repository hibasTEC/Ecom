<?php
include('../Model/classCrudProjet.php');
$products=new livre();
$products->insert($_POST);
?>
