<?php

	// NO LONGER NEEDED DUE TO CREATION OF WORD SCRAPER
	// reads dictionary file into array to access words separately
	// $dictionary = file("dictionary.txt");  
	// source: http://www-01.sil.org/linguistics/wordlists/english/wordlist/wordsEn.txt
				
	/* checks if the desired number of words for the password has been entered
	   and checks if something besides an int was entered into the form
	*/
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
		/* picks random word from dictionary array (there are 2126 lines in the scraped dictionary)
		and concatenates it with the $password string 
		*/
		// capitalizes if CamelCase is chosen
		$newWord = trim($dictionary[rand(0, 2125)]);
		
		/* This expression was used with my original dictionary before I created the word scraper.  There were 109583 lines in that dictionary.
		$newWord = trim($dictionary[rand(0, 109582)])*/
		
		if ($_POST["separator"] == "camel")
		{
			$password = $password . ucfirst($newWord);
		}
		else
		{
			$password = $password . $newWord;
		}

		// concatenates separators onto password unless at last word
		if ($i < $numberOfWords - 1)
		{
			switch($_POST["separator"])
			{
				 
					//$password = $password . "-";
					//break;
				case "space":
					$password = $password . " ";
					break;
				case "camel": 					
					break;
				case "hyphen":
				default:
					$password = $password . "-";
					break;
			}
		}
	}
	// modifies the password depending on what checkboxes are checked
	if (!empty($_POST["number"]))	
	{
		$password = $password . rand(0, 9);
	}
	if (!empty($_POST["symbol"]))
	{
		$password = $password . "$";
	}
	if (!empty($_POST["upperFirst"]))
	{
		$password = ucfirst($password);
	}
?>