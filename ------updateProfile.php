
<?php
session_start();
include("connection.php");

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}else{
    
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
<body>
    <p class="text-center text-2xl mt-6 mb-20">Update Profile</p>
    <a href="------profile.php" class="text-center bg-amber-400 rounded-xl p-1.5 font-lightbold cursor-pointer mt-20 px-2 ml-2">Back</a>


  

    <form action="" method="POST" class="flex  items-center justify-center">

    <div class="flex flex-col gap-4 w-2/4 items-center justify-center mx-10 ">
        <input type="text" name="name" placeholder="Enter new Name"  class="border-1">
        <input type="email" name="email" placeholder="Enter new email" class="border-1">
        <input type="text" name="district" placeholder="Enter new district" class="border-1">
        <input type="text" name="divition" placeholder="Enter new divition" class="border-1">
        <input type="text" name="phone" placeholder="Enter new phone" class="border-1">
        <input type="submit" name="update" value="update" class="bg-amber-400">
    </div>
    </form>
 



</body>
</html>

<?php
$id=$_SESSION['user_id'];

$query="select * from register where id='$id'";   //7
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);


if(isset($_POST['update'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $district=$_POST['district'];
    $divition=$_POST['divition'];
    $phone=$_POST['phone'];
    
    $check_email="select * from register where email='$email' AND id!='$id'";   //8
    $email_result=mysqli_query($conn,$check_email);

    if(mysqli_num_rows($email_result)>0){
        echo "Email already exixts";
    }
    else{
        $check_phone="select * from register where phone='$phone' AND id!='$id'"; //9
        $phone_result=mysqli_query($conn,$check_phone);
        
        if(mysqli_num_rows($phone_result)>0){
            echo "Phone already exists";
        }else{

        $update="update register set 
                 name='$name',
                 email='$email',
                 district='$district',
                 divition='$divition',
                 phone='$phone' 
                  where id='$id'"; //new

        mysqli_query($conn,$update);

        echo "******Profile Updated successfully*******";
        }
    }

}

?>

