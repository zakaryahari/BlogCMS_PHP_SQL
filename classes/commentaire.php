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
                    VALUES (:contenu_commentaire, NOW(), :username, :id_article, :email, 'approved')";

            $query = $this->connection->prepare($sql);

            $this->contenu_commentaire = htmlspecialchars(strip_tags($this->contenu_commentaire));

            if (empty($this->username)) {
                $this->username = null;
            } else {
                $this->username = htmlspecialchars(strip_tags($this->username));
            }
            
            $query->bindParam(":contenu_commentaire", $this->contenu_commentaire);
            $query->bindParam(":username", $this->username);
            $query->bindParam(":id_article", $this->id_article);
            $query->bindParam(":email", $this->email);

            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function Get_Allcomments($author_username) {
            
            $sql = "SELECT c.*, a.nom_article, u.username as comment_author FROM commentaire c JOIN article a ON c.id_article = a.id_article JOIN utilisateur u ON c.username = u.username WHERE a.username = :author_username ORDER BY c.date_commentaire DESC";
            
            $query = $this->connection->prepare($sql);
            $query->bindParam(":author_username", $author_username);
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
        }

        public function Get_Articlecomments($id_article) {

            $sql = "SELECT c.*, a.nom_article FROM commentaire c JOIN article a ON c.id_article = a.id_article WHERE c.id_article = :id_article ORDER BY c.date_commentaire DESC";

            $query = $this->connection->prepare($sql);
            $query->bindParam(":id_article", $id_article);

            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
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

        public function getApprovedComments($id_article) {
            $sql = "SELECT * FROM commentaire WHERE id_article = :id_article AND status = 'approved' ORDER BY date_commentaire DESC";
            
            $query = $this->connection->prepare($sql);
            $query->bindParam(":id_article", $id_article);
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
        }

        public function getPendingComments() {
            $sql = "SELECT co.id_commentaire , ar.image_url , co.username , co.contenu_commentaire , ar.nom_article , co.date_commentaire FROM commentaire co JOIN article ar ON co.id_article = ar.id_article WHERE co.status = 'pending' ORDER BY date_commentaire DESC ";
            
            $query = $this->connection->prepare($sql);
            // $query->bindParam(":id_article", $id_article);
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
        }
        
    }
?>