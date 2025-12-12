<?php 
    class article {
        private $connection;

        public $id_article;
        public $nom_article;
        public $contenu;
        public $date_creation;
        public $date_modification;
        public $id_categorie;
        public $username;
        public $status;
        public $image_url;
        public $view_count;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Add_new_article(){

            $sql = "INSERT INTO article (nom_article, contenu, date_creation, date_modification, id_categorie, username, status, image_url, view_count) 
                    VALUES (:nom_article, :contenu, :date_creation, :date_modification, :id_categorie, :username, :status, :image_url, 0)";

            $query = $this->connection->prepare($sql);

            $this->username = htmlspecialchars(strip_tags($this->username));

            $query->bindParam(":nom_article", $this->nom_article);
            $query->bindParam(":contenu", $this->contenu);
            $query->bindParam(":date_creation", $this->date_creation);
            $query->bindParam(":date_modification", $this->date_modification);
            $query->bindParam(":id_categorie", $this->id_categorie);
            $query->bindParam(":username", $this->username);
            $query->bindParam(":status", $this->status);
            $query->bindParam(":image_url", $this->image_url);

            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function Get_Resent_article($username){
            $sql = "SELECT a.*, c.libelle AS category_name FROM article a JOIN categorie c ON a.id_categorie = c.id_categorie WHERE a.username = :username ORDER BY a.date_creation DESC LIMIT 5";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":username", $username);

            if($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            return false;
        }
    }
?>