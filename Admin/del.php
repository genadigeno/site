<?php require_once '../DB/connect.php'; ?>
<?php
      $sql = "SELECT * FROM users";
      $result = mysqli_query($connection, $sql);

?>

<div class="">
    <table style="width:100%">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>mail</th>
        <th>password</th>
      </tr>
    <?php while($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['user_mail']; ?></td>
        <td><?php echo $row['user_password']; ?></td>
        <td><a href="Admin.php?delete=<?php echo $row['user_id']; ?>"><img src="../images/Delete_Icon.png" onmouseover="this.src='../images/Delete_Icon-red.png'" onmouseout="this.src='../images/Delete_Icon.png'"></a></td>
      </tr>
    <?php endwhile; ?>
    </table>

</div>
