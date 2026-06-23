
<?php

include("connection.php");

$where=[];

if(!empty($_GET['divition_filter'])){
    $div=$_GET['divition_filter'];
    $where[]="divition='$div'";
}

if(!empty($_GET['phone_filter'])){
    $phone=$_GET['phone_filter'];
    $where[]="phone like '$phone%'";;
}

if(!empty($_GET['search'])){
    $search=$_GET['search'];
    $where[]="(name like '%$search%' or email like '%$search%')";

}

$sql="select * from register";  //15

if(count($where)>0){
    $sql .=" where ". implode(" and ", $where);  //16
}


if(!empty($_GET['sort'])){
    if($_GET['sort']=="ASC"){
        $sql .=" ORDER BY name ASC";  //17
    }else{
        $sql .=" ORDER BY name DESC"; //18
    }
}


$result=mysqli_query($conn,$sql);

$count_sql="select count(*) as total from register"; //19
$count_result=mysqli_query($conn,$count_sql);
$count_row=mysqli_fetch_assoc($count_result);
$total_users=$count_row['total'];

?>




<?php


 $dhaka_sql="select count(*) as total_dhaka_users from register where divition like '%Dhaka%'"; //new 1
 $dhaka_result=mysqli_query($conn,$dhaka_sql);
 $dhaka_count=mysqli_fetch_assoc($dhaka_result);



 $chittagong_sql="select count(*) as total_chittagong_users from register where divition like '%Chittagong%'"; //new 1
 $chittagong_result=mysqli_query($conn,$chittagong_sql);
 $chittagong_count=mysqli_fetch_assoc($chittagong_result);

  $rajshahi_sql="select count(*) as total_rajshahi_users from register where divition like '%Rajshahi%'"; //new 1
 $rajshahi_result=mysqli_query($conn,$rajshahi_sql);
 $rajshahi_count=mysqli_fetch_assoc($rajshahi_result);

 $sylhet_sql="select count(*) as total_sylhet_users from register where divition like '%Sylhet%'"; //new 1
 $sylhet_result=mysqli_query($conn,$sylhet_sql);
 $sylhet_count=mysqli_fetch_assoc($sylhet_result);

 $khulna_sql="select count(*) as total_khulna_users from register where divition like '%Khulna%'"; //new 1
 $khulna_result=mysqli_query($conn,$khulna_sql);
 $khulna_count=mysqli_fetch_assoc($khulna_result);

 $barishal_sql="select count(*) as total_barishal_users from register where divition like '%Barishal%'"; //new 1
 $barishal_result=mysqli_query($conn,$barishal_sql);
 $barishal_count=mysqli_fetch_assoc($barishal_result);

 $mymensing_sql="select count(*) as total_mymensing_users from register where divition like '%Mymensing%'"; //new 1
 $mymensing_result=mysqli_query($conn,$mymensing_sql);
 $mymensing_count=mysqli_fetch_assoc($mymensing_result);
    

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
    
<h1 class="text-xl text-center font-bold mt-6 text-amber-600">All users list </h1>




<div class="text-end mb-6">
    <a href="***adminDashboard.php" class="text-center bg-amber-400 rounded-xl p-1.5 font-lightbold cursor-pointer mt-20 px-2 ml-2">Back</a>
</div>


<div class="grid grid-cols-3 mt-20">




    <!-- first div -->

<div class="col-span-2 ml-2">
<form action="" method="GET" class="flex gap-2 ">
   
    <!-- filter 1 divition -->
     
    <select name="divition_filter" id="" class="border-1">
        <option value="">All</option>
         <option value="Dhaka" >Dhaka</option>
         <option value="Mymensing">Mymensing</option>
         <option value="Khulna">Khulna</option>
        <option value="Chittagong">Chittagong</option>
    </select>

    <!-- filter 2 phone -->
    <input type="text" name="phone_filter" placeholder="Phone" class="border">

    <!-- filter 3 name/email -->
    <input type="text" name="search" placeholder="Search By email/name" class="border">

    <!-- filter 4 A-Z -->
    <select name="sort" id="" class="border">

    <option value="">sort</option>
    <option value="ASC" name="">A-Z</option>
    <option value="DESC" name="">Z-A</option>
    </select>

    <button type="submit" class="bg-amber-400 rounded-sm px-1.5 cursor-pointer hover:bg-amber-500">Filter</button>

</form>



<p class="font-bold">Total Users: <?php echo $total_users; ?></p>

     
<table  class="w-3/5 mt-10">


   <tr>
    <th class="px-8">ID</th>
    <th class="px-8">Name</th>
    <th class="px-8">Email</th>
    <th class="px-8">District</th>
    <th class="px-8">Divition</th>
    <th class="px-8">Phone</th>

   </tr>


   <?php  while($row=mysqli_fetch_assoc($result)){ ?>

   <tr>

   <td class="px-8"><?php echo $row['id']; ?></td>
   <td class="px-8"><?php echo $row['name']; ?></td>
   <td class="px-8"><?php echo $row['email']; ?></td>
   <td class="px-8"><?php echo $row['district']; ?></td>
   <td class="px-8"><?php echo $row['divition']; ?></td>
   <td class="px-8"><?php echo $row['phone']; ?></td>
   </tr>

<?php }  ?>

</table>

</div>

  <!-- second div -->


<div class="col-span-1 flex flex-col gap-2 items-end mt-16">
<span class="border border-gray-400 rounded-sm px-2 py-1 mr-2">Dhaka users: <?php  echo  $dhaka_count['total_dhaka_users']    ?></span>
<span class="border border-gray-400 rounded-sm px-2 py-1 mr-2">Sylhet users: <?php  echo  $sylhet_count['total_sylhet_users']    ?></span>
<span class="border border-gray-400 rounded-sm px-2 py-1 mr-2">Khulna users: <?php  echo  $khulna_count['total_khulna_users']    ?></span>
<span class="border border-gray-400 rounded-sm px-2 py-1 mr-2">Barishal users: <?php  echo  $barishal_count['total_barishal_users']    ?></span>
<span class="border border-gray-400 rounded-sm px-2 py-1 mr-2">Rajshahi users: <?php  echo  $rajshahi_count['total_rajshahi_users']    ?></span>
<span class="border border-gray-400 rounded-sm px-2 py-1 mr-2">Cittagong users: <?php  echo  $chittagong_count['total_chittagong_users']    ?></span>
<span class="border border-gray-400 rounded-sm px-2 py-1 mr-2">Mymensing users: <?php  echo  $mymensing_count['total_mymensing_users']    ?></span>


</div>


</body>
</html>

