<?php include_once '../DB/connect.php'; ?>
<?php
    session_start();
?>
<div class="change-password">
    <form action="../DB/account.php" method="get">
        <label for="passw">New Password</label>
        <input type="password" id="passw" class="passw" name="newpass" required>
        <br>
        <label for="re-passw">Confirm New Password</label>
        <input type="password" id="re-passw" class="re-passw" name="re_newpass" required>
        <br>
        <input type="submit" class="change" value="Change" name="change">
    </form>
</div>