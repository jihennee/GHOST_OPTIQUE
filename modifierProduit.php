<?php
include "../core/ProduitC.php";
include "../entities/produitss.php";
//fetch the record to be update
$edit_state = false;

if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $edit_state=true;
    if($edit_state==true)

    $db= mysqli_connect('localhost','root','','test');
    $rec=mysqli_query($db,"SELECT * FROM produits WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $id=$record['id'];
    $nom=$record['nom'];
    $prix=$record['prix'];
	$quantitee=$record['quantitee'];
	$couleur=$record['couleur'];

	
}


$db= config::getConnexion();
//update records
if (isset($_POST['update'] )){
    //echo ('update');
    $e = new produit($_POST['id'],$_POST['nom'],$_POST['prix'],$_POST['quantitee'],$_POST['couleur']);
    $ec=new ProduitC();
    $ec->modifier($e);
    echo ('update');
    header('location:index.php');
}






?>