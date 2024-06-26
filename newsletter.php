<?php

require 'database.php';

class Newsletter {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function subscribe($email){
        $mysqli = @new mysqli($this->db->host, $this->db->user, $this->db->password, $this->db->db);
        $stmt = $mysqli->prepare("INSERT INTO users (email, date_added, subscription) VALUES(?, ?, ?)");
        $current_date = new DateTime('now');
        $subscription_date = $current_date->format('Y-m-d');
        $subscription_status = 1;
        $stmt->bind_param('ssi', $email, $subscription_date,  $subscription_status);
        $stmt->execute();
        $stmt->close();
    }

    public function unsubscribe($id) {
        $mysqli = @new mysqli($this->db->host, $this->db->user, $this->db->password, $this->db->db);
        $stmt = $mysqli->prepare("UPDATE users SET subscription=? WHERE id=?");
        $subscription_status=0;
        $stmt->bind_param('ii', $subscription_status, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function get_subscriptions(){
        $mysqli = @new mysqli($this->db->host, $this->db->user, $this->db->password, $this->db->db);
        $results = $mysqli->query("SELECT * FROM users");
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                $formatted_date = new DateTime($row['date_added']);
                if($row['subscription'] > 0){
                    echo '<li>' . $row['email'] . '</li>';
                    echo '<li>' . $formatted_date->format('d-m-Y') . '</li>';
                    echo "<li><a class='unsubscribe' href='/newsletter/dashboard/?id=" . $row['id'] .  "'>unsubscribe</a></li>";
                } 
            }
        } else {
            echo 'There are no subscribed users';
        }
    }

    /*
    public function send_newsletter(){

    }*/

}

?>