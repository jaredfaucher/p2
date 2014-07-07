
<?php
	// http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html
	$address_pre = "http://www.paulnoll.com/Books/Clear-English/words-";
	$address_pos = "-hundred.html";
	for ($i = 1, $j = $i + 1; $i < 3; $i = $i + 2)
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
		
		//echo $address;
		$page = file_get_contents($address);
		//echo $page;
		preg_match_all("/<li>(.*?)<\/li>/s", $page, $out);

		echo '<pre>';
		print_r($out[0][0]);
		echo '</pre>';
	}
?>
