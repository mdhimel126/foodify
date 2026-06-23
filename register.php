

                 <!-- done -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Register</title>
</head>
<body>
    <div class="flex gap-3 justify-center items-center h-screen">
         <form action="#" method="POST" autocomplete="off">

         <div class="flex flex-col "> 
                <h1 class="text-2xl text-amber-600 font-extrabold  mb-10">Registration form</h1>

             <input type="text" name="name" placeholder="Enter your full name" class="border-1">

             <br>

             <input type="text" name="email" placeholder="Enter email address" class="border-1">

             <br>

             <input type="text" name="district" placeholder="Enter district" class="border-1">

             <br>

             <input type="text" name="divition" placeholder="Enter divition" class="border-1">

             <br>

             <input type="text" name="number" placeholder="Phone Number" class="border-1">

             <br>

             <input type="password" name="password" placeholder="Give password" class="border-1">


             <br>
             
             <input type="submit" value="submit" name="submit" class="bg-amber-400 text-center">
         </div>
        </form>
   </div>

</body>
</html>


<?php
include("connection.php");

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $district=$_POST['district'];
    $divition=$_POST['divition'];
    $phone=$_POST['number'];
    $password=$_POST['password'];

    $query="insert into register (name,email,district,divition,phone,password) values('$name','$email','$district','$divition','$phone','$password')"; //23

    mysqli_query($conn,$query);
    header('location:index.php');
}

?>