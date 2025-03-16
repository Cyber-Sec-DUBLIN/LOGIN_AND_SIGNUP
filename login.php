
<?php

//LOGIN PAGE. user enters login info unto the form and a check is run to see if it all matches they get sent to the homepage.

if (isset($_POST["submit"])) { //if theres a post request
    require "userdb_config.php";

    

    try {
        $connection = new PDO($dsn, $username, $password, $options);  //establish connection to DB
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        


       //toook out array due to issues
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
           
        //   echo "Entered Username: $username <br>"; debugging
        //echo "Entered Email: $email <br>";
        //echo "Entered Password: $password <br>";

     

       
        $sql = "SELECT * FROM site_users WHERE username = :username AND email = :email AND password = :password"; //COME BACK TO LATER TO FIX
        $statement = $connection->prepare($sql); 
        $statement->bindParam(':username', $username, PDO::PARAM_STR);  //bindparam will stop SQL injections by subsituting the values and PDO:_ARAM_STR tells PHP to treat the input as strings.
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) { 
            header('Location:index.php'); //redirect to home page
            die;
        
        } 
        else{
            echo "It didnt work";
        }
       

    } 
        catch(PDOException $error) { //error handler
        echo $sql . "<br>". "oh god it didn't work" . $error->getMessage();
        }
      
      
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
   <h1>LOGIN</h1>
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
