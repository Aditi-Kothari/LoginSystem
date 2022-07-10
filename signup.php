<?php
require "dbconnect.php";
 $errors =array('emailErr' =>'', 'passErr' =>'' ,'cpassErr'=>'');
 $email = $pass = $cpass  = "";
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

if(empty($_POST["cpassword"])) {
    $errors['cpassErr']  = "Password is required";
}else{
    $cpass = test_input($_POST["cpassword"]);
}

if($pass != $cpass){
    $errors['cpassErr']  = "Passwords do not match!";
}

//check if email id is already registered or not
$emailquery = "SELECT 1 FROM users WHERE Username = '$email'";
$selectresult= mysqli_query($conn,$emailquery);
if(mysqli_num_rows($selectresult)>0){
    $errors['emailErr']   = "E-mail already exists!";
}

if(array_filter($errors)){
    echo "errors";
   }else {
       $hash=password_hash($pass, PASSWORD_DEFAULT);
    $sql="INSERT INTO `users` (`Sr.no`, `Username`, `Password`, `Date`) VALUES (NULL,'$email','$hash',current_timestamp())";
   $result= mysqli_query($conn,$sql);
  
           if($result){
              $successmsg = true;
           }else{
               echo"error" .mysqli_error($conn);
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require "nav.php";

?>

 <div class="wrapper">
     <?php
     if($successmsg){
         echo "<h2 style='color:green; '>Your Account has created Sucessfully!</h2>";
     }
     ?>
        <div class="title">
            Sign Up
        </div>
      
        <form action="/Login system/signup.php" method="post">
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
                <label>Confirm Password</label>
                <input type="password" class="input" name="cpassword">
            </div>
            <span class="error"><?php echo $errors['cpassErr'];?></span>
            <div class="input_field">
                <input type="submit" value="Sign Up" class="btn" name="submit">
            </div>
            
        </div>
        </form>
    </div>
</body>
</html>
