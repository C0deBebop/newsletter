<?php

require '../newsletter.php';

class Administrator {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function create_account($username, $password){
       $mysqli = @new mysqli($this->db->host, $this->db->user, $this->db->password, $this->db->db);
       $stmt = $mysqli->prepare("INSERT INTO admin (username, password) VALUES(?, ?)");
       $stmt->bind_param('ss', $username, $password);
       $stmt->execute();
       $stmt->close();
    }

    function get_account($username, $password){
        $mysqli = @new mysqli($this->db->host, $this->db->user, $this->db->password, $this->db->db);
        $result = $mysqli->query("SELECT username, password FROM admin");
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                 if(hash_equals(hash('sha256', $password), $row['password']) && $username == $row['username']){
                     $newsletter = new Newsletter($this->db);
                     $newsletter->get_subscriptions();                     
                 } else {
                     return header('Location: /newsletter/dashboard/index.php');
                 }
            }
        }

    }
}

?>