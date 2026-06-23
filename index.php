
         <!-- done -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

         <!-- this is html body part -->
<body>

<h1 class="mt-10  text-4xl text-center font-extrabold text-[#22878A]"> Foodify </h1>
 <p class="mt-10 text-gray-500 text-center">If you don't have any account click the register button</p>
<div class="flex flex-col items-center justify-center  mx-auto mt-10">

    <h1 class="text-2xl text-amber-600 mb-6 font-bold">LOGIN</h1>

    <form action="#" method="POST" autocomplete="">

        <div class="flex flex-col">
            <label for="" class="font-semibold">Email </label>
            <input type="text" name="username" placeholder="Enter email" class="border-1 rounded-sm" >
             <br>
             <label for="" class="font-semibold">Password </label>
            <input type="password" name="password" placeholder="Enter password" class="border-1 rounded-sm" >
             <br>
            <div><a href="#">Forget Password?</a></div>
            <br>
            <input type="submit" name="login" value="Login" class="bg-amber-400 hover:bg-amber-500 cursor-pointer rounded-sm">

            <button class="text-end font-medium"><a href="register.php">register</a></button>
        </div>

    </form>

    <h1 class="text-base text-amber-700 font-semibold"><a href="***adminLogin.php">Goto admin login page</a></h1>
</div>

    
</body>
</html>



             <!-- This is php part -->

<?php

session_start();
  include("connection.php");   //include korechi cause connection.php file a connection er code access korer jonno

  if(isset($_POST['login'])){  //isset means if user click the login button then the perfom start

  $username=$_POST['username'];   //take username for matching database email
  $password=$_POST['password'];   //take password for matching database password

  $query="select * from register where email='$username' && password='$password' ";  //22

  $data=mysqli_query($conn,$query);    //connect form with database

  $total=mysqli_num_rows($data);     //check how many rows is here

  if($total==1){

       $row=mysqli_fetch_assoc($data);   // bring the data by using fetch
    $_SESSION['user_name']=$row['email'];   
    $_SESSION['user_id']=$row['id'];

    header('location:display.php');   //if identity is true then join display page
  }else{
    echo "invalid password given";
  }

  }


?>