
<?php
session_start();  //aiter kaj holo display te join er age login kora lagbe
$userprofile =$_SESSION['user_name'];   
$userid=$_SESSION['user_id'];
?>

<div class="font-bold">
<?php
if($userprofile==true){  
echo "User Name "." ".$userprofile."<br>" ;
echo "Id no is "." ".$userid;

}else{
    header('location:login.php');
}
?>
</div>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>




          <!-- This is the body part of html -->
<body>

<h1 class="text-xl text-center text-amber-800 font-bold">Home page</h1>

<?php

include("menubar.php");    //menubar.php file a menubar create kora ase ai khane just include korechi

?>

<h1 class="mt-10 mb-20 text-5xl text-center font-extrabold bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-700 bg-clip-text text-transparent">
    Welcome to our <br> Foodify
</h1>

<h2 class="text-xl text-center text-gray-600 ">Go to Order items for Ordering food in our foodify</h2>
 
            <!-- This is logout part -->
 <div class="flex justify-center mt-30">            
<a href="logout.php"><input type="submit" value="Logout" class="text-center bg-amber-600 rounded-xl p-1.5 font-lightbold cursor-pointer hover:bg-amber-400 px-3"></a>   
</div>
</body>
</html>