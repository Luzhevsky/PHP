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

echo "<h1 align='center'>Константы</h1>";

echo '<h2>Предопределенные константы</h2>';
echo 'Константы которые устанавливаются интерпретатором<br>';
echo '_FILE_ - хранит имя файла, в котором расположен запущенный в настоящий момент код<br>';
echo '_LINE_ Содержит номер строки, которую обрабатывает в текущий момент интерпретатор.<br>';
echo '_FUNCTION_ Имя текущей функции<br>';
echo '_CLASS_ Имя тукущего класса<br>';
echo 'PHP_VERSION_ версия интерпретатора PHP<br>';
echo 'PHP_OS имя OS, под управление которой работает PHP<br>';
echo 'PHP_EOL Символ конца строки, используемый на текущей платформе; \n для Linux, \r\n для Windows и \n\r для Mac OS X<br>';
echo 'true TRUE<br>';
echo 'FALSE false<br>';
echo 'NULL null<br>';

echo '<h2>Определение констант</h2>';
echo 'void define(string $name, string $value, bool $case_sen = true)<br>';
echo 'Пример определим константу name = Dmitriy<br>';
    define("name123", "dmitriy");
echo  'name = ' . name123 . '<br>';
echo 'Пример определим ценолочисленную константу pi = 3.141592<br>';
    define("pi", 3.141592);
    echo pi . '<br>';

echo '<h2>Проверка существования константы</h2>';
echo 'bool defined(string $name)<br>';
echo 'вернет true если кончтанта ранее была определена<br>';
echo  'defined(name123)= '.defined("name123");

echo '<h2>Константы с динамическими именами</h2>';
echo 'Может вожникнуть ситуация, когда константа формируется динамически в ходе выполнения программы, и нельзя заранее предугадать ее имя и жестко задать
        в теле скрипта. В этом слущае используется функция constant()<br>';
echo 'mixed constant(string $name)<br>';
echo 'Фнукция возвращает значение константы с именем $name. Если константа не обнаружена, функция генерирует предупреждение.<br>';
echo 'constant("pi") = ' . constant("pi") . '<br>';
?>

</body>
</html>

<!--Синтаксис языка php-->
<!--Массивы: одномерные, многомерные, ассоциативные-->
<!--Управляющие конструкции: if, switch, циклы (for, foreach, while)-->
<!--Циклы foreach при работе с многомерными ассоциативными массивами-->
<!--Базовые алгоритмы: сортировка, поиск минимума и максимума, циклический сдвиг-->
