<?php
require_once '../core/init.php';
    $id = $_POST['id'];
    $id = (int)$id;
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $db->query($sql);
    $product = mysqli_fetch_assoc($result);
      $brand_id = $product['brand'];
    $sql = "SELECT brand FROM brand WHERE id = '$brand_id'";
    $brand_query = $db->query($sql);
    $brand = mysqli_fetch_assoc($brand_query);

    $sizestring = $product['sizes'];

    $sizes_array = explode(',', $sizestring);

?>

<?php ob_start(); ?>

<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <!-- modal header -->
              <div class="modal-header">
                <button type="button" name="button" class="close" onclick="closemodal()" aria-label="Close">
                  <span class="" aria-hidden="true">&times;
                  </span>
                </button>
                <h4 class="modal-title text-center"><?php echo $product['title']; ?></h4>
              </div><!-- end modal header -->
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="center-block">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" class="details img-responsive">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <h4>details</h4>
                      <p><?php echo $product['description']; ?></p>
                      <hr>
                      <p>price: $<?php echo $product['price']; ?></p>
                      <p>brand: <?php echo $brand['brand']; ?></p>
                      <form class="" action="add_cart.php" method="post">
                        <div class="form-group">
                          <div class="col-xs-3">
                            <label for="quantity">Quantity:</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                            <p>available: 3</p>
                          </div><br><br><br><br>
                          <div class="form-group">
                            <label for="size">Size:</label>
                            <select class="form-control" name="size" id="size">
                              <option value=""></option>
                              <?php foreach($sizes_array as $string) {
                                $string_array = explode(':', $string);
                                $size = $string_array[0];
                                $quantity = $string_array[1];
                                echo '<option value="'.$size.'">'.$size.'('.$quantity.' Available)</option>';
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="closemodal()">Close</button>
                <button type="button" class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
              </div>
          </div>
          </div>
        </div>
        <script>
          function closemodal() {
            jQuery('#details-modal').modal('hide');
            setTimeout(function(){
              jQuery('#details-modal').remove();
              jQuery('.modal_backdrop').remove();
            }, 500);
          }
        </script>
<?php echo ob_get_clean(); ?>
