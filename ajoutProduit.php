-<?php
include "../entities/produitss.php";
include "../core/ProduitC.php";
$e = new produit($_POST['id'],$_POST['nom'],$_POST['prix'],$_POST['quantitee'],$_POST['couleur']);
//var_dump($e);
$ec=new ProduitC();
//insert our objet in data base
$ec->ajoutP($e);
//echo 'done';
//read out data in the affiche page
header('location:index.php');

?>