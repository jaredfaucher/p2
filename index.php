<!DOCTYPE html>
<html>
	<head>
		<title>Jared Faucher ::: P2 ::: xkcd Password Generator</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="p2.css">
	</head>
	<body>
		<div class="container">
			<h1>Jared Faucher ::: P2</h1>
			<h3>xkcd Password Generator</h3>
			<br>
			<p class="password">
			<?php

				$dictionary = file("dictionary.txt");  //http://www-01.sil.org/linguistics/wordlists/english/wordlist/wordsEn.txt
				if (!empty($_POST["numberOfWords"]))
				{
					$numberOfWords = $_POST["numberOfWords"];
				}
				else
				{
					$numberOfWords = 4;
				}
				for ($i = 0; $i < $numberOfWords; $i++)
				{
					${"word" . $i} = $dictionary[rand(1, 109583)];

					print ${"word" . $i};
					if ($i < $numberOfWords - 1)
					{
						print "-";
					}
				}	
			?>
			</p>
			<br>
			<form action="index.php" method="post">
				<label for="numberOfWords">Number of Words: </label>
				<input maxlength="1" type="text" name="numberOfWords" id="numberOfWords" value>
				(Max = 9)
				<br>
				<input type="submit" class="btn btn-default" value="Submit">
			</form>
			<br>
			<a href="http://xkcd.com/936/">
				<img src="http://imgs.xkcd.com/comics/password_strength.png" />
			</a>
		</div>
	</body>
</html>