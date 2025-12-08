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
            $sql = "INSERT INTO utilisateur VALUES (:username,:email,:mod_de_pass,:date_inscription,:role)"

            $query = $this->connection->prepare($sql);

            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));

            $query->bindParam(":username",$this->username);
            $query->bindParam(":email",$this->username);
            $query->bindParam(":mod_de_pass",$this->username);
            $query->bindParam(":date_inscription",$this->date_inscription);
            $query->bindParam(":role",$this->role);

            if($query->execute()) {
                return true;
            }
            return false;
        }
    }
?>