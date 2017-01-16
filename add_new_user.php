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
            if (!($_POST['new_login'] == null) && !($_POST['new_pass'] == null)) {
                require_once 'mysql_access.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) {
                    die($conn->connect_error);
                }
//      извлекаю и обезвреживаю ПОСТ
            $new_login = clearance_sql_in($conn, 'new_login');
            $new_pass = clearance_sql_in($conn, 'new_pass');
                echo ('МАРКЕР');
//      вношу в БД нового юзера




    //            echo 'Вы успешно зарегистрировались. Теперь можете зайти использую свои Логин и Пароль<br>';
    //            echo '<a href="auth_user.php">Кнопка</a>';
            } else {
                echo ('Вы не ввели Логин или/и Пароль');
            }
            
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
            <input type='text' name="new_login"><br>
            Введите пароль:
            <input type='password' name="new_pass"><br>
            Введите пароль ещё раз(пока не работате):
            <input type='password' name="new_pass2"><br>
            <input type="hidden" name='exists' value='1'>
            <input type='submit' value='Зарегистрироваться'>
         </form>
      </div>
   </body>
</html>
