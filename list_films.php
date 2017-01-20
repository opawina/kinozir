<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>AUTH</title>
   </head>
   <body>
       <?php
//  начало сессии (блок для всех переходных страниц (не забываеим функцию в конце кода))
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
//подключение к БД и выдача ошибки
        require_once 'mysql_access.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) {
                die($conn->connect_error);
        }
//добавление в табл из того что прилетело в $_POST
        $namef = clearance_sql_in($conn, 'namef');
        $query = "insert into flist (namef) values ('$namef')";
        $result = $conn->query($query);
        if (!$result) {
            echo $conn->error,'<br>';
        }
//как очистить $_POST чтоб после обновления страницы не была снова добавлена запись в БД????????         
//         $killpost = "result.php";
//         header("location: $killpost"); не правильно!!
//         или  ????? unset($_POST);

//  добавить новую запись в табл
        echo "<form action='add_to_db.php' method='post'>"
                . "<input type='submit' value='Добавить фильм'>"
            . "</form>";     
         
//тупое выведение всего что есть в таблице
        echo " 
                <table>
                    <tr>
                        <td>ID</td><td>Name_film</td><td>Year</td><td>Genre</td><td>Director</td><td>Writer</td><td>SCORE</td>
                    </tr>";

	$query = 'select * from flist;';
	$result = $conn->query($query);
	if (!$result) {
		die($conn->error);
	}
	$rows = $result->num_rows;
	for ($i=0; $i < $rows; $i++) { 
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);
            $count_arr = count($row);
            echo "<tr>";
            for ($ii=0; $ii < $count_arr; $ii++) { 
                    echo "<td>$row[$ii]</td>";
            }
            echo "</tr>";
	}
        echo	'</table>';

//освобождаем ресурсы
	$result->close();
	$conn->close();
            }
         }else{
             echo "Пожалуйста, авторизуйтесь перейдя по <a href='auth_user.php'>ссылке</a>";
         }
         
        
        
        
//              ГРУППА ЗАВИСИМЫХ ФУНКЦИЙ
//функция для обезвреживания содержания $_POST
        function clearance_post_in($var) {
            $var = stripslashes($var);
            $var = strip_tags($var);
            return $var = htmlentities($var);}
//функция для обезвреживания SQL-команды
        function clearance_sql_in($conn, $var) {
            $var = $conn->real_escape_string($_POST[$var]);
            return $var = clearance_post_in($var);}
        
//функция закрытия сессии
        function close_session () {
            $_SESSION = array();
            setcookie(session_name(), '', time()-33333333, '/');
            session_destroy();
        }
    ?>
   </body>
</html>