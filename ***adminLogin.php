<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>
<body>


    <div class="h-screen flex flex-col items-center justify-center mx-auto ">

    <h1 class="mb-6 text-amber-600 font-extrabold">ADMIN LOGIN</h1>

    <form action="#" method="POST" autocomplete="off">

        <div class="flex flex-col">
        <input type="text" name="admin_id" placeholder="Admin id" class="border-1" >
        <br>
        <input type="password" name="admin_password" placeholder="Admin password" class="border-1" >
        
        <br>
        <input type="submit" name="admin_login" value="admin_login" class="bg-amber-400 hover:bg-amber-500 pointer-cursor">
         </div>
    </form>
    <a href="index.php " class="mt-4 text-amber-700">Goto User login page</a>

</div>

</body>
</html>


<?php

include("connection.php");

if(isset($_POST['admin_login'])){

  $admin_id=$_POST['admin_id'];
  $admin_password=$_POST['admin_password'];

  $query="select * from admin_login where id='$admin_id' && password='$admin_password' ";//20

  $data=mysqli_query($conn,$query);

  $total=mysqli_num_rows($data);

  if($total==1){

    // $_SESSION['admin_id']=$admin_id;
    header('location:***adminDashboard.php');
  }else{
    echo "invalid password given";
  }

  }

?>