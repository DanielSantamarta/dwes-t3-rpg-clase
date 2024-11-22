<?php
class Item{
    protected $id;
    protected $name;
    protected $description;
    protected $type;
    protected $effect;
    protected $img;

    
    protected $db;

    public function __construct($db){
        $this->db = $db;
    }


    function save(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $stmt = $this->db->prepare("INSERT INTO characters (name, description, health, strength, defense) VALUES (:name, :description, :health, :strength, :defense)");
            $stmt->bindValue(':name', $this->getName());
            $stmt->bindValue(':description', $this->getDescription());
            $stmt->bindValue(':type', $this->getType());
            $stmt->bindValue(':effect', $this->getEffect());

            return $stmt->execute();
        }
        
    }
    
    //Setters and Getters

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of effect
     */ 
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Set the value of effect
     *
     * @return  self
     */ 
    public function setEffect($effect)
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
}
?>