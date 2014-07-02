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
		$newWord = $dictionary[rand(1, 109583)];
		if ($_POST["separator"] == "camel")
		{
			$password = $password . ucfirst($newWord);
		}
		else
		{
			$password = $password . $newWord;
		}

		if ($i < $numberOfWords - 1)
		{
			switch($_POST["separator"])
			{
				case "hyphen": 
					$password = $password . "-";
					break;
				case "space":
					$password = $password . " ";
					break;
				case "camel": 					
					break;
				default:
					$password = $password . "-";
					break;
			}
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
	if ($_POST["separator"] != "space")
	{
		$password = preg_replace('/\s+/', '', $password);
	}
?>