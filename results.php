<html>
<head>
	<title>Videogames!</title>
</head>
<body>
	<?php

	$key = "GIANT_BOMB_API_KEY"; // Load the API key into a variable for easy use later

	$search = $_POST['name'];
	$query = "http://www.giantbomb.com/api/search/?api_key=" . "$key" . "&format=xml&query=" . "$search" . "&resources=game"; // Inserting the user's query into a search string to try and find the ID for the game being searched. We need that ID to perform the search!
	$loadid = simplexml_load_file($query);
	
	$gameid = $loadid->results->game->id;

	$data = "http://www.giantbomb.com/api/game/" . "$gameid" . "?api_key=" . "$key"; // Mash the $key variable and the API URL together to form one string!
	$gbxml = simplexml_load_file($data); // Gotta load up that API so we can use it!

	$title = $gbxml->results->name;
	$cover = $gbxml->results->image->small_url;
	$platform = $gbxml->results->platforms->platform->name;
	$rating = $gbxml->results->original_game_rating->game_rating->name;

	print "<h1>You requested " . $title . "</h1>";
	print "<p>Released for the " . $platform . "</p>";
	print "<p>Rated " . $rating . "</p>";
	print "<img src='$cover' />";
	print "<br />";
	print "<br /><a href='index.php'>Back</a>";
	?>

</body>
</html>
