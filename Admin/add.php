
  <form class="add-watch" action="" method="post" enctype="multipart/form-data">
    <div class="left-side">
      <p>Name of Watch</p>
      <input type="text" name="watch_name" value=""><br>
      <p>Price of watch</p>
      <input type="number" name="watch_price" value=""><br>
      <p>upload image of watch</p>
      <input type="file" name="watch_file" value=""><br>
    </div>
    <div class="right-side">
      <p>departament of watch</p>
      <select class="" name="departament">
        <option value="men">men</option>
        <option value="women">women</option>
        <option value="kids">kids</option>
      </select><br>
      <p>display of watch</p>
      <select class="" name="display">
        <option value="numeric">numeric</option>
        <option value="analog">analog</option>
        <option value="both">both</option>
      </select><br>
      <p>color of watch</p>
      <select class="" name="color">
        <option value="black">black</option>
        <option value="white">white</option>
        <option value="gray">gray</option>
        <option value="other">other</option>
      </select>
    </div>
    <input type="submit" name="add" value="Add Product" class="submit-add">
  </form>
