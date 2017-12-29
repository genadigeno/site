<?php include_once '../DB/connect.php'; ?>
<?php

  session_start();
  $username = $_SESSION['username'];

  $sql2 = "SELECT * FROM users WHERE user_name = '$username'";
  $resource = mysqli_query($connection, $sql2);
  $rom = mysqli_fetch_assoc($resource);  //err
  $userid = $rom['user_id'];

  $sql = "SELECT * FROM addcart WHERE user_id = '$userid'";
  $res = mysqli_query($connection, $sql);


?>

<?php if (isset($_SESSION['username'])): ?>
    <table>
        <tr>
            <th>Image</th>
            <th>Price</th>
            <th>Name</th>
            <th>Quantity</th>
            <th></th>
        </tr>

        <?php while ($var = mysqli_fetch_assoc($res)): ?>
        <?php
            $value = $var['product_id'];
            $sql4 = "SELECT * FROM products WHERE id = '$value'";
            $res4 = mysqli_query($connection, $sql4);
            $getting = mysqli_fetch_assoc($res4);
            $product_price = $getting['price'];
            $product_name = $getting['name'];
            $id = $getting['id'];

        ?>
        <tr>
            <td>
                <a href="../otherpages/watche.php?page=<?=$id ?>" class="cart-info">
                    <img src="../images/watches/<?php echo $getting['image']; ?>.png" width="100px"  style="float: left; margin-left: 5px;">
                </a>
            </td>
            <td>
                <a href="../otherpages/watche.php?page=<?=$id ?>"><?=$getting['price'];?> $</a>
            </td>
            <td>
                <a href="../otherpages/watche.php?page=<?=$id ?>"><?=$getting['name'];?></a>
            </td>
            <td>
                <span><?=$var['quantity'];?></span>
            </td>
            <td>
                <a href="../DB/account.php?delete=<?=$var['id']; ?>" class="cart-del">Remove From Cart</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>
