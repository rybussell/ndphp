<?php


require_once("../config.php");
require_once("lib.php");

if(isset($_POST['submit'])){
	$email = e($_POST['login']);
	$password = trim($_POST['pass']);
	
	$sql = "select login,password,blocked from `users` where login = '".$email."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
        $row = mysqli_fetch_assoc($rs);
	
    if($row['blocked'] == 0){	
        if($numRows  == 1){
		
            
		if(password_verify($password,$row['password'])){
			echo "Password verified<br />";
		}
		else{
			echo "Wrong Password";
		}
            // else { echo "Account not yet activated.";
	}
	else { echo "No User Found.";}
        }
    else {
        echo "Account not yet activated.";
    
        
}
 
echo "<link href='style.css' rel='stylesheet' type='text/css'>";

echo "<center><div>

<h1>Order Tracking Login</h1><br /><br />
<table border=0><form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
<tr><td>Email: </td><td><input type='text' name='login' id='login' required placeholder='Email Address'></td></tr>
<tr><td>Password: </td><td><input type='password' name='pass' id='pass' required placeholder='Password'></td></tr>
<tr><td> </td><td><button type='submit' name='submit'>Submit</button></td></tr>
<tr><td> </td><td style='font-size:11px;'>Need to <a href='register.php' title='Register' style='color:red;'>Register</a></td></tr>
</form>
</table>
</div></center>
";


?>
