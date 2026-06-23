
<?php
session_start();
include("connection.php");
$id=$_SESSION['user_id'];

$query="select password from register where id='$id'"; //1
$result=mysqli_query($conn,$query);
$password=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>
<body>
    
  <h1 class="text-center text-2xl mt-6 mb-20">Change Password</h1>
    <a href="------profile.php" class="text-center bg-amber-400 rounded-xl p-1.5 font-lightbold cursor-pointer mt-20 px-2 ml-2">Back</a>

<form action="" method="POST" class="flex items-center justify-center">

    <div class="flex flex-col w-2/8 gap-4">
        <input type="text" name="old_password" placeholder="Enter old Password" class="border-1">
        <input type="text" name="new_password" placeholder="Enter new Password" class="border-1">
        <input type="submit" name="submit" class="bg-amber-400 px-2 rounded-lg">
    </div>
</form>


</body>
</html>


<?php

if(isset($_POST['submit'])){

   $old_password=$_POST['old_password'];
   $new_password=$_POST['new_password'];

   if($old_password!=$password['password']){
    echo "old Password mismatch";
   }else{

   $update="update register set password='$new_password' where id='$id' "; //2
   mysqli_query($conn,$update);
   echo "****password changed****";
   }

 
}

?>