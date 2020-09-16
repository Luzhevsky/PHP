<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
<?php require_once '../option/nav.php'; ?>
<?php require_once '../include/functions.php'; ?>


    <h1 align='center'>Задачи</h1>

    <h2>Числа фибоначи</h2>
    <pre>
        $num = сколько чисел хотим;
        $a = 1;
        $b = 1;
        for ($i = 0; $i < $num; $i++){
            $a = $b;
            $b = $c;
            $c = $a + $b;
            echo $c . '&ltbr /&gt';
        }
    </pre>
    <?php
        $num = 8;
        $a = 1;
        $b = 1;
        for ($i = 0; $i < $num; $i++){
            $a = $b;
            $b = $c;
            $c = $a + $b;
            $sum = $sum + $c;
            echo $c . '<br />';
        }
        echo 'сумма равна = '.$sum;
    ?>
    <h2>Задания из книги</h2>





<!--    <form>-->
<!--        <input type="hidden" name="known[PHP]" value="0">-->
<!--        <input type="checkbox" name="known[PHP]" value="1">PHP-->
<!---->
<!--        <input type="hidden" name="known[PHP]" value="0">-->
<!--        <input type="checkbox" name="known[C++]" value="1">C++-->
<!--        <input type="submit" name="sub">-->
<!--    </form>-->

</body>
</html>

