<?php
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

//тупое выведение всего что есть в таблице
echo '
	<table>
		<tr>
			<td>ID</td><td>Name_film</td><td>Year</td><td>Genre</td><td>Director</td><td>Writer</td><td>SCORE</td>
		</tr>';

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
?>