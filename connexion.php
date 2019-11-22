<?php 
session_start();
$erreurs="";
include "../config/config.php";
if (isset($_POST['connecter'])){
    $emailCNX=$_POST['emailCNX'];
    $passCNX=$_POST['passCNX'];
    if (!empty($emailCNX) && !empty($passCNX))
    {
        $stmt=$bdd->prepare("SELECT * FROM  membre WHERE email = ? AND pass = ? ");
        $stmt->execute([$emailCNX,$passCNX]);
        $validerCNX=$stmt->rowCount();

        if ($validerCNX== 1)
        {
            $USER_INFO = $stmt->fetch();
            $_SESSION['nom']=$USER_INFO['nom'];
            $_SESSION['email']=$USER_INFO['email'];
            $_SESSION['pass']=$USER_INFO['pass'];
            header('location:index.php?nom='.$_SESSION['nom']);
        }
        else {
            $erreurs="Verifier votre email ou  votre mot de passe";
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="css/bootstrap.min">
</head>
<body>
<nav class="navigation">
    <a href="index.php"><< Revenir vers le site </a>
</nav>
<div class="container red">
    </div>
    <div class="wrap">
    <form action="" method="POST">
    <input type="email" placeholder="email" name="emailCNX">  
    <input type="password" placeholder="mot de passe" name="passCNX">
   
   
    <?php if ($erreurs!=""):?>     
        <div class="alert alert-danger" id="ERR" role="alert">
            <li><?php echo $erreurs;?></li>
        </div>
        <?php endif; ?>
    <input type="submit" value="Se connecter" name="connecter" >


    </form>
    </div>
</body>
</html>