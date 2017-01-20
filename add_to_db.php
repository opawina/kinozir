<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <?php
   //  начало сессии (блок для всех переходных страниц)
         session_start();
         if (isset($_SESSION['user_name'])) {
//      проверка уникальной переменной сессии
            $remote_addr = $_SERVER['REMOTE_ADDR'];
            $http_user_agent = $_SERVER['HTTP_USER_AGENT'];
            if ($_SESSION['check'] != hash('ripemd128', "$remote_addr$http_user_agent")) {
                echo "Пожалуйста, авторизуйтесь перейдя по <a href='auth_user.php'>ссылке</a>";
            }else{
                $login = $_SESSION['user_name'];
                echo "Вы авторизованы как, $login<br>"; 
//                close_session();
            }
         }else{
             echo "Пожалуйста, авторизуйтесь перейдя по <a href='auth_user.php'>ссылке</a>";
         }
         
//функция закрытия сессии
        function close_session () {
            session_destroy();
            $_SESSION = array();
            setcookie(session_name(), '', time()-33333333, '/');
        }
    ?>

   <form method="post" action="list_films.php">
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