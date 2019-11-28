<?PHP
class produit{
    private $id;
    private $nom;
    private $prix;
    private $quantitee;
    private $couleur;

	
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

   
    public function getNom()
    {
        return $this->nom;
    }

   
    public function setNom($nom)
    {
        $this-> nom= $nom;
    }


    public function getPrix()
    {
        return $this->prix;
    }

 
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

   public function getQuantitee()
    {
        return $this->quantitee;
    }

 
    public function setQuantitee($quantitee)
    {
        $this->quantitee= $quantitee;
    }
	
public function getCouleur()
    {
        return $this->couleur;
    }

 
    public function setCouleur($couleur)
    {
        $this->couleur= $couleur;
    }



    public function __construct($id, $nom, $prix, $quantitee, $couleur)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
		$this->quantitee =$quantitee;
		$this->couleur =$couleur;
	
		
    }
}
?>