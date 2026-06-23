<?php
session_start();  //aiter kaj holo display te join er age login kora lagbe
?>

<?php
$userprofile =$_SESSION['user_name'];

if($userprofile==true){  

}else{
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Contact</title>
</head>
<body>
<h1 class="text-xl text-center text-amber-800 font-bold mt-6">Contact page</h1>



<?php
include("menubar.php");

?>

   <div class="mt-10 flex flex-col items-center justify-center mx-auto ">

    <h1 class="text-base mb-6 text-amber-600 font-bold">Contuct with our Manager</h1>

    <form action="#" method="POST" autocomplete="off">

        <div class="flex flex-col">
        <input type="text" name="name" placeholder="Enter your name" class="border-1" >
        <br>
        <input type="email" name="email" placeholder="Enter your email" class="border-1" >
        <br>
        <textarea name="message" id="" class="border-1"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="submit" class="bg-amber-400">
         </div>
    </form>
</div>
</body>
</html>


<?php

include("connection.php");

if(isset($_POST["submit"])){
    $name =$_POST["name"];
    $email =$_POST["email"];
    $message=$_POST["message"];

    $sql="insert into contact(name,email,message) values('$name','$email','$message')";//21

    mysqli_query($conn,$sql);
}

?>