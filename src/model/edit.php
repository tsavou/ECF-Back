<?php
class EditModel
{
    public $db;
    public $name;
    public $marque;
    public $dimensions;
    public $poster;
    public $prix;
    public $promotion;
    

    public function __construct(PDO $db)
    {
        $this->db = $db;   
        
        if  (!empty($_POST)){
            $this->name = trim(strip_tags($_POST['name']));
            $this->marque = trim(strip_tags($_POST['marque']));
            $this->dimensions = trim(strip_tags($_POST['dimensions']));
            $this->poster = trim(strip_tags($_POST['poster']));
            $this->prix = trim(strip_tags($_POST['prix']));
            $this->promotion = trim(strip_tags($_POST['promotion']));
        }
     
    }   
    
   
}