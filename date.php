<?php

	if(isset($_POST['submit'])){
		$start = $_POST['start'];
		$end = $_POST['end'];
		$time = strtotime($end) - strtotime($start);
		echo $time / 86400;
	}

?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <title>Wisdom Blog</title>
</head>
<body>
		<nav>
			<ul>
				<li> <a href="#" data-page="home">HOME</a> </li>
        <li> <a href="#" data-page="Downloads">Downloads</a> </li>
				<li> <a href="#" data-page="Tutorials">Tutorials</a> </li>
				<li> <a href="helper.php">helper</a> </li>
			</ul>
		</nav>
		<input type="date" name="tarigi" id="tarigi1">
		<input type="date" name="tarigi" id="tarigi2">
		<section id="main">

		</section>


		<script type="text/javascript">
		  $('#tarigi1').change(function() {

				$('#tarigi2').change(function() {

						var input = $('#tarigi1').val();
						var input2 = $('#tarigi2').val();
						$.ajax({
							url: 'file.php',
							type: 'GET',
							data: {page: input, page2: input2},
							success: function(data) {
								$('#main').html(data);
							}
						});
				});
		  });
			$('#tarigi2').change(function() {

				$('#tarigi1').change(function() {

						var input = $('#tarigi1').val();
						var input2 = $('#tarigi2').val();
						$.ajax({
							url: 'file.php',
							type: 'GET',
							data: {page: input, page2: input2},
							success: function(data) {
								$('#main').html(data);
							}
						});
				});
		  });
		</script>
</body>
</html>
