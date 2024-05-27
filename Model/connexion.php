<?php
//création des variable pour faire la connexion
class Connexion{
    //variables
    private $servername='localhost';
    private $username='root';
    private $password='';
    private $database='biba';

    public $con;
     //création du constructeur
    public function __construct(){
        $this->con = new mysqli($this->servername,$this->username,$this->password,$this->database);
    //verifier la bonne connection
        if(mysqli_connect_error()){
    
            trigger_error("Failed to conect MYSQL:".mysqli_connect_error());
        
        }
        
        else{
           // echo'Connected Successfully';
            return $this->con;
        }
    }
    //la function qui permet  de récupérer uneinstantier la classe connection
    public function getConnexion(){
        //vérifier si une instance de la méthode Connection existe 
        if($this->con==null)
        //créer un nouvelle instance du constructeur
        {new Connexion();}

        return $this->con;
        //returner l'instanciation de la classe
    }
    
    
    }
    ?>