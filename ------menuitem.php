<?php
  session_start();
   include("connection.php");
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
    <title>Document</title>
</head>
<body>
      <h1 class="text-xl text-center text-amber-800 font-bold mt-10">Menu page</h1>


<?php
include("menubar.php");


//total item

        $total_items="select count(product_id) as total_product from product "; //new 3
        $total_items_result=mysqli_query($conn,$total_items);
        $items=mysqli_fetch_assoc($total_items_result);

        // lowest item

        $lowest_item="select min(product_price) as lowest_price from product";// new 4
        $lowest_item_result=mysqli_query($conn,$lowest_item);
        $lowest_result=mysqli_fetch_assoc($lowest_item_result);

        //highest item

        $highest_item="select max(product_price) as highest_price from product"; //new 5
        $highest_item_result=mysqli_query($conn, $highest_item);
        $highest_result=mysqli_fetch_assoc($highest_item_result);

?>


   <span class="bg-[#95E7D0] rounded-sm px-2 py-1 ml-2">Total items:   <?php echo $items['total_product'] ?>  </span>
   <span class="bg-[#95E7D0] rounded-sm px-2 py-1 ml-4">Lowest Price:  <?php echo $lowest_result['lowest_price'] ?>  </span>

         <span class="bg-[#95E7D0] rounded-sm px-2 py-1 ml-4">Highest Price:   <?php echo $highest_result['highest_price'] ?>  </span>

   

    <div class="grid grid-cols-4  gap-6 space-y-10  list-decimal pl-5 mt-4">
          <!-- this is unorder list -->

    


         <div>
            <img src="pizza.webp" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">Pizza</p>
            <p class="font-medium">Order-id:101</p>
            <p class="font-medium">Price:500</p>
        </div>
       

         <div>
            <img src="burger.webp" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">Burger</p>
            <p class="font-medium">Order-id:102</p>
            <p class="font-medium">Price:150</p>
        </div>


           <div>
            <img src="hotdog.jpeg" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">HotDog</p>
            <p class="font-medium">Order-id:103</p>
            <p class="font-medium">Price:120</p>
        </div>


           <div>
            <img src="frenchfries.jpeg" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">French Fries</p>
            <p class="font-medium">Order-id:104</p>
            <p class="font-medium">Price:250</p>
        </div>


           <div>
            <img src="sandwich.jpeg" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">Sandwich</p>
            <p class="font-medium">Order-id:105</p>
            <p class="font-medium">Price:220</p>
        </div>


           <div>
            <img src="friedchicken.jpeg" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">Fried chicken</p>
            <p class="font-medium">id=106</p>
            <p class="font-medium">Price:180</p>
        </div>



           <div>
            <img src="shawarma.jpeg" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">Shawarma</p>
            <p class="font-medium">Order-id:107</p>
            <p class="font-medium">Price:250</p>
        </div>



           <div>
            <img src="kacchibiriyani.jpeg" alt="" class="rounded-lg w-full h-56">
            <p class="text-center font-semibold">Kacchi Biryani</p>
            <p class="font-medium">Order-id:108</p>
            <p class="font-medium">Price:300</p>
        </div>


        <br>
        
  
    </div>

    <h1 class="text-xl text-center text-amber-600 font-extrabold">Fill up the box for order</h1>

                <!-- This is the order form  -->

    <div class="mb-10 mt-10">
        <form action="" method="POST">
          <div class="flex flex-col gap-[5px] w-1/4 "> 
            <div>
            <label for="">Product id  :</label>  
             <input type="text" name="product_id" placeholder="Give product id" class="border-1 border-gray-900">
             </div>
              
             <div>
              <label for="">Quantity  :</label>
             <input type="text" name="quantity" placeholder="Give quantity" class="border-1 border-gray-900">
             </div>
             
             <input type="submit" name="order" value="order" class="bg-[#1DABB3] rounded-lg px-2 cursor-pointer">
          </div>
        </form>
    </div>
</body>
</html>
              
           <!-- This is the important part  -->
              
                     <!-- php part -->

  <?php

    
     if(isset($_POST['order'])){
        $user_id=$_SESSION['user_id'];
        $user_email=$_SESSION['user_name'];
        $product_id=$_POST['product_id'];
        $quantity=$_POST['quantity'];


                 //track price by using sql

        $sql="select product_price from product where product_id='$product_id'"; //3
        $result=mysqli_query($conn,$sql);

        $row=mysqli_fetch_assoc($result);

        $price=$row['product_price'];

        $total_price=$price*$quantity;

               //now insert this order in orders table
        $insert ="insert into orders (product_id,quantity,total_price,id,email) 
        values
        ('$product_id','$quantity','$total_price','$user_id','$user_email')";  //4
        }

        mysqli_query($conn,$insert);
        echo"order successful";

    ?>