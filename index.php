<!DOCTYPE html>
<html>
	<head>
		<title>Jared Faucher ::: P2 ::: xkcd Password Generator</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="p2.css">
		<?php require 'logic.php'; ?>
	</head>
	<body>
		<div class="container">
			<h1>Jared Faucher ::: P2</h1>
			<h3>xkcd Password Generator</h3>
			<br>
			<p class="password">
				<?php echo $password; ?>
			</p>
			<br>
			<form method="post">
				<label for="numberOfWords">Number of Words: </label>
				<input maxlength="1" type="text" name="numberOfWords" id="numberOfWords" value= <?php echo "'" . htmlspecialchars($_POST['numberOfWords']) ."'"; ?> />
				(Max = 9)
				<br>
				<!-- The php inside of the input tags keeps the checkboxes checked upon reload of the page with new password -->
				<input type="checkbox" name="number" <?php if(isset($_POST['number'])) echo "checked='checked'"; ?> >Include Number<br>
				<input type="checkbox" name="symbol" <?php if(isset($_POST['symbol'])) echo "checked='checked'"; ?> >Include Symbol<br>
				<input type="checkbox" name="upperFirst" <?php if(isset($_POST['upperFirst'])) echo "checked='checked'"; ?> >Uppercase first letter<br>
				Choose your separator: 
				<select name="separator">
					<option value="hyphen">Hyphen</option>
					<option value="space">Space</option>
					<option value="camel">CamelCase</option>
				</select>
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