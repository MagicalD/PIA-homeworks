
<?php



?>


<!DOCTYPE html>
<html>
<head>
    <title>IMDb Sign-in</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <img src = "imdb.png" class = "image"> 
    <form action="login-check.php" method="post" class="a">
        <p class="start">Sign-In</p>

        <?php if(isset($_GET['error'])){ ?>
             <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>

        <label>User Name or Email</label>
        <input type="text" name="uname" > 
        <label>Password </label>
        <input type="password" name="password" > 

        <button type="submit">Sign-In</button>

        <a href="signup.php" class="create">Create an account </a>
    </form>
</body>
</html>