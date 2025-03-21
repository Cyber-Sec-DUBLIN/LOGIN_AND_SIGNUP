
<?php

// The signup page is basically a copy of the original login page. Main difference being it doesn't check if there's any matching items in the database and just goes straight to home




if (isset($_POST["submit"])) { //if theres a post request
    require "userdb_config.php";
 //header("index.php");

    try {
        $connection = new PDO($dsn, $username, $password, $options); 
        
 include "USER_CLASS.php";

        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "site_users", //no idea what this all does
        implode(", ", array_keys($new_account)),
        ":" . implode(", :", array_keys($new_account)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_account);

        
    } 
        catch(PDOException $error) { //error handler
        echo $sql . "<br>" . $error->getMessage();
        }
        header('Location:index.php');
        die;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

<div class="topnav">
  <h1>SIGNUP</h1>
</div>





 
<form method="post">
   
    <input type ="text" name="username" id="username" required maxlength="20" placeholder="username">
<br>
    
    <input type="email" name="email" id="email" required placeholder="email">
<br>
    
    <input type="password" name="password" id="password" required placeholder="password">
<br>   
    <input type="submit" name="submit" value="submit">
    
      </form>  


<?php include "template/footer.php" ;?>   
