
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>
<body>

<h1 class="text-center text-xl font-extrabold text-amber-500 mt-14">Welcome to our admin dashboard</h1>   

    <div class="mt-26 mb-20">
        <ul class="flex flex-col justify-center items-center gap-4 font-lightbold">
            <li class="bg-[#1DABB3] p-4 px-10 pointer-cursor"><a href="******showUserList.php">show user list</a></li>
            <li class="bg-[#1DABB3] p-4 px-10 pointer-cursor"><a href="******showContact.php">Show contact</a></li>
            <li class="bg-[#1DABB3] p-4 px-9 pointer-cursor"><a href="******showOrders.php">Show all orders</a></li>
        </ul>
    </div>


   <a href="logout.php" class="text-center bg-amber-400 rounded-xl p-1.5 font-lightbold cursor-pointer mt-20 px-2 ml-2">Log out</a>   

</body>
</html>