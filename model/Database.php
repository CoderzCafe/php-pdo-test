
<?php

    class Database {
        private $host = "localhost";
        private $db_name = "php-pdo-test";
        private $db_user = "root";
        private $db_pwd = "";

        private $conn;

        // public function __construct() {
        //     $this->conn = null;

        //     try {
        //         $this->conn = new PDO("mysql:host=" .$this->host. ";dbname=" 
        //         .$this->db_name, $this->db_user, $this->db_pwd);
        //         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCECPTION);
        //     } catch(PDOException $e) {
        //         echo "Database connection error." .$e->getMessage();
        //     }
        // }

        // db connection
        public function connect() {
            $this->conn = null;

            try {
                //  database name
                $this->conn = new PDO("mysql:host=" .$this->host. ";dbname=" .$this->db_name, $this->db_user, $this->db_pwd);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                // $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch(PDOException $e) {
                echo "Database connection error."  .$e->getMessage();
            }
            return $this->conn;
        }

        public function create($name, $contact, $address) {
            if(!($name == "") || !($contact == "") || !($address == "")) {
                $sql = "INSERT INTO user(user_name, user_contacts, user_address) VALUES(:name, :contacts, :address);";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute(["name" => $name, "contacts" => $contact, "address" => $address]);
                return true;
            } else {
                // echo "Input fields are empty. Data not inserted..";
                return false;
            }
            return false;
        }


    }


?>