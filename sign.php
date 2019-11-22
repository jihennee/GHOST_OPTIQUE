<?php
include "../config/config.php";
$CONNECTED=0;
$erreurs=array();
if (isset($_POST['validation'])){
$nom=$_POST['nom'];
$email=$_POST['email'];
$tele=$_POST['tel'];
$token="azeaeaeaaez";
$verif=1;
$pass=$_POST['mdp'];
$passCNF=$_POST['mdp2'];
if ($pass!=$passCNF)
{
    $erreurs['MDP']= "Les mots de passe ne sont pas identiques";
}
else{
    $stmt=$bdd->prepare("SELECT email FROM membre");
    $stmt->execute();
    while ($data =$stmt->fetch())
    {
     if ($email ==$data['email']) {


           $erreurs['EMAIL']= "E-mail Deja existant ";
       }
    }
}


if (count($erreurs)===0)
 {
     $stmt = $bdd->prepare("INSERT INTO membre (nom,email,tele,token,verif,pass) VALUES (?,?,?,?,?,?)");
     $stmt->execute([$nom,$email,$tele,$token,$verif,$pass]);
     $CONNECTED=1;
     header('location:index.php');
     exit();
 }


}

//$stmt = $bdd->prepare("INSERT INTO membre (pseudo,email,tele,token,verif,pass) VALUES (?,?,?,?,?,?)");
//$stmt->execute([$nom,$email,$tele,$token,$verif,$pass]);

//$stmt=$bdd->prepare("UPDATE membre SET pseudo=? where tele=24816228");
//$stmt->execute(["0000000"]);

//$stmt=$bdd->prepare("DELETE FROM membre WHERE pseudo='tahan'");
//$stmt->execute();



//$stmt=$bdd->prepare("SELECT pseudo,email FROM membre");
//$stmt->execute();
//while ($data =$stmt->fetch())
//{
//    echo $data['pseudo'] . "===" . $data['email']."<br>";
//
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/sign.css">

    <title>Document</title>
<style>

.navigation{
  background-color:black;
  opacity:0.9;
    height:50px;
    width:100%;
}

.navigation>a{
    color:white;
    font-weight:bold;
    text-decoration:none;
    display: inline-block;
	padding: 15px 13px;
    color: #FFF;
    font-weight:bold;
    font-size:18px;

}

.navigation>a:hover{
    color: #60adde;
    
}

</style>

</head>
<body>
<nav class="navigation">
    <a href="index.php"><< Revenir vers le site </a>
</nav>
<div class="wrap">
    <h2>S'inscrire</h2>
    <form  method="POST" action="sign.php" >

        <input  type="text" placeholder="Nom" name="nom" value="<?php if (isset($nom)){echo $nom;} ?>" required>
        <input type="email" placeholder="E-mail"   name="email" value="<?php if (isset($email)){echo $email;} ?>" required>
        <input type="text"  placeholder="(+216)xxxxxxx" name="tel" value="<?php if (isset($tele)){echo $tele;} ?>" required>
        <input type="password" placeholder="Mot de passe" name="mdp" required>
        <input type="password" placeholder="Confimer mot de passe" name="mdp2" required >
        
        <?php if (count($erreurs)>0):?>
        <div class="alert alert-danger" id="ERR" role="alert">
        <?php foreach($erreurs as $erreur): ?>
            <li><?php echo $erreur;?></li>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <input type="submit" value="S'inscire" name="validation">

    </form>
</div>

</body>
</html>