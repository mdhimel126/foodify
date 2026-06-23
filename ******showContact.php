<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>
<body>
    



<?php

include("connection.php");


$where =[];

if(!empty($_GET['name_search'])){
    $name_search=$_GET['name_search'];
    $where[]="register.name like '%$name_search%'";
}

$sql="select * from contact join register on contact.name=register.name";  //10

if(count($where)>0){
    $sql .=" where ".implode(" and ",$where);  //11
}

$data =mysqli_query($conn,$sql);

$total=mysqli_num_rows($data);

// if($total != 0){

?>

<h1 class="text-xl text-amber-600 font-semibold text-center mt-4 mb-10"> All contacts</h1>

<div class="text-end mb-6"><a href="***adminDashboard.php" class="text-center bg-amber-400 rounded-xl p-1.5 font-lightbold cursor-pointer mt-20 px-2 ml-2">Back</a></div>


<form action="" method="GET">

      <input type="text" placeholder="Search by Name" name="name_search" class="border">
      <button >Filter</button>

</form>

<table width="80%">

   <tr>
    <th class="px-6 ">Name</th>
    <th class="px-6 ">Email</th>
    <th class="px-6 ">Message</th>
   </tr>

<?php

while($result = mysqli_fetch_assoc($data)){
?>
    
    <tr>
       <td class="px-6 "><?php echo $result['name']; ?></td>
       <td class="px-6 "><?php echo $result['email']; ?></td>
       <td class="px-6 "><?php echo $result['message']; ?></td>
    </tr>
    

    <?php
    }

// }else{
//     echo "No record founded";
// }

?>
</table>


</body>
</html>