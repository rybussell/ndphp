<?php

require_once("../config.php");
require_once("lib.php");

if(isset($_POST['submit'])){
    
    if (($_POST['login'] == "") OR (strcasecmp($_POST['login'],$_POST['login2']) <> 0)) {
      
      $emails = "Logins Different";
      $count++;
      
    }

    if(($_POST['pass'] == "") OR ($_POST['pass'] <> $_POST['pass2'])) {
    
    $passes = "Passwords different";
    $count++;

    }
    
    if(!filter_var($_POST['login'],FILTER_VALIDATE_EMAIL)) {
      $emails .= "<br />Looks like an invalid email address";
      $count++;
      
    } 

    if($count == 0) {

    $hashpassword = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $sql = "insert into `users` (`login`,`password`) values ('" . $_POST['login'] ."','" . $hashpassword . "')";
    if(mysqli_query($conn,$sql)) {
    echo "Account added successfully, but an admin will have to activate you!";
    } 
    else {
    echo "Account not added.<br />" . mysqli_error($conn);
    }

    }
}

echo "<link href='style.css' rel='stylesheet' type='text/css'>";


echo "<center><div>
<h1>Register an Account</h1><br/>
<form action='" . $_SERVER['PHP_SELF']. "' method='post'>
<table border=0>
<tr><td> </td><td><b style='background:red;'>$emails</b></td></tr>
<tr><td>Email: </td><td><input type=text name='login' id='login' placeholder='Email Address' required></td></tr>
<tr><td>Verify Email: </td><td><input type=text name='login2' id='login2' placeholder='Verify Email' required></td></tr>
<tr><td> </td><td><b style='background:red;'>$passes</b></td></tr>
<tr><td>Password: </td><td><input type=password name='pass' id='pass' placeholder='Password' required></td></tr>
<tr><td>Verify Password: </td><td><input type=password name='pass2' id='pass2' placeholder='Verify Password' required></td></tr>
<tr><td> </td><td><button type='submit' name='submit'>Submit</button></td></tr>
<tr><td> </td><td style='font-size:11px;'>Already Registered? <a href='login.php' title='Login' style='color:red;'>Log In</a></td></tr>

</table></form>

</div></center>";



?>
