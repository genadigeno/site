<?php require_once '../DB/connect.php'; ?>
<?php
    session_start();

if (isset($_GET['totalproducts'])){
    $all_products = $_GET['allproducts']; // მასივი[0 => 'id1,quantiti1', 1 => 'id2,quantiti2']

    $merged_array = array();
    for ($iter = 0; $iter < count($all_products); $iter++){
        $merged_array[] = preg_split('/[\s,]+/', $all_products[$iter]);
    }
    if (isset($_POST['checkout'])) {

        $imploded_array = $_POST['product'];

        $user_id = $_SESSION['user_id'];

        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $region = $_POST['region'];
        $phone = $_POST['phone'];

        $date = date('Y-m-d');

        $exploded_array = array();
        for ($i = 0; $i < count($imploded_array); $i++){
            $exploded_array[] = explode(',', $imploded_array[$i]);
            $product = $exploded_array[$i][0];
            $quantity = $exploded_array[$i][1];

            $query_of_products_quantity = "SELECT quantity FROM products WHERE id = '$product'";

            $quantity_product = mysqli_query($connection, $query_of_products_quantity);
            $quantity_rame = mysqli_fetch_assoc($quantity_product);
            $quantity_product = intval($quantity_rame['quantity']);

            $main_sql = "INSERT INTO orders(user_id, product_id, quantity, fullname, address, city, region, phone, date)
                            VALUES('$user_id', '$product', '$quantity', '$fullname', '$address',  '$city', '$region', '$phone', '$date') ";
            if(mysqli_query($connection, $main_sql)){
                $quantity = intval($quantity);
                $quantity_product = $quantity_product - $quantity;

                $update_product = "UPDATE products SET quantity = '$quantity_product' WHERE id = '$product'";
                mysqli_query($connection, $update_product);

                $delete_from_cart = "DELETE FROM addcart WHERE product_id = '$product'";
                mysqli_query($connection, $delete_from_cart);

                $delete_product = "DELETE FROM products WHERE quantity = 0";
                mysqli_query($connection, $delete_product);


            }
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/headerstyle.css">
    <link rel="stylesheet" href="../styles/foot.css">
    <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">
    <link rel="stylesheet" href="../styles/buy.css">
    <script src="https://use.fontawesome.com/71aa464b87.js"></script>
    <title>Cheackout Watch</title>
</head>
<body>
<header><?php include "../includes/header.php";?></header>
<div class="content" style="margin-top: 100px;">
    <form class="" action="" method="post">
        <p>*Full name:</p>
        <input type="text" name="fullname" value="" >
        <p>*Address: </p>
        <input type="text" name="address" value="" >
        <p>*City: </p>
        <input type="text" name="city" value="" >
        <p>*State/Province/Region: </p>
        <input type="text" name="region" value="" >
        <p>*Phone number: </p>
        <input type="text" name="phone" value="" >
        <br>
        <hr>
        <h2 style="text-align: center;">Payment Options</h2>
        <p>Name of Card</p>
        <input type="text">
        <p>Card Number</p>
        <input type="text">
        <p>Expiration Date</p>
        <input type="number" min="1" max="12" value="1">
        <input type="number" min="2018" max="2050" value="2018">
        <p>Pin</p>
        <input type="text">
        <hr>
        <?php for($iterate = 0; $iterate < count($merged_array); $iterate++):?>
            <input name="product[]" value="<?php echo implode(',', $merged_array[$iterate]); ?>" type="hidden">
        <?php endfor; ?>
        <input type="submit" name="checkout" value="Checkout" class="submit">
    </form>
</div>
<footer><?php include "../includes/footer.php"; ?></footer>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    function myFunction(x) {
        x.classList.toggle("change");
    }
    $('.container').click(function(){
        $('.responsive-menu').toggle();
    });
    //            $('input').click(function(){
    //                $(this).toggleClass("bordered");
    //            });
</script>
</body>
</html>
