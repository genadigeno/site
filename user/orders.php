<?php include_once '../DB/connect.php'; ?>
<?php
    session_start();
    $username = $_SESSION['username'];

    $sql2 = "SELECT * FROM users WHERE user_name = '$username'";
    $resource = mysqli_query($connection, $sql2);
    $rom = mysqli_fetch_assoc($resource);
    $userid = $rom['user_id'];

    $sql = "SELECT * FROM orders WHERE user_id = '$userid'";
    $res = mysqli_query($connection, $sql);
?>


<table>
    <tr>
        <th>Image</th>
        <th>Price</th>
        <th>Name</th>
        <th>Date</th>
    </tr>

    <?php while ($var = mysqli_fetch_assoc($res)): ?>
        <?php
        $value = $var['product_id'];
        $sql4 = "SELECT * FROM products WHERE id = '$value'";
        $res4 = mysqli_query($connection, $sql4);
        $getting = mysqli_fetch_assoc($res4);
        $id = $getting['id'];

        ?>
        <tr>
            <td>
                <img src="../images/watches/<?php echo $getting['image']; ?>" width="100px"  style="float: left; margin-left: 5px;">
            </td>
            <td>
                <?=$getting['price'];?> $
            </td>
            <td>
                <?=$getting['name'];?>
            </td>
            <td>
                <span><?=$var['date'];?></span>
            </td>
        </tr>
    <?php endwhile; ?>
</table>