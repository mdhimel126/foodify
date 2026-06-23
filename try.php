<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    $update_sql = "UPDATE orders SET status = '$new_status' WHERE orders_id = '$order_id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Status updated successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Show all Orders record</h1>
    <?php
    $sql = "SELECT orders.*, register.name FROM orders JOIN register ON orders.user_id = register.id";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        echo "User: " . $row['name'] . " | Status: " . $row['status'] . "<br>";
        ?>
        
        <form action="" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $row['orders_id']; ?>">
            <select name="status">
                <option value="Pending" <?php if($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="On the way" <?php if($row['status'] == 'On the way') echo 'selected'; ?>>On the way</option>
                <option value="Delivered" <?php if($row['status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
            </select>
            <button type="submit" name="update_status">Update</button>
        </form>
        <hr>
        <?php
    }
    ?>
</body>
</html>