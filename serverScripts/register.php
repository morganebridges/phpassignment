<?php
    include 'functions.php';
    include 'queryBuilder.php';
    include 'constants.php';
    //mysqli connection object
    $mysqli = new mysqli("localhost","root","","users");

    $sanitized_username = htmlspecialchars($_POST["username"]);
    $sanitized_password = htmlspecialchars($_POST["password"]);
    $sanitized_password_confirm = htmlspecialchars($_POST["password2"]);
    
    //User profile information
    
    $displayName = htmlspecialchars($_POST["displayName"]);
    $bio = htmlspecialchars($_POST["bio"]);
    $quote = htmlspecialchars($_POST["quote"]);
    $imageFileName = basename($_FILES["fileToUpload"]["name"]);

    if(!($sanitized_password === $sanitized_password_confirm)){
        echo "Password and password confirmation were not the same, please try again";
        return;
    }
    $userExists = false;
    
    if($result_set = $mysqli->query(constructFindUserByNameQuery($sanitized_username))){
        $user_id;
        while($row = $result_set->fetch_assoc()) {
            echo "User found matching passed in username, user will not be created <br>";
            echo "username :" . $row['username'] . " password:". $row['password'];
             $userExists = true;
        }
        
    }else{
        echo "query failed";
    }
    
    if(!$userExists && validateForm()){
        echo 'creating user<br>';
        if($result_set = $mysqli->query(insertUser($sanitized_username, $sanitized_password))){
            echo "User created <br>";
            $userFk = $mysqli->insert_id;
            $mysqli->query(insertUserProfile($displayName, $bio, $quote, $imageFileName, $userFk));
            submitImage($userFk);
        }
          
    }
    
    /**
     * This function accepts an upload of an image and writes it out to the user's directory
     * @param integer $userId
     */
    function submitImage($userId){
        $target_dir = "uploads/$userId/"; //String interpolation is available this way in PHP, but not suggested
        createDirIfNeeded($target_dir);
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    function validateForm(){
        return isset($_POST['username']) && isset($_POST['password'])
            && isset($_POST['password2']) && isset($_POST['displayName'])
            && isset($_POST['bio']) && isset($_POST['quote']);
    }
   

