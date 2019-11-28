<?PHP
include "../config.php";

class CategoriesC{

    public function ajoutP($e){
       
        $db= config::getConnexion();
        session_start();       

        $sql="insert into  categories(id,marque,noncategorie) VALUES (:id,:marque,:noncategorie)";
        
        $q=$db->prepare($sql);
       
        $q->bindValue(':id',$e->getId());
        $q->bindValue(':marque',$e->getMarque());
        $q->bindValue(':noncategorie',$e->getNoncategorie());
        $q->execute();
        $_SESSION['msg']="categories saved ";

        return $e;
    }
    public  function afficheP(){
        //connecter DataBase
        $db= config::getConnexion();
        //notre dequette SQL
        $sql="select * from categories";
        //fetch data
        $list=$db->query( $sql);
        //return  output function
        return $list;
    }
    public  function supprimer($id){
        //connecter DataBase
        $db= config::getConnexion();

        //notre dequette SQL
        $sql ="delete from categories  where id=$id";
        $db->exec($sql);
        return $db;

    }
   
    function modifier($e){
    //connecter DataBase
    $db= config::getConnexion();
    //notre dequette SQL

    $sql='UPDATE categories set marque=:marque,noncategorie=:noncategorie where id=:id';
    //prepare our query
    $q=$db->prepare($sql);
    //bind our values associer une valeur a un parametre
    $q->bindValue(':id',$e->getId());
    $q->bindValue(':marque',$e->getMarque());
    $q->bindValue(':noncategorie',$e->getNoncategorie());
    //execute our query
    $q->execute();
    return $e;

    return $db;
}




}
?>

