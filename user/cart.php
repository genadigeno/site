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
    <form action="../otherpages/buyall.php" method="get" style="width: 100%;">
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sum</th>
                <th></th>
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
                $query_price = "SELECT price FROM products WHERE id = '$id'";
                $price = mysqli_fetch_assoc(mysqli_query($connection, $query_price));
                $price = floatval($price['price']);
            ?>
            <tr>
                <td>
                    <a href="../otherpages/watche.php?page=<?=$id ?>" class="cart-info">
                        <img src="../images/watches/<?php echo $getting['image']; ?>" width="100px"  style="float: left; margin-left: 5px;">
                    </a>
                </td>
                <td>
                    <input type="checkbox" name="allproducts[]" value="<?=$id.','.$var['quantity'];?>">
                    <a href="../otherpages/watche.php?page=<?=$id ?>"><?=$getting['name'];?></a>
                </td>
                <td>
                    <a href="../otherpages/watche.php?page=<?=$id ?>"><?=$getting['price'];?> $</a>
                </td>
                <td>
                    <span><?=$var['quantity'];?></span>
                </td>
                <td>
                    <span><?php echo $price*$var['quantity']; ?> $</span>
                </td>
                <td>
                    <a href="../otherpages/buy.php?product_id=<?=$var['id'];?>&quantity=<?=$var['quantity'];?>" class="cart-del">Buy It Now</a>
                </td>
                <td>
                    <a href="../DB/account.php?delete=<?=$var['id']; ?>" class="cart-del">Remove From Cart</a>
                </td>
            </tr>
            <?php @$total += $price*$var['quantity']; ?>
            <?php endwhile; ?>
        </table>
        <br>
        <input type="submit" value="Buy Checked" name="totalproducts" class="submit">
        <p style="float: right">Total: <?=@$total;?> $</p>
    </form>
<?php endif; ?>
