<?php
include "../core/CategoriesC.php";
include "../entities/categories.php";
//fetch the record to be update
$edit_state = false;

if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $edit_state=true;
    if($edit_state==true)

    $db= mysqli_connect('localhost','root','','test');
    $rec=mysqli_query($db,"SELECT * FROM categories WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $id=$record['id'];
    $marque=$record['marque'];
    $noncategorie=$record['noncategorie'];
}


$db= config::getConnexion();
//update records
if (isset($_POST['update'] )){
    //echo ('update');
    $e = new categories($_POST['id'],$_POST['marque'],$_POST['noncategorie']);
    $ec=new categoriesC();
    $ec->modifier($e);
    echo ('update');
	header('location:categorie.php');

}






?>