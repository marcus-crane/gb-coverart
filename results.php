<html>
<head>
	<title>Videogames!</title>
</head>
<body>
	<?php

	$key = "GIANT_BOMB_API_KEY"; // Load the API key into a variable for easy use later

	$search = $_POST['name']; // Set the variable search to equal 'name' which was POSTed by the form in index.php
	$query = "http://www.giantbomb.com/api/search/?api_key=" . "$key" . "&format=xml&query=" . "$search" . "&resources=game"; // Inserting the user's query into a search string to try and find the ID for the game being searched. We need that ID to perform the search!
	$loadid = simplexml_load_file($query);
	
	$gameid = $loadid->results->game->id; // gameid is going to be equal to 
	
	//<results>
	//  <game>
	//     id is here
	//  </game>
	//</results>

	$data = "http://www.giantbomb.com/api/game/" . "$gameid" . "?api_key=" . "$key"; // Mash the $key variable and the API URL together to form one string!
	$gbxml = simplexml_load_file($data); // Gotta load up that API so we can use it!

	$title = $gbxml->results->name; // Set title to equal the name of the searched games
	$cover = $gbxml->results->image->small_url; // Set cover to equal the URL of the smallest cover art available
	$platform = $gbxml->results->platforms->platform->name; // Set platform to equal the name of the platform (eg; Nintendo Gamecube)
	$rating = $gbxml->results->original_game_rating->game_rating->name; // Set the rating to equal the rating (eg; M rated I think? I don't think it was the metacritic score or anything like that)

        // Print out the results to the user, parsing in the variables from above

	print "<h1>You requested " . $title . "</h1>";
	print "<p>Released for the " . $platform . "</p>";
	print "<p>Rated " . $rating . "</p>";
	print "<img src='$cover' />";
	print "<br />";
	print "<br /><a href='index.php'>Back</a>";
	?>

</body>
</html>
