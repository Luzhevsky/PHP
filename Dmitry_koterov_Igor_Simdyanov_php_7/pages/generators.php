<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
<?php require_once '../option/nav.php'; ?>
<?php require_once '../include/functions.php'; ?>


<h1 align='center'>Генераторы</h1>
    <h2>Отложенные вычисления</h2>
        <p>
            Генератор это обычная функция, однако вместо слово return используется оператор yield. Смысл генераторов
            в возможности отложенного вычисления, пример ниже. Генераторы используются с циклом foreach.
            Как только в функции интерпретатор доходит до слова yeild он передает управление в цилк foreach,
            после чего возвращается в функцию.
        </p>
        <pre>
             function simple($from = 0, $to = 100){
                  for($i = $from; $i < $to; $i++){
                      echo "значение = $i&ltbr /&gt";
                      yield $i;
                  }
            }
            simple();
            foreach (simple() as $v){
                if($v >= 5) break;
            }
        </pre>
        <?php
            function simple($from = 0, $to = 100){
                  for($i = $from; $i < $to; $i++){
                      echo "значение = $i<br />";
                      yield $i;
                  }
            }
            simple();
            foreach (simple() as $v){
                if($v >= 5) break;
            }
        ?>
        <p>Пример генераторы без цикла в нутри. Выполнив третьию итерацию, не встретив больше ключевых слов yield, функция генератор
        завершает работы, возвращая null/</p>
            <pre>
            function generator(){
                echo "Перед первым yield&ltbr /&gt";
                yield 1;
                echo "Перед вторым yield&ltbr /&gt";
                yield 2;
                echo "Перед третьего yield&ltbr /&gt";
                yield 3;
                echo "После третьего yield&ltbr /&gt";
            }
            foreach(generator() as $val){
                echo $val . '&ltbr /&gt';
            }
            </pre>
        <?php
            function generator(){
                echo "Перед первым yield<br />";
                yield 1;
                echo "Перед вторым yield<br />";
                yield 2;
                echo "Перед третьего yield<br />";
                yield 3;
                echo "После третьего yield<br />";
            }
            foreach(generator() as $val){
                echo $val . '<br />';
            }
        ?>
    <h2>Манипуляции массивами</h2>
        <p>
            Приведем пример манипуляциями массивами. В функции представленной ниже мы испульзуем генератор для изменения массива,
            передаем в функцию collect массив и функцию обратного вызова collback, которая будет являтся анонимной
            функцией для изменения массива.
        </p>
        <pre>
                    $m = [1,2,3,4,5];

                function collect($mass, $callback){
                    foreach($mass as $v){
                        yield $callback($v);// функция обратного вызова
                    }
                }

                $collec = collect($m, function($e){return $e * $e;});
                foreach ($collec as $value){
                    echo "$value &ltbr /&gt";
                }
        </pre>
        <?php
            $m = [1,2,3,4,5,7,8,9];

            function collect($mass, $callback){
                foreach($mass as $v){
                    yield $callback($v);// функция обратного вызова
                }
            }

            $collec = collect($m, function($e){return $e * $e;});
            foreach ($collec as $value){
                echo "$value <br />";
            }

        ?>
        <p>
            Функция выводит массив в квадрате, для вывода других модификаций массива, можно просто изменить анонимную функцию.
        </p>
        <p>
            Функция select извлекает четные элементы.
        </p>
        <pre>
            function select($mass, $callback){
                foreach($mass as $value) {
                    if ($callback($value)) {
                        yield $value;
                    }
                }
            }
            $select = select($m, function($x){return $x % 2 == 0 ? true : false; });
            foreach ($select as $v){
                echo $v . '&ltbr /&gt';
            }
        </pre>
        <?php
            function select($mass, $callback){
                foreach($mass as $value) {
                    if ($callback($value)) {
                        yield $value;
                    }
                }
            }
            $select = select($m, function($x){return $x % 2 == 0 ? true : false; });
            foreach ($select as $v){
                echo $v . '<br />';
            }
        ?>
        <p>
            Изменим немного и функцию и выведим только нечетные элементы. Функция reject
        </p>
        <pre>
        function reject($mass, $callback){
            foreach($mass as $value) {
                if (!$callback($value)) {
                    yield $value;
                }
            }
        }
        $reject = reject($m, function($x){return $x % 2 == 0 ? true : false; });
        foreach ($reject as $v){
            echo $v . '&ltbr /&gt';
        }
        </pre>
        <?php
        function reject($mass, $callback){
            foreach($mass as $value) {
                if (!$callback($value)) {
                    yield $value;
                }
            }
        }
        $reject = reject($m, function($x){return $x % 2 == 0 ? true : false; });
        foreach ($reject as $v){
            echo $v . '<br />';
        }
        ?>
        <p>
            Комбинация генераторов друг с другом.
        </p>
        <?php

        ?>

</body>
</html>

