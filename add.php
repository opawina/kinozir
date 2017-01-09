<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title></title>
   </head>
   <body>
       <?php
       echo '
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
                Note:
                <textarea name="note" cols="50" rows="3"></textarea><br>
                <select name="selex">
                    <option value="1">1</oprion>
                    <option value="2">2</oprion>
                    <option value="3">3</oprion>
                    <option value="4">4</oprion>
                    <option value="5">5</oprion>
                </select><br>
 		<input type="submit" value="Add film">
 	</form>
       ';
        echo date("l, j F Y");

       ?>
   </body>
</html>
