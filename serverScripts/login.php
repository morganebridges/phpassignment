<?php
    include 'functions.php';
    $mysqli = new mysqli("localhost","root","","users");
    $select_user_by_name = "SELECT * FROM USERS WHERE username = ";
    $select_user_by_name .= escapeString(htmlspecialchars($_POST["username"]));
    $select_user_by_name .= " AND password = " . escapeString($_POST["password"]);
    if($result_set = $mysqli->query($select_user_by_name)){

        if($result_set->num_rows > 0){
            echo "User found matching passed in Username, User will be logged in. <br>";
        }else{
            echo "<br>Username / Password is invalid";
        }
    }
