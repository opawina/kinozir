<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$ostalos = 365 - date(z);
		echo "<h3>До нового года осталось $ostalos дней</h3><br>";
	?>

 	<form method="post" action="result.php">
 		Name of film :
 		<input type="text" name="namef"><br>
 		Year :
 		<input type="text" name="yearf"><br>
 		Genre :
 		<input type="text" name="genre"><br>
 		Director :
 		<input type="text" name="director"><br>
 		Writer :
 		<input type="text" name="writer"><br>
 		Score:
 		<input type="text" name="score"><br>
 		<input type="submit" value="Add film">
 	</form>
 	<br>

	<?php
		echo date("l, j F Y");
 	?>

</body>
</html>