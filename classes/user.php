<?php 
    class user {
        private $connection;

        public $username;
        public $email;
        public $mod_de_pass;
        public $date_inscription;
        public $role;
        
        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Add_new_user(){
            $sql = "INSERT INTO utilisateur (username, email, mod_de_pass, date_inscription, role) VALUES (:username, :email, :mod_de_pass, :date_inscription, :role)";

            $query = $this->connection->prepare($sql);

            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));

            $query->bindParam(":username",$this->username);
            $query->bindParam(":email",$this->email);
            $query->bindParam(":mod_de_pass",$this->mod_de_pass);
            $query->bindParam(":date_inscription",$this->date_inscription);
            $query->bindParam(":role",$this->role);

            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function getAllUsers() {
            $sql = "SELECT * FROM utilisateur";
            $query = $this->connection->prepare($sql);
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            return false;
        }
        
        public function Update_user(){
            $sql = "UPDATE utilisateur SET role = :role WHERE username = :username";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":username",$this->username);
            $query->bindParam(":role",$this->role);


            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function login($username , $password){
            $sql = "SELECT * FROM utilisateur WHERE username = :username";

            $query = $this->connection->prepare($sql);

            $username = htmlspecialchars(strip_tags($username));

            $query->bindParam(":username",$username);
            
            $query->execute();
            
            $user = $query->fetch();

            if ($user && password_verify($password, $user['mod_de_pass'])) {
                return $user;
            }
            return false;
        }

    }
?>