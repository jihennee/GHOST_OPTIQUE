<?PHP
class categories{
    private $id;
    private $marque;
    private $noncategorie;

  
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

   
    public function getMarque()
    {
        return $this->marque;
    }

   
    public function setMarque($marque)
    {
        $this-> marque= $marque;
    }


    public function getNoncategorie()
    {
        return $this->noncategorie;
    }

 
    public function setNoncategorie($noncategorie)
    {
        $this->noncategorie = $noncategorie;
    }

  

  
    public function __construct($id, $marque, $noncategorie)
    {
        $this->id = $id;
        $this->marque = $marque;
        $this->noncategorie = $noncategorie;
    }
}
?>