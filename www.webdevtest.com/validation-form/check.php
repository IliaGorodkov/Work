<?php

$login = $_POST['login'];
$email= $_POST['email'];
$pass =$_POST['pass'];
$pass2 =$_POST['pass2'];


if(mb_strlen($login)< 4|| mb_strlen($login) > 30) {
  echo"Недопустимая Длинна Логина.";
  exit();
} else if (mb_strlen($email) <3|| mb_strlen($email)>40){
    echo"Не правильнно введен Email.";
  exit();
}
  else if (mb_strlen($pass) < 4 || mb_strlen($pass)>30 ) {
    echo"Недопустимая Длинна Пороля.";
  exit();
}
  else if ($pass != $pass2)  {
    echo"Пароль не совпадает с тем который вы Ввели прежде.";
  exit();
}


$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "mysql"; // Пароль БД
$db_base = 'Work'; // Имя БД
$db_table = "users";
$mysqli = mysqli_connect($db_host,$db_user,$db_password,$db_base);



if (isset($_POST["login"])) {
 $sql = mysqli_query($mysqli, "INSERT INTO `users` (`login`, `email`,`pass`) VALUES ('{$_POST['login']}',
 '{$_POST['email']}','{$_POST['pass']}')");

 if ($sql) {
  //echo '<p>Данные успешно добавлены в таблицу.</p>';
} else {
  echo '<p>Произошла ошибка: ' .mysqli_error ($mysqli) . '</p>';
}
}
if(($sql) == true) {
  session_start();
  $_SESSION['user'] = $login;
  header('Location: http://localhost/www.webdevtest.com/');
}
?>
