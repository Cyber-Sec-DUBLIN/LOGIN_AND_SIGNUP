<?php 
     $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password']; //REPLACE THIS WITH INCLUDE!!
//this is for the login page since the code I used to do the checking of the DB didn't seem to work properly with the array, though this is absolutley an issue of skill for me



     $new_account = array( //creating an array where in which the variables are equal to the items in the forum below
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
       
    );
?>