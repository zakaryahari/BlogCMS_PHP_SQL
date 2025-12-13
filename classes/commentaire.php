<?php 
    class commentaire {
        private $connection;

        public $id_commentaire;
        public $contenu_commentaire;
        public $date_commentaire;
        public $username;
        public $id_article;
        public $email;
        public $status;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Add_new_commentaire(){

            $sql = "INSERT INTO commentaire (contenu_commentaire, date_commentaire, username, id_article, email, status) 
                    VALUES (:contenu_commentaire, :date_commentaire, :username, :id_article, :email, :status)";

            $query = $this->connection->prepare($sql);

            $this->contenu_commentaire = htmlspecialchars(strip_tags($this->contenu_commentaire));

            $this->username = htmlspecialchars(strip_tags($this->username));
            
            $this->email = htmlspecialchars(strip_tags($this->email));
            
            $this->status = htmlspecialchars(strip_tags($this->status));

            $query->bindParam(":contenu_commentaire", $this->contenu_commentaire);
            $query->bindParam(":date_commentaire", $this->date_commentaire);
            $query->bindParam(":username", $this->username);
            $query->bindParam(":id_article", $this->id_article);
            $query->bindParam(":email", $this->email);
            $query->bindParam(":status", $this->status);

            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function Get_Allcomments($username){
            $sql = "SELECT co.* , ar.nom_article AS nom_article FROM commentaire co JOIN article ar ON co.id_article = ar.id_article WHERE co.username = :username";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":username", $username);

            if($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            return false;
        }

        public function Get_Articlecomments($id_article){
            $sql = "SELECT co.* , ar.nom_article AS nom_article FROM commentaire co JOIN article ar ON co.id_article = ar.id_article WHERE co.id_article = :id_article";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":id_article", $id_article);

            if($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            return false;
        }

        public function Update_comment_status($id, $status) {
            $sql = "UPDATE commentaire SET status = :status WHERE id_commentaire = :id";
            $query = $this->connection->prepare($sql);
            
            $query->bindParam(":status", $status);
            $query->bindParam(":id", $id);
            
            if ($query->execute()) {
                return true;
            }
            return false;
        }

        public function Delete_comment($id) {
            $sql = "DELETE FROM commentaire WHERE id_commentaire = :id";
            $query = $this->connection->prepare($sql);
            $query->bindParam(":id", $id);
            
            if ($query->execute()) {
                return true;
            }
            return false;
        }
    }
?>