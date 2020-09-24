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
        <p>
            Для обрабоки списков multiple в PHP предусмотрена возможность давать имена полям формы <b>в виде массива</b>. Если не использовать массив, то
            запишутся только <b>данные последнего поля.</b>
        </p>
        <form action="forms.php">
            <select name="Sel[]" multiple>
                <option>First</option>
                <option>Second</option>
                <option>Third</option>
            </select>
            <input type="submit">
        </form>
        <?php
        PHP_EOL;
            echo '$_REQUEST[\'sel\'] = ';
            print_r($_REQUEST['Sel']);
            echo '<br />';
            foreach($_REQUEST['Sel'] as $mass){
                echo $mass . '<br />';
            }
        ?>
        <p>
            <b>Массивы можно применять в любык элементах формы.</b>
        </p>
    <h2>Обработка масивов</h2>
        <form>
            <input type="text" name="Data[name]"> <br />
            <input type="text" name="Data[address]"> <br />
            <input type="text" name="Data[address]"> <br />
            Город: <br />
            <input type="radio" name="Data[city]" value="Moscow">Москва <br />
            <input type="radio" name="Data[city]" value="Piter">Питер <br />
            <input type="radio" name="Data[city]" value="Stavropol">Ставрополь <br />
            <input type="submit" name="go">
        </form>
        <?php
            foreach ($_REQUEST['Data'] as $mass){
                echo $mass . '<br />';
            }
        ?>
    <h2>Диагностика</h2>
    <p>
        При обработке данных с формы php создает следующие массивы:
        <ul>
            <li>$_GET - содержит GET-параметры, пришедшие через переменную
                окружения QUERY_STRING. пример:$_GET['login'}</li>
            <li>$_POST - Данные формы, пришедшие методом POST;</li>
            <li>$_COOKIE - все cookies, которые прислал браузер.</li>
            <li>$_REQUEST - объединение трех перечисленных
                выше массивов. <b>РЕКОМЕДУЕТСЯ использвать её.</b></li>
            <li>$_SERVER - содериж переменные окружения, переданные сервером.</li>
        </ul>
    </p>
    <p>Мы можем вывести все переменные в браузер используя $GLOBALS print_r($GLOBALS)</p>
    <pre>
        <?php
            print_r($GLOBALS);
         ?>
    </pre>
    <h2>Порядок трансляции переменных</h2>
        <p>
            GPC - Get - post - cookie. По умолчанию выполняется GPC, если будет переменные с одним именем
            , например $A = 10, $A = 20, $A = 30 переданные тримя массивами, то cookie перебеть два других.
        </p>
    <h2>Особенности флажков checkbox</h2>
    <p>
        Если флажок не установлен, то браузер не отправит сценарию информацию, это бувает не удобно.
        Для исправления ситуации нужно использовать поле с типом hidden, которое будет передавать
        значение value php, для пользователя же ничего не изменится.
    </p>
    <form>
        <?php
            if(isset($_REQUEST['sub'])){
                foreach($_REQUEST['known'] as $mass => $v){
                    if($v) {echo "Вы знаете $mass" . '<br />';}
                    else echo "Вы не знаете $mass" . '<br />';
                }
            }
        ?>
        <input type="hidden" name="known[PHP]" value="0">
        <input type="checkbox" name="known[PHP]" value="1">PHP

        <input type="hidden" name="known[PHP]" value="0">
        <input type="checkbox" name="known[C++]" value="1">C++
        <input type="submit" name="sub">
    </form>

</body>
</html>

<!--Синтаксис языка php-->
<!--Массивы: одномерные, многомерные, ассоциативные-->
<!--Управляющие конструкции: if, switch, циклы (for, foreach, while)-->
<!--Циклы foreach при работе с многомерными ассоциативными массивами-->
<!--Базовые алгоритмы: сортировка, поиск минимума и максимума, циклический сдвиг-->
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
        <p>
            Для обрабоки списков multiple в PHP предусмотрена возможность давать имена полям формы <b>в виде массива</b>. Если не использовать массив, то
            запишутся только <b>данные последнего поля.</b>
        </p>
        <form action="forms.php">
            <select name="Sel[]" multiple>
                <option>First</option>
                <option>Second</option>
                <option>Third</option>
            </select>
            <input type="submit">
        </form>
        <?php
        PHP_EOL;
            echo '$_REQUEST[\'sel\'] = ';
            print_r($_REQUEST['Sel']);
            echo '<br />';
            foreach($_REQUEST['Sel'] as $mass){
                echo $mass . '<br />';
            }
        ?>
        <p>
            <b>Массивы можно применять в любык элементах формы.</b>
        </p>
    <h2>Обработка масивов</h2>
        <form>
            <input type="text" name="Data[name]"> <br />
            <input type="text" name="Data[address]"> <br />
            <input type="text" name="Data[address]"> <br />
            Город: <br />
            <input type="radio" name="Data[city]" value="Moscow">Москва <br />
            <input type="radio" name="Data[city]" value="Piter">Питер <br />
            <input type="radio" name="Data[city]" value="Stavropol">Ставрополь <br />
            <input type="submit" name="go">
        </form>
        <?php
            foreach ($_REQUEST['Data'] as $mass){
                echo $mass . '<br />';
            }
        ?>
    <h2>Диагностика</h2>
    <p>
        При обработке данных с формы php создает следующие массивы:
        <ul>
            <li>$_GET - содержит GET-параметры, пришедшие через переменную
                окружения QUERY_STRING. пример:$_GET['login'}</li>
            <li>$_POST - Данные формы, пришедшие методом POST;</li>
            <li>$_COOKIE - все cookies, которые прислал браузер.</li>
            <li>$_REQUEST - объединение трех перечисленных
                выше массивов. <b>РЕКОМЕДУЕТСЯ использвать её.</b></li>
            <li>$_SERVER - содериж переменные окружения, переданные сервером.</li>
        </ul>
    </p>
    <p>Мы можем вывести все переменные в браузер используя $GLOBALS print_r($GLOBALS)</p>
    <pre>
        <?php
            print_r($GLOBALS);
         ?>
    </pre>
    <h2>Порядок трансляции переменных</h2>
        <p>
            GPC - Get - post - cookie. По умолчанию выполняется GPC, если будет переменные с одним именем
            , например $A = 10, $A = 20, $A = 30 переданные тримя массивами, то cookie перебеть два других.
        </p>
    <h2>Особенности флажков checkbox</h2>
    <p>
        Если флажок не установлен, то браузер не отправит сценарию информацию, это бувает не удобно.
        Для исправления ситуации нужно использовать поле с типом hidden, которое будет передавать
        значение value php, для пользователя же ничего не изменится.
    </p>
    <form>
        <?php
        if(isset($_REQUEST['sub'])){
            foreach($_REQUEST['known'] as $mass => $v){
                if($v) {echo "Вы знаете $mass" . '<br />';}
                else echo "Вы не знаете $mass" . '<br />';
            }
        }
        ?>
        <input type="hidden" name="known[PHP]" value="0">
        <input type="checkbox" name="known[PHP]" value="1">PHP

        <input type="hidden" name="known[PHP]" value="0">
        <input type="checkbox" name="known[C++]" value="1">C++
        <input type="submit" name="sub">
    </form>

</body>
</html>

<!--Синтаксис языка php-->
<!--Массивы: одномерные, многомерные, ассоциативные-->
<!--Управляющие конструкции: if, switch, циклы (for, foreach, while)-->
<!--Циклы foreach при работе с многомерными ассоциативными массивами-->
<!--Базовые алгоритмы: сортировка, поиск минимума и максимума, циклический сдвиг-->
