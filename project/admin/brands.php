<?php
   require_once '../core/init.php';
   include 'includes/head.php';
   include 'includes/navigation.php';
   //db
   $sql = "SELECT * FROM brand ORDER BY brand";
   $results = $db->query($sql);

   $errors  = array();

   //DELETE

   if (isset($_GET['delete']) && !empty($_GET['delete'])) {
     $delete_id = (int)$_GET['delete'];
     $delete_id = sanitize($delete_id);
     $sql = "DELETE FROM brand WHERE id = '$delete_id'";
     $db->query($sql);
     header("Location: brands.php");
   }
   //EDIT
   if (isset($_GET['edit']) && !empty($_GET['edit'])) {
     $edit_id = (int)$_GET['edit'];
     $edit_id = sanitize($edit_id);
     $sql2 = "SELECT * FROM brand WHERE id = '$edit_id'";
     $edit_result = $db->query($sql2);
     $eBrand = mysqli_fetch_assoc($edit_result);



   }

   //if add ~ is submitter
   if (isset($_POST['add_submit'])) {
     $brand = sanitize($_POST['brand']);
     if ($_POST['brand'] == '') {
       $errors[] .= 'enter brand !';

     }
     //ckech brands exist in DB
     $sql = "SELECT * FROM brand WHERE brand = '$brand'";
     if(isset($_GET['edit'])){
       $sql = "SELECT * FROM brand WHERE brand = '$brand' AND id != '$edit_id'";
     }
     $result= $db->query($sql);
     $count = mysqli_num_rows($result);
     if ($count > 0) {
       $errors[] .= "Good !";
     }

     if (!empty($errors)) {
       echo display_errors($errors);
     }else {
       $sql = "INSERT INTO brand (brand) VALUES ('$brand')";
       if(isset($_GET['edit'])){
         $sql = "UPDATE brand SET brand = '$brand' WHERE id = '$edit_id'";
       }
       $db->query($sql);
       header("Location: brands.php");
     }
   }
?>
<h2 class="text-center">Brands</h2><hr>
<!-- brand form -->
<div class="text-center">
  <form class="form-inline" action="brands.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
    <div class="form-group">
      <?php
      $brandvalue = '';
      if (isset($_GET['edit'])) {$brandvalue = $eBrand['brand'];}
            else {
              if(isset($_POST['brand'])){$brandvalue = sanitize($_POST['brand']);}

            }
      ?>
      <label for="brand"><?=((isset($_GET['edit']))?'Edit':'Add'); ?> brand</label>
      <input type="text" name="brand" id="brand" class="form-control" value="<?=$brandvalue;?>">
      <?php if(isset($_GET['edit'])): ?>
        <a href="brands.php" class="btn btn-default">Cancel</a>
      <?php endif; ?>
      <input type="submit" name="add_submit" value="<?=((isset($_GET['edit']))?'Edit':'Add'); ?> Brand" class="btn btn-success">
    </div>
  </form>
  <hr>
</div>
<table class="table table-bordered table-striped table-auto text-center table-condensed">
  <thead>
    <th></th>
    <th>brand</th>
    <th></th>
  </thead>
  <tbody>
    <?php while($brand = mysqli_fetch_assoc($results)): ?>
    <tr>
      <td><a href="brands.php?edit=<?php echo $brand['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><?php echo $brand['brand']; ?></td>
      <td><a href="brands.php?delete=<?php echo $brand['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
<?php
   include 'includes/footer.php';
?>
