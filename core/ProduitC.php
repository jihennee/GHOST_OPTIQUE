<?PHP
include "../config.php";
class ProduitC{

    public function ajoutP($e){
       
        $db= config::getConnexion();
          

        $sql='insert into  produits (id,nom,prix,quantitee,couleur) VALUES (:id,:nom,:prix, :quantitee, :couleur)';
        
        $q=$db->prepare($sql);
       
        $q->bindValue(':id',$e->getId());
        $q->bindValue(':nom',$e->getNom());
        $q->bindValue(':prix',$e->getPrix());
	    $q->bindValue(':quantitee',$e->getQuantitee());
		$q->bindValue(':couleur',$e->getCouleur());
		
	
        $q->execute();
      

        return $e;
    }
	 public  function afficheP(){
        //connecter DataBase
        $db= config::getConnexion();
        //notre dequette SQL
        $sql="SELECT * from produits ";
	
        //fetch data
        $list=$db->query( $sql);
        //return  output function
        return $list;
    }
	
	  public  function supprimer($id){
        //connecter DataBase
        $db= config::getConnexion();

        //notre dequette SQL
        $sql ="delete from produits  where id=$id";
        $db->exec($sql);
        return $db;

    }
   
   
	
function modifier($e){
    //connecter DataBase
    $db= config::getConnexion();
    //notre dequette SQL

    $sql="UPDATE produits set nom=:nom,prix=:prix,quantitee=:quantitee,couleur=:couleur where id=:id";
    //prepare our query
    $q=$db->prepare($sql);
    //bind our values associer une valeur a un parametre
    $q->bindValue(':id',$e->getId());
    $q->bindValue(':nom',$e->getNom());
    $q->bindValue(':prix',$e->getPrix());
	$q->bindValue(':quantitee',$e->getQuantitee());
	$q->bindValue(':couleur',$e->getCouleur());

    //execute our query
    $q->execute();
    return $e;

    return $db;
	}





}
?>

