<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 	<form method="post" action="result.php">
 		Name of film :
 		<input type="text" name="namef" required="required"><br>
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
                Note:
                <textarea name="note" cols="50" rows="3"></textarea>
 		<input type="submit" value="Add film">
 	</form>
 	<br>

	<?php
		echo date("l, j F Y");
 	?>

</body>
</html>