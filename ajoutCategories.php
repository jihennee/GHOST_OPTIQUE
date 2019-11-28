<?php
include "../entities/categories.php";
include "../core/CategoriesC.php";
$e = new categories($_POST['id'],$_POST['marque'],$_POST['noncategorie']);
//var_dump($e);
$ec=new CategoriesC();
//insert our objet in data base
$ec->ajoutP($e);
//echo 'done';
//read out data in the affiche page
header('location:categorie.php');

?>