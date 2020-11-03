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

                $collect = collect($m, function($e){return $e * $e;});
                foreach ($collect as $value){
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

            $collect = collect($m, function($e){return $e * $e;});
            foreach ($collect as $value){
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
        <pre>
            $select = select($m, function ($x) {return $x % 2 == 0 ? true : false;});
            $collect = collect($select, function ($e) {return $e * $e;});
            foreach ($collect as $item) {
                echo $item .  '&ltbr /&gt';
            }
        </pre>
        <?php
            $select = select($m, function ($x) {return $x % 2 == 0 ? true : false;});
            $collect = collect($select, function ($e) {return $e * $e;});
            foreach ($collect as $item) {
                echo $item . '<br />';
            }
        ?>
    <h2>Делегирование(передача части функций) генераторов</h2>
        <p>
            Логику обрабоки данных можно поместить в сами генераторы, а не использовать функции обратного вызова.
            При этом нужно сделать небольшие изменения. (можно запутатся).
        </p>
        <pre>
            function square ($value){
                yield $value * $value;
            }
            function even_square ($arr) {
                foreach ($arr as $value){
                    if($value % 2 == 0) yield from square($value);
                }
            }
            $arr = [1,2,3,4,5];
            foreach(even_square($arr) as $val)
                echo $val . '&ltbr /&gt';
        </pre>
        <?php
            function square ($value){
                yield $value * $value;
            }
            function even_square ($arr) {
                foreach ($arr as $value){
                    if($value % 2 == 0) yield from square($value);
                }
            }
            $arr = [1,2,3,4,5];
            foreach(even_square($arr) as $val)
                echo $val . '<br />';
        ?>
        <p>
            После ключевого слова from могут распологаться не только генераторы, но и массивы.
        </p>
        <pre>
            function gener(){
                yield 1;
                yield from [2,3];
            }

            foreach (gener() as $i) echo $i . '&ltbr /&gt';
        </pre>
        <?php
            function gener(){
                yield 1;
                yield from [2,3];
            }

            foreach (gener() as $i) echo $i . '<br />';
        ?>

    <h2>Экономия ресурсов</h2>
        <p>
            Рассмотренные генераторы collect(), select() и reject(). При их работе не создается копии массива.
            Если исходный массив занимает несколько мегобайт -  это позоволяет нам экономисть ресурсы сервера,
            т.к. на каждой итерации мы имеем дело толко с объемом памяти, который занимает элемент массива.
            Приведем премер и проверим.
        </p>
        <p>
            Программу запускать не буду, все будет закоментированно, так как программа долго загружает страницу.
            Использовано порядко 32МБ.
        </p>
        <pre>
            function crange($size) {
                $arr = [];
                for($i = 0; $i < $size; $i++) {
                    $arr[] = $i;
                }
                return $arr;
            }
            $range = crange(1024000);
            foreach($range as $i) echo "$i ";
            echo "'&ltbr /&gt' количество памяти равно: ";
            echo memory_get_usage(). "'&ltbr /&gt'"
        </pre>
        <?php
//            function crange($size) {
//                $arr = [];
//                for($i = 0; $i < $size; $i++) {
//                    $arr[] = $i;
//                }
//                return $arr;
//            }
//            $range = crange(1024000);
//            foreach($range as $i) echo "$i ";
//            echo "<br /> количество памяти равно: ";
//            echo memory_get_usage(). "<br />"

        ?>
        <p>
            Перепишем сценарий с ипсользованием генератора.
        </p>
        <pre>
            function crange($size)
            {
                for($i = 0; $i < $size; $i++) {
                    yield $i;
                }
            }
            foreach (crange(1024000) as $value) echo "$value ";
            echo "&ltbr /&gt количество памяти равно: ";
            echo memory_get_usage(). "&ltbr /&gt"
        </pre>
        <?php
//        function crange($size)
//        {
//            for($i = 0; $i < $size; $i++) {
//                yield $i;
//            }
//        }
//        foreach (crange(1024000) as $value) echo "$value ";
//        echo "<br /> количество памяти равно: ";
//        echo memory_get_usage(). "<br />"
        ?>
        <p>
            Использование памяти уменьшелось на 2 порядка. 345кб.
        </p>
    <h2>Использование ключей</h2>
        <p>
            Генераторы допускают работу с ключами, для этого после yield указывается точно такая же пара ключ => значение.
        </p>
        <pre>
            function collectKey($arr, $callback){
                    foreach($arr as $key => $value){
                        yield $key => $callback($value);
                    }
                }

                $arr = ["first" => 1, "second" => 2, "third" => 3, "fourth" => 4, "fifth" => 5, "sixth" => 6];
                $collectKey = collectKey($arr, function($e){return $e * $e;});
                foreach ($collectKey as $key => $value){
                    echo "$key ($value) ";
                }
        </pre>
            <?php
                function collectKey($arr, $callback){
                    foreach($arr as $key => $value){
                        yield $key => $callback($value);
                    }
                }

                $arr = ["first" => 1, "second" => 2, "third" => 3, "fourth" => 4, "fifth" => 5, "sixth" => 6];
                $collectKey = collectKey($arr, function($e){return $e * $e;});
                foreach ($collectKey as $key => $value){
                    echo "$key ($value) ";
                }
            ?>
    <h2>Использование ссылки</h2>
        <p>
            Для генераторов как и для обычных функций допускаяется возврат значений по ссылке. Благодоря этому мы можем
            влиять на значение внутри генератора.
        </p>
        <pre>
            function &reference(){
                    $value = 3;
                    while($value > 0){
                        yield $value;
                    }
                }
                foreach(rejerence() as &$value){
                    echo (--$value). ' ';
                }
        </pre>
            <?php
                function &reference(){
                    $value = 3;
                    while($value > 0){
                        yield $value;
                    }
                }
                foreach(reference() as &$value){
                    echo (--$value). ' ';
                }
            ?>
    <h2>Использование генераторов с объектами</h2>
        <p>
            На самом деле генератор возвращает объект, в чем можно убедится используя gettype(). Одним из метовод генератора является
            send(), который позволяет оправить значение внуть генератора и использовать yield для инициализации переменных внутри генератора.
        </p>
        <pre>
            function block(){
                while(true){
                    $string = yield;
                    echo $string;
                }
            }
            $block = block();
            $block->send("hello, world!<br />");
            $block->send("hello, PHP!<br />");
        </pre>
        <?php
            function block(){
                while(true){
                    $string = yield;
                    echo $string;
                }
            }
            $block = block();
            $block->send("hello, world!&ltbr /&gt");
            $block->send("hello, PHP!&ltbr /&gt");
        ?>
        <p>
            Если поместить конструкцию return то она будет работать, но сколько бы небыло операторов после return Они работать не будут.
            Но с PHP7 можно извлечь значение которое возвращается при помощи return, посредстром метода - getReturn().
        </p>
        <pre>
            function generator2()
            {
                yield 1;
                return yield from two_three();
                yield 5;
            }
            function two_three(){
                yield 2;
                yield 3;
                return 4;
            }

            $generaton = generator2();
            foreach($generaton as $i){
                echo "$i&ltbr /&gt";
            }
            echo "return = ".$generaton->getReturn();
        </pre>
        <?php
            function generator2()
            {
                yield 1;
                return yield from two_three();
                yield 5;
            }
            function two_three(){
                yield 2;
                yield 3;
                return 4;
            }

            $generaton = generator2();
            foreach($generaton as $i){
                echo "$i<br />";
            }
            echo "return = ".$generaton->getReturn();
        ?>
</body>
</html>

