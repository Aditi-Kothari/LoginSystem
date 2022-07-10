
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="style.css">
</head>
<body>
    
<header>
    <a href="start.php" class="logo"><span>Food</span>Fur</a>

    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a  href="start.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">SignUp</a></li>  
        </ul>
    </nav>
</header>
</body>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
    $('#menu').click(function(){
    $(this).toggleClass('fa-times');
    $(".navbar").toggleClass("nav-toggle");
    })
    $(window).on("scroll load",function(){

        $("#menu").removeClass('fa-times');
            $(".navbar").removeClass("nav-toggle");

     if($(window).scrollTop() > 60){
         $("header").addClass("header-active");
     }else{
        $("header").removeClass("header-active");
     }
        
    })
})
</script>
</html>
