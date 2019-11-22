<?php 

try{
$bdd = new PDO("mysql:host=localhost;dbname=ghostoptique", "root", "");
}
catch (exepction $e){
echo $e->getMessage();
}

?>

