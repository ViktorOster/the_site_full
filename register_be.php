<?php
include('connection.php');
$connection = new mysqli(host,user,password,db);


if(isset($_POST['action']))
{         
    if($_POST['action']=="signup")
    {
        $name       = mysqli_real_escape_string($connection,$_POST['name']);
        $gamername  = mysqli_real_escape_string($connection,$_POST['gamername']);
        $email      = mysqli_real_escape_string($connection,$_POST['email']);
        $password   = mysqli_real_escape_string($connection,$_POST['password']);
        $query = "SELECT email FROM users where email='".$email."'";
        $result = mysqli_query($connection,$query);
        $numResults = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
        }
        elseif($numResults>=1)
        {
            $message = $email." Email already exist!!";
        }
        else
        {
            $rand     = rand(0, 50);
            $stmt = $connection->prepare("INSERT INTO `users`(`name`, `gamername`, `email`, `password`,`img`) VALUES ('".$name."','".$gamername."','".$email."','".md5($password)."',$rand)");
            $stmt->execute();
            $stmt->close();
            $message = "Signup Sucessfully!!";
            header("Location:index.php");
            
        }
    }
}

?>