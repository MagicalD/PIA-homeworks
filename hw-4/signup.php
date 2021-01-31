<?php 

include "db_conn.php";

$email = $uname = $name = $password = $re_enter = '';
$errors = array('name' => '', 'uname' => '','email' => '', 'password' => '','re_enter' => '');


	if(isset($_POST['submit'])){
		
		// check name
		if(empty($_POST['name'])){
			$errors['name']= 'Name is required <br />';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name']= 'Name must be letters and spaces only';
			}
		}
		// check uname
		if(empty($_POST['uname'])){
			$errors['uname'] = 'An User name is required <br />';
		} else{$uname = $_POST['uname'];}
        
        // check email  
		if(empty($_POST['email'])){
            $errors['email']= 'An email is required <br />';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email']= 'Email must be a valid email address';
            }
        }
        // check password
		if(empty($_POST['password'])){
			$errors['password'] = 'A password is required <br />';
        } /*else if($password < '8'){
            $errors['password'] = 'Password must be at least 8 characters <br />';
         }  */ 

		// check re_enter
		if(empty($_POST['re_enter'])){
			$errors['re_enter'] =  'You didn\'t re-enter the password  <br />';
		} else if($password != $re_enter){
            $errors['re_enter'] = 'Passwords must match';
        }

        if(array_filter($errors)){
			//echo 'errors in form';
		} else {
            //echo 'form is valid';
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $uname = mysqli_real_escape_string($conn, $_POST['uname']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            // create sql
			$sql = "INSERT INTO info(name,uname,email,password) VALUES('$name','$uname','$email', '$password')";

            // save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}


	} // end POST check

?>

<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <img src="imdb.png" class="image">
    <form  action="signup.php" method="post" class="b">
        <p class="start">Create account</p>

        <label>Your name</label>
        <input type="text" name="name" value = "<?php echo $name?>"> 
        <div class="red-text"><?php echo $errors['name'];?></div>
        <label>User name</label>
        <input type="text" name="uname" value = "<?php echo $uname?>" > 
        <div class="red-text"><?php echo $errors['uname'];?></div>
        <label>Email</label>
        <input type="text" name="email" value = "<?php echo $email?>"> 
        <div class="red-text"><?php echo $errors['email'];?></div>
        <label>Password </label>
        <input type="password" name="password" placeholder="at least 8 characters"> 
        <div class="red-text"><?php echo $errors['password'];?></div>
        <label>Re-enter password </label>
        <input type="password" name="re_enter" > 

        <button type="submit" name="submit" value="Submit">Sign Up</button>

        <a href="index.php" class="create">Already have an account? </a>
    </form>
</body>
</html>