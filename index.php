<html>
<head>
	<title>Videogames!</title>
</head>
<body>
	<h1>Cover Art Search</h1>

	<?php

	$key = "GIANT_BOMB_API_KEY_GOES_HERE"; // Load the API key into a variable for easy reference and to simply any future key alternation eg; we need to request a new one.

	$_POST['name']; // We enter the user's search term into a variable to read posting!

	echo "<form action='results.php' method='POST'>
				<p>I would like to see the cover art for</p>
				<input type='text' name='name' placeholder='Metroid Prime' />
				<input type='submit' /></p>
			</form>"; // Here we're packing the user's query into the $name variable so it can be entering into the POST array

	?>
</body>
</html>
