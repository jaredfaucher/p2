
<?php
	// http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html
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
		
		echo $address;
		$page = file_get_contents($address);
		preg_match_all("/<li>(.*?)<\/li>/s", $page, ${"out" . $k});
	}

	$counter = 0;
	for ($k = 0; $k < 15; $k++)
	{
		$array = ${"out" . $k}[0];
		foreach ($array as $word)
		{
			$dictionary[$counter] = $word;
			$counter++;
		}
	}
	echo '<pre>';
	print_r($dictionary);
	echo '</pre>';
?>
