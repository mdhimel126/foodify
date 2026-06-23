<?php

session_start();
include("connection.php");
$userprofile=$_SESSION['user_name'];
$id=$_SESSION['user_id'];


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
    
<h1 class="text-center mt-10 font-extrabold text-2xl">Show your Profile</h1>
<br><br>

<?php

  $filter="select * from register where id='$id'";  //6
  $result=mysqli_query($conn,$filter);
  $row=mysqli_fetch_assoc($result);


  $total_orders="select count(*) as total from orders where id='$id' ";  //new 1
  $total_orders_result=mysqli_query($conn,$total_orders);
  $total_count=mysqli_fetch_assoc($total_orders_result);

  $total_price="select sum(total_price) as total_orders_price from orders where id='$id'"; //new 2
  $total_price_result=mysqli_query($conn,$total_price);
  $price=mysqli_fetch_assoc($total_price_result);


  ?>

  <div class="text-end">
<a href="display.php" class=" bg-amber-400 rounded-xl p-1.5 font-lightbold cursor-pointer mt-20 px-2 mr-2 ">Back</a>
</div>



 <div class="flex flex-col justify-center items-center ">
    <div class="grid grid-cols-2 space-x-6">
         <p class="font-bold">ID:</p>  <?php echo $row['id'] ?>;
           
         <p class="font-bold"> Name:</p> <?php echo $row['name'] ?>; 
           
         <p class="font-bold">Email/User-Name:</p>  <?php echo $row['email']?>;
          
         <p class="font-bold">District:</p>   <?php echo $row['district']?>;
          
        <p class="font-bold">Divition:</p>   <?php echo $row['divition']?>;
        
        <p class="font-bold">Phone </p>  <?php echo $row['phone']?>;
       </div>
 </div>

 <div class="mt-8 ">
   <span class="bg-[#95E7D0] rounded-sm px-2 py-1">Total orders: <?php  echo $total_count['total']  ?> </span>
   <br>
   <br>
   <span class="bg-[#95E7D0] rounded-sm px-2 py-1" >Total Orders Price: <?php   echo $price['total_orders_price'] ?></span>
 </div>


 <div class="text-center mt-28">
 <a href="------updateProfile.php"><button class=" bg-[#1DABB3] rounded-sm px-2 py-1.5 cursor-pointer ">Update Profile</button></a>
 <br>
  <a href="------changePassword.php"><button class="mt-4 bg-[#1DABB3] rounded-sm px-2 py-1.5 cursor-pointer">Change Password</button></a>
</div>

</body>
</html>