<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
<?php require_once '../option/nav.php'; ?>
<?php require_once '../include/functions.php'; ?>
<?php

echo "<h1 align='center'>Работа с данными формы</h1>";

echo '<h2>Передача данных командной строки</h2>';
    echo 'данные из командной строки можно получить используя переменную окружения query_string, которая в php доступна как $_SERVER[\'QUERY_STRING\']<br>';
    echo "Даннные из командной строки:<b> {$_SERVER['QUERY_STRING']}(добавь php?this в браузер)</b> При всем при этом, переменные переданые командной строке приходят в той же форме, которой
        они были посланы браузеру.<br>";

    echo $_SERVER['SERVER_NAME'] . '<br>';

?>
<form action = "hello.php">
    Логин: <input type="text" name="login" value=""><br />
    Пароль: <input type="password" name="password" value=""><br />
    <input type="submit" value="Нажми кнопку">
</form>
<?php
    echo '<h2>Трансляция полей формы</h2>';
    echo 'Все данные из полей формы передаются в глобальный массив $_REQUEST, то есть получить данные о логине и паролье из формы мы можем используя,
        $_REQUEST[\'login\'] и $_REQUEST[\'password\']<br>';
    if($_REQUEST['login'] == "root" && $_REQUEST['password'] == "Z10N0101"){
    echo "Доступ откыт для пользователя {$_REQUEST['login']}";
    system("rundll32.exe user32.dll,LockWorkStation");
    } else {
        echo "Доступ закрыт!<br>";
    }
    if(!isset($_REQUEST['doGo'])) {?>
    <form action="<?=$_SERVER['SCRIPT_NAME']?>">
        Логин: <input type="text" name="login" value=""><br />
        Пароль: <input type="password" name="password" value=""><br />
        <input type="submit" name="doGo" value="Нажмите кнопку!">
    </form>
<?php } else {
        if($_REQUEST['login'] == "root" && $_REQUEST['password'] == "Z10N0101") {
            echo "Доступ откыт для пользователя {$_REQUEST['login']}";
            system("rundll32.exe user32.dll,LockWorkStation");
        } else {
            echo "Доступ закрыт!<br>";
        }
    }
?>
    <h2>Трансляция переменных окружения</h2>
        <p>В переменные преобразуюся не только данные формы, но и переменные окружения(включая QUERY_STRING, CONTENT_LENGTH  и другие).</p>
        <p>Напичатаем IP адрес пользователя, которые запустил сценарий и его браузер.</p>
        Ваш IP-адрес: <?= $_SERVER['REMOTE_ADDR'] ?> <br />
        Ваш браузер: <?= $_SERVER['HTTP_USER_AGENT'] ?> <br />
    <h2>Трансляция cookies</h2>
    <p>Все cookies, пришедшие скрипту, попадают в массив $_COOKIES. </p>
    <?php
        echo '<pre>
        $count = 0;
        if (isset($_COOKIE[\'count\'])) $count = $_COOKIE[\'count\'];
        $count++;
        setcookie("count", $count, 0x7FFFFFFF, "/");
        echo $count;</pre><br />';
    ?>
    <h2>Обработка списков</h2>

</body>
</html>

<!--Синтаксис языка php-->
<!--Массивы: одномерные, многомерные, ассоциативные-->
<!--Управляющие конструкции: if, switch, циклы (for, foreach, while)-->
<!--Циклы foreach при работе с многомерными ассоциативными массивами-->
<!--Базовые алгоритмы: сортировка, поиск минимума и максимума, циклический сдвиг-->
