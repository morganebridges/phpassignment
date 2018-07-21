<?php
    include 'functions.php';
    include 'queryBuilder.php';
    include 'constants.php';
    //mysqli connection object
    $mysqli = new mysqli("localhost","root","","users");

    $sanitized_username = htmlspecialchars($_POST["username"]);
    $sanitized_password = htmlspecialchars($_POST["password"]);
    $sanitized_password_confirm = htmlspecialchars($_POST["password2"]);
    
    if(!($sanitized_password === $sanitized_password_confirm)){
        echo "Password and password confirmation were not the same, please try again";
        return;
    }
    $userExists = false;
    
    if($result_set = $mysqli->query(constructFindUserByNameQuery($sanitized_username))){

        while($row = $result_set->fetch_assoc()) {
            echo "User found matching passed in username, user will not be created <br>";
            echo "username :" . $row['username'] . " password:". $row['password'];
             $userExists = true;
        }
    }else{
        echo "query failed";
    }
    
    if(!$userExists){
        echo 'creating user<br>';
        if($result_set = $mysqli->query(insertUser($sanitized_username, $sanitized_password))){
            echo "User created <br>";
        
    }else{
        return;
    }
}
   

