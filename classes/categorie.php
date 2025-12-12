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
        public function getAllCategories() {
            $sql = "SELECT * FROM categorie";
            $query = $this->connection->prepare($sql);
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            return false;
        }

        public function Get_categorie(){
            $sql = "SELECT * FROM categorie where id_categorie = :id_categorie";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":id_categorie",$this->id_categorie);

            if($query->execute()) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            return false;
        }

        public function Update_categorie(){
            $sql = "UPDATE categorie SET libelle = :libelle , description = :description WHERE id_categorie = :id_categorie";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":id_categorie",$this->id_categorie);
            $query->bindParam(":libelle",$this->libelle);
            $query->bindParam(":description",$this->description);


            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function Delete_categorie(){
            $sql = "DELETE FROM categorie where id_categorie = :id_categorie";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":id_categorie",$this->id_categorie);

            if($query->execute()) {
                return true;
            }
            return false;
        }
    }
?>