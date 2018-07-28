<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="serverScripts/register.php" method="post" enctype="multipart/form-data">
    <h1>Register Page!</h1>
    <h3> Authentication</h3>
    <label for="username">Username</label>
    <input type="text" name="username" label="Username"><br>
    <label for="password"  >Password</label>
    <input type="text" name="password" label="Password"><br>
    <label for="password"  >Confirm Password</label>
    <input type="text" name="password2" label="Password">
    <br><br>
    
    <h3>User Profile</h3>
    <label for="displayName">Display Name</label>
    <input type="text" name="displayName" label="Display Name"><br>
    <label for="bio">Bio</label>
    <textarea cols="30" rows="10" name="bio" label="bio"></textarea><br>
    <label for="quote">Quote</label>
    <input type="text" name="quote" label="quote">
    <label for="fileToUpload">File To Upload</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    
    
    <label for="submit">Submit</label>
    <input type="submit">
</form>