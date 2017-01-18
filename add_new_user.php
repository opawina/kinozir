<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title></title>
   </head>
   <body>
      <?php
//      если POST не пустой подключаюсь к БД
        if (isset($_POST['exists'])) {
//            if (($_POST['new_login'] != ' ') && ($_POST['new_pass'] != null)) {   //Доработать неприемлимые значения логина и пароля например '(пробелы)'.
            require_once 'mysql_access.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) {
                die($conn->connect_error);
                }
//      извлекаю и обезвреживаю ПОСТ
            $new_login = clearance_sql_in($conn, 'new_login');
            $new_pass = clearance_sql_in($conn, 'new_pass');
//      шифрую пароль
            $sil1 = '/@/6';
            $sil2 = '+*/?';
            $new_pass = hash('ripemd128', "$sil1$new_pass$sil2");
//      вношу в БД нового юзера
//          подключаюсь к БД
            require_once 'mysql_access.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) {
                die($conn->connect_error);
            }
//          вношу
            $query = "INSERT INTO users (login, password) VALUES ('$new_login', '$new_pass')";
            $result = $conn->query($query);
            if (!$result) {
                echo("$conn->error");
            }
            echo 'Вы успешно зарегистрировались. Теперь можете войти использую свои Логин и Пароль<br>';
            echo '<a href="auth_user.php">ВОЙТИ</a>';

//      освобождаю ресурсы
        $conn->close();
        $result->close();  //!!!!!!!!!ПОЧЕМУ ВЫДАЧА В БРАУЗЕРЕ МЕНЯЕТСЯ ПРИ ПЕРЕМЕЩЕНИИ ЭТОЙ СТРОКИ ПО КОДУ???!?!? НЕ НАШЁЛ ПОЯСНЕНИЙ В ИНТЕРНЕТЕ
        } 
            
//                  ГРУППА ЗАВИСИМЫХ ФУНКЦИЙ
//функция для обезвреживания содержания $_POST
        function clearance_post_in($var) {
            $var = stripslashes($var);
            $var = strip_tags($var);
            return $var = htmlentities($var);}
//функция для обезвреживания SQL-команды. включает в себя написанную выше ф для обезвреживания $_POST
        function clearance_sql_in($conn, $var) {
            $var = $conn->real_escape_string($_POST[$var]);
            return $var = clearance_post_in($var);}
      ?>
      
      
      
      
      
      <div>
         <h4>Регистрация нового пользователя</h4>
         <form action=add_new_user.php method='post'>
            Введите логин:
            <input type='text' name="new_login" autocomplet="on" required="required"><br>
            Введите пароль:
            <input type='password' name="new_pass" required="required"><br>
            Введите пароль ещё раз(пока не работате):
            <input type='password' name="new_pass2" required="required"><br>
            <input type="hidden" name='exists' value='1'>
            <input type='submit' value='Зарегистрироваться'>
         </form>
      </div>
   </body>
</html>
