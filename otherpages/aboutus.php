<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">

      <!--   ფონტი   -->
      <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">

      <!--   ჯავასკრიპტი   -->
      <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>  <!--   jQuery ბიბლიოთეკა   -->
      <script src="https://use.fontawesome.com/71aa464b87.js"></script>
    <link rel="stylesheet" href="../styles/headerstyle.css">
      <link rel="stylesheet" href="../styles/foot.css">
    <title>E-Shop Watches</title>
    <style media="screen">
      body{
          font-family: CaviarDreams-Bold;
      }
    </style>
  </head>
  <body>
      <header>
          <?php include "../includes/header.php"; ?>
      </header>
      <section style="height: 500px">
          
      </section>
      <footer>
          <?php include "../includes/footer.php"?>
      </footer>
  </body>
  <script>
      function myFunction(x) {
          x.classList.toggle("change");
      }
      $('.container').click(function(){
          $('.responsive-menu').toggle();
      });
  </script>
</html>