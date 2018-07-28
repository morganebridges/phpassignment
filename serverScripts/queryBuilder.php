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

function insertUserProfile($displayName, $bio, $quote, $imageFile, $userFk){
    $insert_profile = "INSERT INTO USER_PROFILE (display_name, bio, registration_date, quote, image_file, user_fk) VALUES (";
    //This time I'm chaining my concatenation instead of concatenating each field together
    $insert_profile .= escapeString($displayName)
            .","
            .escapeString($bio)
            .","
            ."NOW()"
            .","
            .escapeString($quote)
            .","
            .escapeString($imageFile)
            .","
            .$userFk;
    
    $insert_profile.= ");";
    return $insert_profile;
}

