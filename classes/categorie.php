<?php 
    class categorie {
        private $connection;

        public $id_categorie;
        public $libelle;
        public $description;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Add_new_categorie(){
            $sql = "INSERT INTO categorie (libelle , description) VALUES (:libelle,:description)";

            $query = $this->connection->prepare($sql);

            // $query->bindParam(":id_categorie",$this->id_categorie);
            $query->bindParam(":libelle",$this->libelle);
            $query->bindParam(":description",$this->description);


            if($query->execute()) {
                return true;
            }
            return false;
        }
    }
?>