<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>val demo</title>
  <style>
  p {
    color: blue;
    margin: 8px;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

<input type="date">
<p></p>

<script>
$( "input" )
  .change(function() {
    var value = $( this ).val();
    $( "p" ).text( value );
  })
  .change();
</script>

</body>
</html>
