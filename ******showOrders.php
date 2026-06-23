<?php
include("connection.php");

if(isset($_POST['update_status'])){
    $update_status=$_POST['status'];
    $order_id=$_POST['order_id'];

    $update_sql="update orders set status='$update_status' where orders_id='$order_id'"; //12

    mysqli_query($conn,$update_sql);
}

$where=[];

if(!empty($_GET['show_status'])){
    $status=$_GET['show_status'];
    $where[]="orders.status='$status'";
}

if(!empty($_GET['name_search'])){
    $name_search=$_GET['name_search'];
    $where[]="register.name like '%$name_search%'";
}

if(!empty($_GET['product_search'])){
    $product_search=$_GET['product_search'];
    $where[]="product.product_name like '%$product_search%'";
}

$sql="select orders.*,register.name,product.product_name
       from orders join register on orders.id=register.id
       join product on orders.product_id=product.product_id  "; //13

if(count($where)>0){
    $sql .=" where ".implode(" and ",$where);  //14
}

$result=mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>
<body class="mt-4">

<h1 class="text-xl text-center font-semibold text-amber-600">Show all Orders record</h1>



<div class="text-end mb-6"><a href="***adminDashboard.php" class="text-center bg-amber-400 rounded-xl p-1.5 font-lightbold cursor-pointer hover:bg-amber-500 mt-20 px-2 ml-2">Back</a></div>

   <!-- filtering -->
<form action="" method="GET">

    <select name="show_status" id="" class="border">
        <option value="">All</option>
        <option value="Pending">Pending</option>
        <option value="On the way">On the way</option>
        <option value="Delivered">Delivered</option>
    </select>

    <input type="text" placeholder="Search by name" name="name_search" class="border">

    <input type="text" placeholder="search By product" name="product_search" class="border">

    <button class="bg-amber-500 rounded-sm px-2 cursor-pointer">Filter</button>

</form>

<table class="mt-10 w-3/4 ml-4">

     <thead>
        <tr>
            <th>Name</th>
            <th>Order id</th>
            <th>Product id</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total price</th>
            <th>Id</th>
            <th>Status</th>
        </tr>
     </thead>

     <tbody>


<?php



while($row=mysqli_fetch_assoc($result)){
    ?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['orders_id']; ?></td>
<td><?php echo $row['product_id'] ?></td>
<td><?php echo $row['product_name'] ?></td>
<td><?php echo $row['quantity'] ?></td>
<td><?php echo $row['total_price'] ?></td>
<td><?php echo $row['id']?></td>
<td><?php echo $row['status'] ?></td>
    

    <td>   <form action="" method="POST">
    <input type="hidden" name="order_id" value="<?php echo $row['orders_id'];   ?>">

   <select name="status" class="border-1">
    <option value="">Status</option>
    <option value="Pending">Pending</option>
    <option value="On the way">On the way</option>
    <option value="Delivered">Delivered</option>
   </select>

   <button type="submit" name="update_status" class="bg-blue-300 cursor-pointer hover:bg-blue-400 rounded-sm px-2 border ">update</button>

   </form>
   </td>


</tr>
<?php
}

?>
</tbody>
</table>
    
</body>
</html>


