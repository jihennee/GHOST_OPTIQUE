<?php

include "../core/CategoriesC.php";
$ec=new CategoriesC();
//insert our objet in data base
if (isset ($_GET['del'])){
   $id=$_GET['del'];
    $ec-> supprimer($id);
}

header('location:categorie.php');


?>