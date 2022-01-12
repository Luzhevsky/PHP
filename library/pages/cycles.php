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

    echo "<h1 align='center'>Циклы</h1>";

    echo '<h2>Цикл Switch case</h2>';

    echo '<pre>switch(выражение){
            case значение1: команды1; [break;]
            case значение2: команды2; [break;]
            ...
            case значениеN: командыN; [break;]
            [default: команды_по_умолчанию; [break]]
          }</pre>';
    echo 'Если не писать break то будут выполняться все команды после соответствующей<br>';

    echo '<pre><b>Реализация функции c использованием switch case</b> 
    function calculate($int1, $int2, $char){
    switch($char){
        case "*": return $int1 * $int2;
        case "+": return $int1 + $int2;
        case "-": return $int1 - $int2;
        case "/": return $int1 / $int2;
        default: echo "Такого оператора не существует";
    }</pre><br>';
    echo 'calculate(2,5,"/") <br>';
    echo 'Результат:' . calculate(2,5,"/") . "<br>";

    echo '<h2>Цикл foreach</h2>';
    $mass = [23, 44, 23, 88, 23 ,23];
    $mass2 = ["name"=>"dmitriy", "age" => 24, "mail"=>"dmitriy8796@inbox.ru"];
    foreach($mass2 as $key => $number){
        echo '<li>' . $key . ' => ' . $number . ' тип ключа: ' . gettype($key) . ' тип значения: '. gettype($number) .'</li>';

    }



?>
</body>
</html>

<!--Синтаксис языка php-->
<!--Массивы: одномерные, многомерные, ассоциативные-->
<!--Управляющие конструкции: if, switch, циклы (for, foreach, while)-->
<!--Циклы foreach при работе с многомерными ассоциативными массивами-->
<!--Базовые алгоритмы: сортировка, поиск минимума и максимума, циклический сдвиг-->