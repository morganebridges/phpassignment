<?php
    include 'functions.php';
    //mysqli connection object
    $mysqli = new mysqli("localhost","root","","users");

    $sanitized_username = htmlspecialchars($_POST["username"]);
    $sanitized_password = htmlspecialchars($_POST["password"]);
    $sanitized_password_confirm = htmlspecialchars($_POST["password2"]);
    
    if(!($sanitized_password === $sanitized_password_confirm)){
        echo "Password and password confirmation were not the same, please try again";
        return;
    }
    /**
     * Queries to be used for the register page
     */
    
    $select_all_users = "SELECT * FROM USERS";

    //Queries to use prepared statements
    $select_user_by_name = "SELECT * FROM USERS WHERE username = ";
    $insert_user = "INSERT INTO USERS (username, password, isActivated) VALUES (";
    $insert_user .= escapeString($sanitized_username);
    $insert_user .= "," . escapeString($sanitized_password);
    $insert_user .= ", 1)";
    
    $select_user_by_name .= "'". $sanitized_username."'";
    $userExists = false;
    
    if($result_set = $mysqli->query($select_user_by_name)){

        while($row = $result_set->fetch_assoc()) {
            echo "User found matching passed in username, user will not be created <br>";
            echo "username :" . $row['username'] . " password:". $row['password'];
             return;
            
        }
    }else{
        echo "query failed";
    }
    
    if(!$userExists){
        echo 'creating user<br>';
        if($result_set = $mysqli->query($insert_user)){
            echo "User created <br>";
        
    }else{
        echo "query failed";
    }
    }
   

