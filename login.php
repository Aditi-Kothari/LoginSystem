
<?php
require "dbconnect.php";
 $errors =array('emailErr' =>'', 'passErr' =>'' );
 $email = $pass =  "";
 $successmsg = false;
if(isset($_POST['submit'])){


 if (empty($_POST["username"])) {
    $errors['emailErr']  = "Email is required";
} else {
$email = test_input($_POST["username"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailErr']   = "Invalid email format";
}
}

if(empty($_POST["password"])) {
    $errors['passErr']  = "Password is required";
}else{
    $pass = test_input($_POST["password"]);
}


if(array_filter($errors)){
    echo "errors";
   }else {
    $sql="SELECT * from `users` WHERE Username='$email'";
   $result= mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);

           if($num == 1){
               while($row=mysqli_fetch_assoc($result)){
                   if(password_verify($pass,$row['Password'])){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $email;
     
                    header("Location: welcome.php");
                   }
                   else{
                    echo"error" .mysqli_error($conn);
                    $successmsg = true;
                }
               }
               
           }else{
               echo"error" .mysqli_error($conn);
               $successmsg = true;
           }
           
       }
   
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require "nav.php";

?>

 <div class="wrapper">
     <?php
     if($successmsg){
         echo "<h4 style='color:red; '>Invalid Credentials!!</h4>";
     }
     ?>
        <div class="title">
          Log In
        </div>
      
        <form action="/Login system/login.php" method="post">
        <div class="form">
            <div class="input_field">
                <label>E-mail Address</label>
                <input type="email" class="input" name="username">
            </div>
            <span class="error"><?php echo $errors['emailErr'];?></span>
            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="password">
            </div>
            <span class="error"><?php echo $errors['passErr'];?></span>
            
            <div class="input_field">
                <input type="submit" value="Login" class="btn" name="submit">
            </div>
            
        </div>
        </form>
    </div>
</body>
</html>
