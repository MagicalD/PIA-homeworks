<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $admin = validate("admin");

    if(empty($uname)){
        header("Location: index.php?error=User Name or Email is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $pass = md5($pass);
        $sql = "SELECT * FROM users WHERE (user_name='$uname' OR email='$uname') AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result); //podaci
            if(($row['user_name'] === $uname || $row['email'] === $uname)  && $row['password'] === $pass){
                if($row['admin'] === $admin){
                    header("location:home.php");
                }
                else{header("location:home.php");                            
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                }
            exit();  
            }
        }
        else{
            header("location:home.php");
            /*header("Location: index.php?error=Incorect User Name or Password");*/
            exit();           
        }
    }
}
 else{
    header("Location: index.php");
    exit();
}