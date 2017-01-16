<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>AUTH</title>
   </head>
   <body>
      <?php
//более продвинутый способ аутентификации

//      $salt1 = '.;[=';
//      $salt2 = ',lp-';
//      $pass = 'qwerty';
//      echo $hashh = hash('ripemd128', "$salt1$pass$salt2");
      ?>
      
          
          
          
          
      <div>
         <form action = 'auth_user.php' method = 'post'>
            Введите логин:
            <input type='text' name='login_user'><br>
            Введите пароль:
            <input type='password' name='pass_user'><br>
            <input type='submit' value='Войти'>
         </form>
      </div>
      
          
          
          
          
       
      
      
      
      
      
      
       <?php
       
//баловство с куками       
//       setcookie('suser', 'Nick', time() + 60 * 60, '/');
//       if (isset($_COOKIE['suser'])) {
//           echo $suser = $_COOKIE['suser'];
//       }
       
       
//http-аутентификация. считается не самой надёжной!
//      $use='poiu';
//      $pwd='uiop';
//      if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
//          if (($_SERVER['PHP_AUTH_USER'] == $use) && ($_SERVER['PHP_AUTH_PW'])){
//              echo('Вы существкуете в БД'. $_SERVER['PHP_AUTH_USER']);
//          }
//          else {
//              die('Не верно ввёл!');
//          }
//      }
//      else {
//         header('WWW-Authenticate: Basic realm="БЛАБЛАБЛА"');
//         header('HTTP/1.0 401 Unautorized');
//         die('Пожалуйста, введите!');
//      } 
       ?>
      
   </body>
</html>
