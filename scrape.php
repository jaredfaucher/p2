
<?php
	/* This for loop constructs each successive html address, 
	   pulls the html from the site into a string and then 
	   scrapes the string with preg_match_all  
	*/
	$address_pre = "http://www.paulnoll.com/Books/Clear-English/words-";
	$address_pos = "-hundred.html";
	for ($i = 1, $j = $i + 1, $k = 0; $i < 30; $i = $i + 2, $j = $j + 2, $k++)
	{
		if ($i < 10)
		{
			$beg = "0" . $i;
		}
		else
		{
			$beg = (string)$i;
		}
		
		if ($j < 10)
		{
			$end = "0" . $j;
		}
		else
		{
			$end = (string)$j;
		}
		
		$address = $address_pre . $beg . '-' . $end . $address_pos;

		$page = file_get_contents($address);
		preg_match_all("/<li>(.*?)<\/li>/s", $page, ${"out" . $k});
	}

	/* this combines all of the scraped arrays into 
	   one large dictionary array for use in logic.php 
	*/
	$counter = 0;
	for ($k = 0; $k < 15; $k++)
	{
		$array = ${"out" . $k}[1];
		foreach ($array as $word)
		{
			$dictionary[$counter] = $word;
			$counter++;
		}
	}
	/*These lines were for debugging purposes to see if $dictiory
	   was successful made.

	echo '<pre>';
	print_r($dictionary);
	echo '</pre>';
	echo ucfirst(trim($dictionary[0]));
	*/

?>
