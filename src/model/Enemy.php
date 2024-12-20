<?php
class Enemy{
    protected $id;
    protected $name;
    protected $description;
    protected $isBoss;
    protected $health;
    protected $strength;
    protected $defense;
    protected $img;

    
    protected $db;

    public function __construct($db){
        $this->db = $db;
    }

    
    function save(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
          
        
            $stmt = $this->db->prepare("INSERT INTO enemies (name, description, isBoss, health, strength, defense) VALUES (:name, :description, :isBoss, :health, :strength, :defense)");
            $stmt->bindValue(':name', $this->getName());
            $stmt->bindValue(':description', $this->getDescription());
            $stmt->bindValue(':isBoss', $this->getIsBoss());
            $stmt->bindValue(':health', $this->getHealth());
            $stmt->bindValue(':strength', $this->getStrength());
            $stmt->bindValue(':defense', $this->getDefense());
            
            return $stmt->execute();
        }
        
    }

    //Getters and Setters

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
     * Get the value of health
     */ 
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set the value of health
     *
     * @return  self
     */ 
    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get the value of strength
     */ 
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set the value of strength
     *
     * @return  self
     */ 
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of isBoss
     */ 
    public function getIsBoss()
    {
        return $this->isBoss;
    }

    /**
     * Set the value of isBoss
     *
     * @return  self
     */ 
    public function setIsBoss($isBoss)
    {
        $this->isBoss = $isBoss;

        return $this;
    }
}
?>