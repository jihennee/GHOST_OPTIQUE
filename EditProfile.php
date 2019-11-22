<?php  
include "../config/config.php";
session_start();
if (isset($_SESSION['IDmembre'])  )
{
$check=$bdd->prepare("SELECT * FROM  membre WHERE IDmembre = ?");
     $check->execute([$_SESSION['IDmembre']]);
     $USER=$check->fetch();

     if (isset($_POST['Newnom']) && !empty($_POST['Newnom']) && $_POST['Newnom']!=$USER['nom']  )
     {
         $NEWnom=$_POST['Newnom'];
         $modif=$bdd->prepare("UPDATE membre SET nom = ? WHERE IDmembre = ? ");
         $modif->execute([$NEWnom,$_SESSION['IDmembre']]);
                     header('location:profile.php?id='.$_SESSION['IDmembre']);
     }

     if (isset($_POST['Newemail']) && !empty($_POST['Newemail']) && $_POST['Newemail']!=$USER['email'])
     {
         $NEWemail=$_POST['Newemail'];
         $modif=$bdd->prepare("UPDATE membre SET email = ? WHERE IDmembre = ? ");
         $modif->execute([$NEWemail,$_SESSION['IDmembre']]);
                     header('location:profile.php?id='.$_SESSION['IDmembre']);
     }

     if (isset($_POST['Newtel']) && !empty($_POST['Newtel']) && $_POST['Newtel']!=$USER['email'])
     {
         $Newtel=$_POST['Newtel'];
         $modif=$bdd->prepare("UPDATE membre SET tele = ? WHERE IDmembre = ? ");
         $modif->execute([$Newtel,$_SESSION['IDmembre']]);
                     header('location:profile.php?id='.$_SESSION['IDmembre']);
     }

     if (isset($_POST['Newpass']) && !empty($_POST['Newpass']) && isset($_POST['NewpassCNF']) && !empty($_POST['NewpassCNF']) && $_POST['Newtel']!=$USER['email'])
     {
         $NEWmdp1=$_POST['Newpass'];
         $NEWmdp2=$_POST['NewpassCNF'];
         if ($NEWmdp1 == $NEWmdp2)
         { 
                $modif=$bdd->prepare("UPDATE membre SET pass = ? WHERE IDmembre = ? ");
                $modif->execute([$NEWmdp1,$_SESSION['IDmembre']]);
                header('location:profile.php?id='.$_SESSION['IDmembre']);

          }
          else {
              echo "mdp!=mdp2";
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
</head>
<body>
    <form method="POST" action="">
            <input type="text" name="PASS_VALID" placeholder="Veuillez entrez votre pass"><br>
        <input type="text" placeholder="nom" name="Newnom">
        <br>
        <input type="text" name="Newemail" placeholder="email">
        <br>
        <input type="text" name="Newtel" placeholder="telephone">
       <br>
        <input type="text" name="Newpass" placeholder="mot de pass">
        <br>
        <input type="text" name="NewpassCNF" placeholder="confirmPass">
        <br>
        <input type="submit" name="valider" >
    </form>
</body>
</html>

<?php } ?>