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

echo "<h1 align='center'>Отладочные функции</h1>";
echo 'В php существует три отладочные функции которые позовляют легко распечатать в браузер содержимое любой переменной
      . Это касается массивов, объектов, скалярных переменных, константы null.';

echo '<h2> string pring_r(mixed $expression, bool $return = false)</h2>';
echo 'Функция принимает на вход переменную или выражение и распечатет ее отладочное предосавление.<br>';
    $mass = [23, 44, 23, 88, 23 ,23];
    $mass2 = ["name"=>"dmitriy", "age" => 24, "mail"=>"dmitriy8796@inbox.ru"];
    echo '<pre>';print_r($mass2); echo '</pre>';
echo 'Если указан параметр $return и равен true, функция ничего не печатает в браузер. Вместо этого она возвращает сформированное
        отладочное представление в виде строки. Это же относится и к двум другим отладочным функциям.<br>';

echo '<h2> string var_dump(mixed $expression, bool $return = false)</h2>';
echo 'Функция печатет не только значение переменных и массивов, но и информацию об их типах.<br>';
echo '<pre>';var_dump($mass2); echo '</pre>';

echo '<h2> string var_export(mixed $expression, bool $return = false)</h2>';
echo 'Напоминает print_r(), но только она выводит значение переменной так, что оно может быть использовано прямо как "кусок"
        PHP-программы. <br>';
    var_export($mass);
    class SomeClass{
        private $x = 100;
    }
    $obj = new SomeClass();
    echo "<pre>"; var_export($obj); echo "</pre";


?>
</body>
</html>

<!--Синтаксис языка php-->
<!--Массивы: одномерные, многомерные, ассоциативные-->
<!--Управляющие конструкции: if, switch, циклы (for, foreach, while)-->
<!--Циклы foreach при работе с многомерными ассоциативными массивами-->
<!--Базовые алгоритмы: сортировка, поиск минимума и максимума, циклический сдвиг-->
