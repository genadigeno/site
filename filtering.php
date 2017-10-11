<?php require_once 'DB/connect.php'; ?>
<?php
    if (isset($_POST['submit']))
    {
      // extract($_POST);

      // 3  DEP[]   //
      if (isset($_POST['dep'])) // (3,3) საათების განყოფილება
      {
        foreach ($_POST['dep'] as $dep)
        {
          $listarrayd[] = $dep;
        }
        @$deps = implode("','", $listarrayd);
        $sql = "SELECT * FROM products WHERE departament IN ('".$deps."')";
        $result = mysqli_query($connection, $sql);
      }
      // 2   SIZE[]  //
      if (@$_POST['display']) // (2,2) საათის ზომა
      {
        foreach (@$_POST['display'] as $size)
        {
          $listarrays[] = $size;
        }
        @$sizes = implode("','", $listarrays);
        $sql = "";
        $sql = "SELECT * FROM products WHERE display IN ('".$sizes."')";
        if (isset($_POST['dep'])) // (2,3) საათის ზომა და განყოფილება
        {
          foreach ($_POST['dep'] as $dep)
          {
            $listarrayd[] = $dep;
          }
          @$deps = implode("','", $listarrayd);
          $sql .= " AND departament IN ('".$deps."')";

        }
        $result = mysqli_query($connection, $sql);
        echo $sql;
      }

    // 1  LIST[]  //
    if(@$_POST['color']) // (1,1) საათის სახელი
    {
      foreach (@$_POST['color'] as $list)
      {
        $listarray[] = $list;
      }
      @$lists = implode("','", $listarray);
      $sql = "SELECT * FROM products WHERE color IN ('".$lists."')";
      if (isset($_POST['display'])) // (1,2) საათის სახელი და ზომა
      {
        foreach (@$_POST['display'] as $size)
        {
          @$listarrays[] .= $size;
        }
        $sizes = implode("','", $listarrays);
        $sql .= " AND display IN ('".$sizes."')";
        $result = mysqli_query($connection, $sql);
      }
      elseif (isset($_POST['dep'])) // (1,3) საათის სახელი და განყოფილება
      {
        foreach ($_POST['dep'] as $dep)
        {
          $listarrayd[] = $dep;
        }
        @$deps = implode("','", $listarrayd);
        $sql .= " AND departament IN ('".$deps."')";
        $result = mysqli_query($connection, $sql);
      }
      else
      {
        $result = mysqli_query($connection, $sql);
      }
	  // echo $sql;

    }

    // 4  PRICE[] //
    if (isset($_POST['price'])) // (4,4) საათის ფასი
    {
      foreach ($_POST['price'] as $price)
      {
        @$listarrayp .= $price;
      }
      $sql = "SELECT * FROM products WHERE (price BETWEEN ".$listarrayp.")";

      if (isset($_POST['price'][0]) && isset($_POST['price'][1]))
      {
        // echo $_POST['price'][0]."<br>";
        // echo $_POST['price'][1];
        $sql = "SELECT * FROM products WHERE price BETWEEN ".$_POST['price'][0]." OR price BETWEEN ".$_POST['price'][1]."";
      }
      if (isset($_POST['color'])) // (4,1) სააათის სახელი და ფასი
      {
        foreach (@$_POST['color'] as $list)
        {
          $listarray[] = $list;
        }
        @$lists = implode("','", $listarray);
        $sql = "SELECT * FROM products WHERE color IN ('".$lists."')
                AND price BETWEEN ".$_POST['price'][0]."";
      } // end (4,1)

      echo $sql;
      $result = mysqli_query($connection, $sql);
    }
 }
 ?>
