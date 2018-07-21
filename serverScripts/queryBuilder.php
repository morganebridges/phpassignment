<?php
function constructFindUserByNameQuery($username){
    $select_user_by_name = "SELECT * FROM USERS WHERE username = ";
    $select_user_by_name .= escapeString($username);
    return $select_user_by_name;
}

function insertUser($username, $password){
    
    $insert_user = "INSERT INTO USERS (username, password, isActivated) VALUES (";
    $insert_user .= escapeString($username);
    $insert_user .= "," . escapeString($password);
    $insert_user .= ", 1)";
    return $insert_user;
}

