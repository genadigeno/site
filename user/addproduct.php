<?php include_once '../DB/connect.php'; ?>
<?php
    session_start();

?>

<div class="add-form">
    <form action="../DB/account.php" method="post" enctype="multipart/form-data">
        <div class="form-content">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" style="margin-left: 57px;">
            <br>
            <label for="price">Price in USD$</label>
            <input type="number" step="0.01" id="price" name="price">
            <br>
            <label for="departament">Departament</label>
            <select name="departament" id="departament">
                <option value="women">Women</option>
                <option value="men">Men</option>
                <option value="Kids">Kids</option>
            </select>
            <br>
            <label for="display">Display</label>
            <select name="display" id="display"  style="margin-left: 44px;">
                <option value="analog">Analog</option>
                <option value="digital">Digital</option>
                <option value="both">Both</option>
            </select>
            <br>
            <label for="color">Color</label>
            <select name="color" id="color" style="margin-left: 57px;">
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="gray">Gray</option>
                <option value="other">Other...</option>
            </select>
            <br>
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" min="1" name="quantity" style="margin-left: 31px;">
            <br>
            <label for="image">Upload Image</label>
            <input type="file" name="image" accept="image/*">
            <br>
            <input type="submit" class="button" value="AddProduct" name="addproduct">
        </div>
    </form>
</div>