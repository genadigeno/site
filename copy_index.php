<?php $conn = mysqli_connect("localhost", "root", "", "satesto"); ?>
<?php include_once 'filtering.php'; ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      p{

        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <form class="" action="copy_index.php" method="post">
      value: <br>
      <input type="checkbox" name="list[]" value="5">5
      <input type="checkbox" name="list[]" value="55">55
      <input type="checkbox" name="list[]" value="555">555
      <input type="checkbox" name="list[]" value="5555">5555<br>
      size: <br>
      <input type="checkbox" name="size[]" value="100">100
      <input type="checkbox" name="size[]" value="500">500
      <input type="checkbox" name="size[]" value="1000">1000<br>
      departament: <br>
      <input type="checkbox" name="dep[]" value="men">men
      <input type="checkbox" name="dep[]" value="women">women
      <input type="checkbox" name="dep[]" value="kids">kids<br>
      price: <br>
      <input type="checkbox" name="price[]" value="0 AND 99">0-99$
      <input type="checkbox" name="price[]" value="100 AND 199">100$-199$
      <input type="checkbox" name="price[]" value="200 AND 2000000000">200$+<br>
      <input type="submit" name="submit" value="submit">
    </form>
    <?php while(@$row = mysqli_fetch_assoc($result)) : ?>
      <p>id: <?php echo $row['id']; ?></p>
      <p>value: <?php echo $row['value']; ?></p>
      <p>departament: <?php echo $row['departament']; ?></p>
      <p>size: <?php echo $row['size']; ?></p>
      <p>price: $<?php echo $row['price']; ?></p><br>
    <?php endwhile; ?>
  </body>
</html>
