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

				// reads dictionary file into array to access words separately
				$dictionary = file("dictionary.txt");  //http://www-01.sil.org/linguistics/wordlists/english/wordlist/wordsEn.txt
				
				// checks if the desired number of words for the password has been entered
				// and checks if something besides an int was entered into the form
				// defaults to 4 words if these requirements have not been met
				if (!empty($_POST["numberOfWords"]) && ctype_digit($_POST["numberOfWords"]))
				{
					$numberOfWords = $_POST["numberOfWords"];
				}
				else
				{
					$numberOfWords = 4;
				}
				// loop executes depending on the number of words chosen
				for ($i = 0; $i < $numberOfWords; $i++)
				{
					// pics random word from dictionary array (there are 109583 lines in my dictionary)
					// and concatenates it with the $password string
					$password = $password . $dictionary[rand(1, 109583)];
					// concatenates hyphen after each word except the last
					if ($i < $numberOfWords - 1)
					{
						$password = $password . "-";
					}
				}
				// adds number to the end if checkbox was checked
				if (!empty($_POST["number"]))	
				{
					$password = $password . rand(0, 9);
				}
				// adds $ symbol to the end if checkbox was checked
				if (!empty($_POST["symbol"]))
				{
					$password = $password . "$";
				}
				// uppercases the first letter of first word if checkbox was checked
				if (!empty($_POST["upperFirst"]))
				{
					$password = ucfirst($password);
				}
				// removes whitespace/spaces in string
				// spaces are at the end of the line for most words in my dictionary
				// which caused there to be spaces printed between words when my page displayed	
				$password = preg_replace('/\s+/', '', $password);
				// prints out the finished password
				echo $password;
			?>
			</p>
			<br>
			<form method="post">
				<label for="numberOfWords">Number of Words: </label>
				<input maxlength="1" type="text" name="numberOfWords" id="numberOfWords">
				(Max = 9)
				<br>
				<!-- The php inside of the input tags keeps the checkboxes checked upon reload of the page with new password -->
				<input type="checkbox" name="number" <?php if(isset($_POST['number'])) echo "checked='checked'"; ?> >Include Number<br>
				<input type="checkbox" name="symbol" <?php if(isset($_POST['symbol'])) echo "checked='checked'"; ?> >Include Symbol<br>
				<input type="checkbox" name="upperFirst" <?php if(isset($_POST['upperFirst'])) echo "checked='checked'"; ?> >Uppercase first letter<br>
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