
<?php
session_start();
include("connection.php");

?>

<?php

$userprofile =$_SESSION['user_name'];
$id=$_SESSION['user_id'];

if($userprofile==true){  

}else{
    header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>


<?php

 $total_my_orders="select count(*) as total_my_orders from orders where id='$id' ";  //new 1
  $total_my_orders_result=mysqli_query($conn,$total_my_orders);
  $total_my_count=mysqli_fetch_assoc($total_my_orders_result);

  $total_pending="select count(status) as total_pending from orders where status='Pending' and id='$id'";  //new 1
  $total_pending_result=mysqli_query($conn,$total_pending);
  $total_pending_count=mysqli_fetch_assoc($total_pending_result);


  $total_on_the_way="select count(status) as total_on_the_way from orders where status='On the way' and id='$id' ";  //new 1
  $total_on_the_way_result=mysqli_query($conn,$total_on_the_way);
  $total_on_the_way_count=mysqli_fetch_assoc($total_on_the_way_result);


  $total_delivered="select count(status) as total_delivered from orders where status='Delivered' and id='$id' ";  //new 1
  $total_delivered_result=mysqli_query($conn,$total_delivered);
  $total_delivered_count=mysqli_fetch_assoc($total_delivered_result);

?>


<body>



<h1 class="text-xl text-center text-amber-800 font-bold mt-6">Order Page</h1>

<?php

include("menubar.php");

?>


<div class="flex gap-2">
   <span class="bg-[#95E7D0] rounded-sm px-1.5">Total orders: <?php  echo $total_my_count['total_my_orders']  ?> </span>

   <span class="bg-[#95E7D0] rounded-sm px-1.5">Pending : <?php  echo $total_pending_count['total_pending']  ?> </span>
   
   <span class="bg-[#95E7D0] rounded-sm px-1.5">On the way: <?php  echo $total_on_the_way_count['total_on_the_way']  ?> </span>

         <span class="bg-[#95E7D0] rounded-sm px-1.5">Delivered: <?php  echo $total_delivered_count['total_delivered']  ?> </span>
      


</div>
    <br><br>


        <!-- This is the php part -->

        <table>

        <thead>
            <tr>
                <th class="px-6 ">Product name</th>
                <th class="px-6 ">Quantity</th>
                <th class="px-6 ">total price</th>
                <th class="px-6 ">Status</th>
            </tr>
        </thead>
        

        <tbody>
<?php

        // filtering data by using id (user_id)
 $filtering="select orders.*, product.product_name from orders join product on orders.product_id=product.product_id where id='$id'";  //5
 $result=mysqli_query($conn,$filtering);

 while($row=mysqli_fetch_assoc($result)){
 ?>   

     <tr>
         <td class="px-6 "> <?php echo $row['product_name']; ?> </td>
         <td class="px-6 "> <?php echo $row['quantity']; ?> </td>
         <td class="px-6 "> <?php echo $row['total_price'] ?> </td>
         <td class="px-6 "> <?php echo $row['status'] ?> </td>

    

      </tr>
 </tbody>
<?php
 }
?>
</table>

</body>
</html>
    
