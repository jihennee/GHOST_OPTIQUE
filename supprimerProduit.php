<?php

include "../core/ProduitC.php";
$ec=new ProduitC();
//insert our objet in data base
if (isset ($_GET['del'])){
   $id=$_GET['del'];
    $ec-> supprimer($id);
}

header('location:index.php');


?>