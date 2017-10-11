<?php
        require_once 'core/init.php';
   include 'includes/head.php';
   include 'includes/navigation.php';
   include 'includes/headerfull.php';
   include 'includes/leftbar.php';

   $sql = "SELECT * FROM products WHERE feature = 1";
   $feature = $db->query($sql);

?>


            <div class="col-md-8">
                <div class="row">
                    <h2 class="text-center">feature products</h2>
                    <?php while($product = mysqli_fetch_assoc($feature)) : ?>
                    <div class="col-md-3 text-center">
                        <h4><?php echo $product['title']; ?></h4>
                        <img src="<?php echo $product['image']; ?>" class="imgrame" alt="<?php echo $product['title']; ?>">
                        <p class="list-price text-danger">last price: <s><?php echo $product['list_price']; ?></s></p>
                        <p class="price">now price: <?php echo $product['price']; ?></p>
                        <button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?php echo $product['id']; ?>)">
                           details
                        </button>
                    </div>
                  <?php endwhile; ?>
                </div>
            </div>
<?php

     include 'includes/rightbar.php';
     include 'includes/footer.php';
?>
