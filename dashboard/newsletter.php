<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
      <div class="container">
       <div class="newsletter-subscription"> 
       <h1>Send newsletter</h1>
         <div>
         
     
            <?php

                require 'administrator.php';
                $db =  new Database('host', 'database user', 'database password', 'database');
                $newsletter = new Newsletter($db);
                $results = $newsletter->get_subscriptions();
                
                if($results->num_rows > 0){
                    while($row = $results->fetch_assoc()){
                        $formatted_date = new DateTime($row['date_added']);
                        if($row['subscription'] > 0){
                            echo '<p><input type="checkbox" name="userSelected' . $row['id'] , '" checked>&nbsp;' . $row['email'] . '</p>';
                            
                        } 
                    }
                } else {
                    echo 'There are no subscribed users';
                }

             ?>
          
         </div>
         <form method="post" action="">
            <input type="text" name="subject" placeholder="Subject" required><br>
            <textarea name="message" placeholder="Message"></textarea><br>
            <input type="submit" name="submit" value="Send newsletter">
         </form>
       
      </div>
    </body>
    </html>