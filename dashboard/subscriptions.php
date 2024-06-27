<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
      <div class="container">
       <div class="newsletter-subscription"> 
         <h1>Newsletter Subscriptions</h1>
         <div>
         <ul><li>E-mail</li><li>Date added</li><li>Subscription</li></ul>
         <ul>
        <?php
                require 'administrator.php';
                $db =  new Database('host', 'database user', 'database password', 'database');
                $admin = new Administrator($db);
                $results = $admin->get_account($_POST['username'], $_POST['password']);

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
                
        ?>
        </ul>
       </div>
        <a href="/newsletter/dashboard/newsletter.php" id="newsletter">send newsletter</a>
     </div> 
  </div>
  <script src="js/main.js"></script>
 </body>
</html>