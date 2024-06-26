<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
      <div class="container">
       <div id="newsletter-subscription"> 
         <h1>Newsletter Subscriptions</h1>
         <ul><li>E-mail</li><li>Date added</li><li>Subscription</li></ul>
         <ul>
        <?php
                require 'administrator.php';
                $db =  new Database('host', 'database user', 'database password', 'database');
                $admin = new Administrator($db);
                $results = $admin->get_account($_POST['username'], $_POST['password']);
                echo $results;
        ?>
        </ul>
     </div> 
  </div>
  <script src="js/main.js"></script>
 </body>
</html>