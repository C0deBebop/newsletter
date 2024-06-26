<?php


if(isset($_POST['submit'])) {
    require 'newsletter.php';
    $email = $_POST['email'];
    //pass your db credentials to the Database instance object
    $db =  new Database('host', 'database user', 'database password', 'database');
    $newsletter = new Newsletter($db);
    $newsletter->subscribe($email);
} else {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
      <div class="container">
       <main> 
         <img src="envelope-solid.svg" alt="newsletter image">
         <h1>Thank you</h1>
         <p>You are now subscribed to our newsletter</p> 
        </main> 
      </div>
    </body>
    </html>