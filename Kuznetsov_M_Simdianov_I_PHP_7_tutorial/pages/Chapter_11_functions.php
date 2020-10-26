<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
<?php require_once '../option/nav.php'; ?>
<?php require_once '../include/functions.php'; ?>
<h1>Глава 11. Функции.</h1>
<h2>Задания</h2>
    <ol>
        <li class="li_task">
            В документации к языку PHP найдите и изучите приемы использования функции
            function_exists(), осуществляющей проверку существования функции.
        </li>
        <li class="li_task">
            Создайте функцию odd(), которая принимает в качестве аргумента целое
            число и возвращает true в случает, если число нечетное, и false - в противоположном случае.
        </li>
        <li class="li_task">
            Создайте функцию sum(), которая принимает любое количество числовых аргументов и
            возвращает их сумму.
        </li>

    </ol>
<h2>Решения</h2>

    <h3>1.  В документации к языку PHP найдите и изучите приемы использования функции
        function_exists(), осуществляющей проверку существования функции. </h3>
        <p> Проверяет существует ли функция и возвращает true если существует.</p>
        <pre>if(function_exists("odd")) echo "Функция существует";</pre>
        <?php

            if(function_exists("odd")) echo "Функция существует.<br />";
        ?>
    <h3>2. Создайте функцию odd(), которая принимает в качестве аргумента целое
        число и возвращает true в случает, если число нечетное, и false - в противоположном случае. </h3>
        <pre>
             function odd(int $integ){
                $bool = "true";
                if($integ % 2 == 0){
                      $bool = "false";
                }
                return $bool;
            }
            echo odd(234) . '&ltbr /&gt';
            echo odd(233);
        </pre>
        <?php
            function odd(int $integ){
                $bool = "true";
                if($integ % 2 == 0){
                      $bool = "false";
                }
                return $bool;
            }
            echo odd(234) . '<br />';
            echo odd(233) . '<br />';
        ?>

    <h3>3. Создайте функцию sum(), которая принимает любое количество числовых аргументов и
        возвращает их сумму. </h3>
        <pre>
            function sumAll(...$a){
                $sum = 0;
                foreach ($a as $v){
                    $sum = $sum + $v;
                }
                return $sum;
            }
            echo sumAll(2,2,2,2,343,434,34);
        </pre>
        <?php
            function sumAll(...$a){
                $sum = 0;
                foreach ($a as $v){
                    $sum = $sum + $v;
                }
                return $sum;
            }
            echo sumAll(2,2,2,2,343,434,34);
        ?>

</body>
</html>
