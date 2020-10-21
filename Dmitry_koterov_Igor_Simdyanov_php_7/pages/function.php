<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
<?php require_once '../option/nav.php'; ?>
<?php require_once '../include/functions.php'; ?>


<h1 align='center'>Функции и области видимости</h1>
    <h2>Интересный пример применения функции</h2>
        <pre>
            unset($mass);
                $mass = ["Film" => "Фильмы", "Book" => "Книги", "Music" => "Музыка", "etc" => "Прочее"];

                function selectSection($mass, $selection = 0)
                {
                    $ch = "";
                    foreach ($mass as $section => $value) {
                        if ($section === $selection) {
                            $ch = " selected";
                        } else {
                            $ch = "";
                        }

                        echo "&ltoption value='$section' $ch&gt$value&lt/option&gt";
                    }
                }
                if(isset($_REQUEST['section'])){
                    $sec = $mass[$_REQUEST['section']];
                    echo "Вы выбрали раздел: $sec";
                }
        </pre>
            <?php
                unset($mass);
                $mass = ["Film" => "Фильмы", "Book" => "Книги", "Music" => "Музыка", "etc" => "Прочее"];

                function selectSection($mass, $selection = 0)
                {
                    $ch = "";
                    foreach ($mass as $section => $value) {
                        if ($section === $selection) {
                            $ch = " selected";
                        } else {
                            $ch = "";
                        }

                        echo "<option value='$section' $ch>$value</option>";
                    }
                }
                if(isset($_REQUEST['section'])){
                    $sec = $mass[$_REQUEST['section']];
                    echo "Вы выбрали раздел: $sec";
                }
            ?>
        <form   action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" >
            Выберите раздел:
            <select name="section">
                <?=selectSection($mass, $_REQUEST['section'] )?>
            </select>
            <input type="submit" value="Узнать значение">
        </form>

    <h2>Общий синтасис определения функции</h2>
        <p>
            Имя функциии не зависит ригистра имена function_123 и FUNCTION_123 РАВНЫ.
            Нельзя переопределять функцию.
            Желательно использовать(обязательно) вирблюжий синтаксис задания имен: functionDima, returnMonth and etc..
        </p>
        <pre>
            function ИмяФункции(арг1[=зн1], арг2[=зн2], ... , аргN[=знN]){
                операторы_тела функцииж
            }
        </pre>
    <h2>Инструкция return.</h2>
        <p>
            инструкция return может возвращать любые объекты, любых размеров. Без заметных потерь быстродействия.
            Несколько значений сразу функция вернуть не может, для этого нужно использовать массив.
        </p>
        <p>
            Возврат массива.
        </p>
        <pre>
             function m_r(){
                return [1, 2, 3];
            }
            echo m_r()[2]; // Доступкно с версии php 5.4
            print_r(m_r());
        </pre>
        <?php
            function m_r(){
                return [1, 2, 3];
            }
            echo m_r()[2] . '<br />';
            print_r(m_r()) . '<br />';
        ?>
        <p>Если функция ничего не возвращает, то она не явно возращает null</p>
        <pre>
            function n(){}
            var_dump(n());
        </pre>
        <?php
            function n(){}
            var_dump(n());
        ?>
    <h2>Объявление и вызов функции.</h2>
        <p>
            Функции объявлять можно где угодно в файле, потом вызывать даже если функция расположена ниже.
            Если функция расположенна в другом файле, то вызвать можно только полсе подключения файла.
            Лучше ВСЕГДА вызвавать функцию после ее объявления(и не париться).
        </p>
    <h2>Параметры по умолчанию</h2>
        <p>
            Если хотим задать параметр по умолчанию, просто присваеваем ему необходимое значение.
        </p>
        <pre>
            function par($a=25, $b=23){
                return $a + $b;
            }
            echo par();
        </pre>
        <?php
            function par($a=25, $b=23){
                return $a + $b;
            }
            echo par() . '<br />';
        ?>
        <p>
            Если хотим задать оддин параметр по умолчанию тут посложнее, нужно задать параметры по умолчанию
            справа, обычные слева. То есть сначала расположены обычные параметры за ними по умолчанию.
        </p>
        <pre>
            function parDef($a, $b, $c = 0, $e=1){
                return $a + $b + $c + $e;
            }
            echo parDef(2,3);
        </pre>
        <?php
            function parDef($a, $b, $c = 0, $e=1){
                return $a + $b + $c + $e;
            }
            echo parDef(2,3) . '<br />';

        ?>
    <h2>Передача параметров по ссылке</h2>
        <p>
            Если хотим, чтобы функция меняла значение переменной передаваемой в неё.
            Указывает сылочную переменную через &.
        </p>
        <pre>
            function link2(&$a){
                $a++;
            }
            $k = 25;
            echo $k . ' до функции';
            link2($k);
            echo $k . ' после функции';
        </pre>
        <?php
            function link2(&$a){
                $a++;
            }
            $k = 25;
            echo $k . ' до функции<br />';
            link2($k);
            echo $k . ' после функции<br />';
        ?>
    <h2>Переменное число параметров</h2>
        <p>
            Если передать в Php Больше параметров в функцию, то лишние будут игнорироваться,
            благодоря этому можно сделать переменное число параметров(Устаревший способ)
            используя функцию func_get_arg($i).
        </p>

        <pre>
            function parametersMuchOne(){
                $sum = 0;
                for ($i = 0; $i < func_num_args(); $i++){
                    $sum += func_get_arg($i);
                }
                return $sum;
            }
        </pre>
        <p>Через цикл for используя функции func_num_args() и  func_get_arg()</p>
        <?php
            function parametersMuchOne(){
                $sum = 0;
                for ($i = 0; $i < func_num_args(); $i++){
                    $sum += func_get_arg($i);
                }
                return $sum;
            }
            echo parametersMuchOne(1,2,3,4,5,6);
        ?>
        <p>Через цикл foreach используя функцию  func_get_args()</p>
        <pre>
            function parametersMuchTwo(){
                $sum = 0;
                foreach (func_get_args() as $mass){
                    $sum += $mass;
                }
                return $sum;
            }
            echo parametersMuch(15,123,32,123,123);
        </pre>
        <?php
            function parametersMuch(){
                $sum = 0;
                foreach (func_get_args() as $mass){
                    $sum += $mass;
                }
                return $sum;
            }
            echo parametersMuch(15,123,32,123,123);
        ?>
        <p>
            Начиная с версии PHP 5.6 можно использовать еще более компактую запись. Переменное число
            пармаметров (современный метод).
        </p>
        <pre>
            function parMuch(...$planets){
                foreach ($planets as $value){
                    echo "$value&ltbr /&gt\n"; // выводим элемент
                }
            }
        </pre>
        <?php
            function parMuch(...$planets){
                foreach ($planets as $value){
                    echo "$value<br />\n"; // выводим элемент
                }
            }
            parMuch("Меркурий", "Марс", "Земля");
        ?>
        <p>
            Можно использовать многоточие при передачи аргументов функции. <b>Нужно учитывать, что количество
                аргументов должно быть больше или равно количесту параметров</b>, иначе возникнет ошибка.
            Пример:
        </p>
        <pre>
            if(function_exists("m2")){
                echo "Ошибка функция существует&ltbr /&gt";
            }
            function ma2($one, $two, $three, $four) {
                echo "$one &ltbr /&gt";
                echo "$two &ltbr /&gt";
                echo "$three &ltbr /&gt";
                echo "$four &ltbr /&gt";
            }
            unset($mass);
            $mass = ["Меркурий", "Марс", "Земля", "Венера"];
            ma2(...$mass);
        </pre>
        <?php
            if(function_exists("m2")){
                echo "Ошибка функция существует<br />";
            }
            function ma2($one, $two, $three, $four) {
                echo "$one <br />";
                echo "$two <br />";
                echo "$three <br />";
                echo "$four <br />";
            }
            unset($mass);
            $mass = ["Меркурий", "Марс", "Земля", "Венера"];
            ma2(...$mass);
        ?>
    <h2>Типы аргументов и возвращаемоно значения</h2>
        <p>
            C версии PHP 5, допускается указывать типы аргументов (объекты, массивы, интерфейсы, функции обратного вызова).
             <b style="font-size:20px;">В PHP 7 количество допустимых типов рассширено булевым bool, целочисленным int, вещественным float и строковым
                 string типами. Кроме того позволяет задавать тип возвращаемого функцией значение который указывается через двоеточие.</b>
        </p>
        <pre>
            function sum(int $a, int $b) : int {
                return $a + $b;
            }
            echo sum(25, 25);
            echo sum(25.64,25.3);// автоматически вещественный тип приводится к целому
        </pre>
        <?php
            function sum(int $a, int $b) : int {
                return $a + $b;
            }
            echo sum(25,25) . '<br />';
            echo sum(25.64,25.3) . '<br />';
        ?>
        <p>
            <b style="font-size:20px;">Если хотим строгй режим типизации(ошибка при неправельном типе), нужно включить строгий режим типизации. Для включения режима
            жесткой типпизации необходимо воспользоваться ключевым словом declare, установив значение объявления
                struct_types в значение 1.</b>
        </p>
        <pre>
            declare(strict_types=1); //Должно быть в самом начале файла как инструкция. До HTML5
            function sum1(int $a, int $b) : int {
                return $a + $b;
            }
            echo sum(25.64,25.3);
            //Fatal error: Uncaught TypeError: Argument 1 passed to sum() must be of the type int, float given
        </pre>
        <p>В PHP 7 генерируется исключения TypeError, которое можно перехватить.</p>
    <h2>Локальные переменные</h2>
        <p>
            Локальные переменные живут только внутри функции(без жесткой ссылке). Вообщем это и так знаем.
        </p>
        <pre>
            $a = 100;
            function add($a){
                echo 'Внутри функции $a = '.$a;
                $a++;
            }
            echo  'Значение переменной a за пределами функции = ' . $a;
            add(1);
            echo $a;
        </pre>
        <?php
            $a = 100;
            function add($a){
                echo 'Внутри функции $a = '.$a . '<br />';
                $a++;
            }
            echo  'Значение переменной a за пределами функции = ' . $a . '<br />';
            add(1) . '<br />';
            echo $a . '<br />';
        ?>

    <h2>Глобальные переменные</h2>
        <p>
            Есть способ, посредством которого функции могут получить до любой глобальной переменной в программе.
            Для этого они должны действия. До первого использования в теле внейшей переменной объявить переменную
            глобальной при помощи инструкции global: global $variable;
        </p>
        <?php
            $monthes = [
                1 => "Январь",
                2 => "Февраль",
                3 => "Март",
                4 => "Апрель",
                5 => "Май",
                6 => "Июнь",
                7 => "Июль",
                8 => "Август",
                9 => "Сентябрь",
                10 => "Октябрь",
                11 => "Ноябрь",
                12 => "Декабрь"
            ];
            function getMonth($number_monthes){
                global $monthes;
                return $monthes[$number_monthes];
            }
            echo getMonth(13). '<br />';
        ?>

    <h2>Массив $GLOBALS</h2>
        <p>
            Есть способ добраться до глобальных переменных. Это использование встроенного в язык массива $GLOBALS.
            Массив $GLOBALS представляет собой хеш, ключи которого это имена глобальных переменных, а значения - их величины.
            Массив доступен из любого места в программе в том числе и из тела функции, его не нужно дополнительно объявлять.
        </p>
        <pre>
            function month2($number){
                return $GLOBALS['monthes'][$number];
            }
            echo month2(3);
        </pre>
        <?php
            function month2($number){
                return $GLOBALS['monthes'][$number];
            }
            echo month2(3) . '<br />';
        ?>
        <p style="font-size: 19px;">
            Полезные сведенья о $GLOBALS:
                <ul style="font-size: 19px;">
                    <li>
                        Является голбальным для любой функции, а также для самой программе. Допустимо использование
                        не только в теле функции, но и в любом другом месте.
                    </li>
                    <li>
                        С массивом $GLOBALS допустимы не все операции, разрешенные с обычными массивами. Мы не можем:
                        <ul>
                            <li>присвоить этот массив какой-либо переменной целиком, используя оператор =;</li>
                            <li>как следсвие, передать его функции "по значению" - можно передать только по ссылке</li>
                        </ul>
                        Остальные операции допустымы. Можно перебрать его элементы используя цикл foreach.
                    </li>
                    <li> Добавление нового элемента в $GLOBALS равнозначно созданию новой глобальнй переменной,
                        а выполнение операции unset() для него равносильно уничтожению соответсвующей переменной.
                    </li>
                </ul>
        </p>
    <h2>Самовложенность</h2>
        <p>
            В массиве $GLOBALS есть переменная GLOBALS, которая таже является массивом и в котором также есть элемент $GLOBALS.
        </p>
    <h2>Как работает инструкция global</h2>
        <p>
            Инструкция global $a создает ссылки. Ниже преведенные примеры эквивалентны.
        </p>
        <pre>
            function test(){
                global $a;
                $a = 10;
            }
            function test2(){
                $a = &$GLOBALS['a'];
                $a = 10;
            }
        </pre>
        <?php
            function test(){
                global $a;
                $a = 10;
            }
            function test2(){
                $a = &$GLOBALS['a'];
                $a = 10;
            }
        ?>
        <p>Из второго фрагмента слудеут, что оператор unset($a) не уничтожит глобальную переменную, а отвяжет от нее ссылку $a.</p>
        <pre>
             $a = 100;
            function test3(){
                global $a;
                unset($a);
            }
            echo "$a";
        </pre>
        <?php
            $a = 100;
            function test3(){
                global $a;
                unset($a);
            }
            echo "$a <br />";
        ?>
        <p>Для удаления глобальной переменной $a существует только один способ использовать $GLOBALS['a'].</p>
        <pre>
            function deleter(){
                unset($GLOBALS['a']);
            }
            $a = 100;
            deleter();
            echo "$a"; // Ничего не будет выведено переменная равн NULL
            var_dump($a);
        </pre>
        <?php
            function deleter(){
                unset($GLOBALS['a']);
            }
            $a = 100;
            deleter();
            var_dump($a);
        ?>

    <h2>Статические переменные</h2>
    <p>
        Значение статической переменной запоминается.
    </p>
    <pre>
         function st(){
            static $count = 0;
            $count++;
            echo $count;
        }
        st();
        st();
        st();
    </pre>
    <?php
        function st(){
            static $count = 0;
            $count++;
            echo $count;
        }
        st();
        st();
        st();
    ?>
    <p>
        Без static будет выведено 111;
    </p>

    <h2>Рекурсии</h2>
    <p>
        Php поддерживает вызов функции самой себя в соответсвии с условием.
    </p>

    <h2>Факториал</h2>
    <p>
       Пример рекурсивной функции факториал. Быстродействие под сомнением.
    </p>
    <p>
        <ul>
            <li>f1 = 1;</li>
            <li>f2 = 1 * 2;</li>
            <li>f3 = 1 * 2 * 3;</li>
            <li>f4 = 1 * 2 * 3 * 4;</li>
        </ul>
    </p>
    <pre>
        function factorial($n){
           if($n <= 0){
               return 1;
           } else {
                return $n * factorial($n - 1);
            }
        }
        echo  factorial(30);
    </pre>
    <?php
        function factorial($n){
           if($n <= 0){
               return 1;
           } else {
                return $n * factorial($n - 1);
            }
        }
        echo  factorial(30);
    ?>
    <h2>Пример функции: dumper()</h2>
        <pre>
              function dumper($obj){
                echo "&ltpre&gt", htmlspecialchars(dumperGet($obj)), "&lt/pre&gt";
            }
            function dumperGet(&$obj, $leftSp = ""){
                if(is_array($obj)){
                    $type = "Array[".count($obj)."]";
                } elseif (is_object($obj)) {
                    $type = "Object";
                } elseif (gettype($obj) == "boolean"){
                    return $obj ? "true" : "false";
                } else {
                    return "\"$obj\"";
                }
                $buf = $type;
                $leftSp .= "   ";
                for (Reset($obj); list($k, $v) = each($obj);){
                    if ($k === "GLOBALS") continue;
                    $buf .= "\n$leftSp$k => ".dumperGet($v, $leftSp);
                }
                return $buf;
            }
            dumper($GLOBALS);
        </pre>
        <?php

            function dumperr($obj){
                echo "<pre>", htmlspecialchars(dumperGet($obj)), "</pre>";
            }
            function dumperGett(&$obj, $leftSp = ""){
                if(is_array($obj)){
                    $type = "Array[".count($obj)."]";
                } elseif (is_object($obj)) {
                    $type = "Object";
                } elseif (gettype($obj) == "boolean"){
                    return $obj ? "true" : "false";
                } else {
                    return "\"$obj\"";
                }
                $buf = $type;
                $leftSp .= "   ";
                for (Reset($obj); list($k, $v) = each($obj);){
                    if ($k === "GLOBALS") continue;
                    $buf .= "\n$leftSp$k => ".dumperGet($v, $leftSp);
                }
                return $buf;
            }
            dumper($GLOBALS);
        ?>
    <h2>Вложенные функции</h2>
        <p>
            PHP стандарт не поддерживает вложенные функции, однаок он поддерживает нечто похожее.
            Вместо того чтобы, как и у переменных, ограничить область видимости для вложеных функции своими "родителями",
            PHP делает их доступными для всей остальной части программы, но только с того момента как функция была из нее вызвана.
        </p>

    <h2>Условно определяемые функции</h2>
        <p>
            Функции которые создаются после выполнения какого либо условия.
        </p>
        <p>
            Функции которые создаются после выполнения какого либо условия.
        </p>
        <?php
            if (PHP_OS == "WINNIT"){
                 function myChown($fname, $attr){
                     return 1;
                }
            }else{
                 function myChown($fname, $attr){
                     return chown($fname, $attr);
                 }
            }
        ?>

    <h2>Эмуляция функции virtual()</h2>
        <p>страница 227</p>

    <h2>Передача функции по ссылке</h2>
        <p>Короче можно присвоить переменной имя функции и потом вызвать функцию через эту переменную.</p>
        <pre>
            function A($i) { echo "Вызвана A($i)\n"; }
            $F = "A";
            $F(23);
        </pre>

        <?php
            function A($i) { echo "Вызвана A($i)\n"; }
            $F = "A";
            $F(23);

            function fCmp($a, $b){
                return strcmp(strtolower($a), strtolower($b));
            }
            $riddle = ["g" => "Not", "o" => "enough", "d" => "ordinariness"];
            uasort($riddle, "fCmp");
            print_r($riddle);
        ?>
        <pre>

            function A($i) { echo "Вызвана A($i)\n"; }
            $F = "A";
            $F(23);
            //Не понял
            function fCmp($a, $b){
                return strcmp(strtolower($a), strtolower($b));
            }
            $riddle = ["g" => "Not", "o" => "enough", "d" => "ordinariness"];
            uasort($riddle, "fCmp");
            print_r($riddle);
        </pre>

    <h2>Использование call_user_func()</h2>
        <p>
            Рекомедуется вместо способа выше использовать стандартую функцию call_user_func().
        </p>
        <pre>
            function a1($i) { echo "Вызвана a1($i)\n";}
            function b1($i) { echo "Вызвана b1($i)\n";}
            function c1($i) { echo "Вызвана c1($i)\n";}
            $f = "a1";
            call_user_func($f, 234);
        </pre>
        <?php
            function a1($i) { echo "Вызвана a1($i)\n";}
            function b1($i) { echo "Вызвана b1($i)\n";}
            function c1($i) { echo "Вызвана c1($i)\n";}
            $f = "a1";
            call_user_func($f, 234);
        ?>
        <p> Функция запуская на выполнение подпрограмму которая задана в первом параметре и передает ей
            аргументы заданые в остальных.
            Объясняется такая рекомендаяит тем, что в качестве первого параметра функции call_user_func() можнт
            быть передано не только строковое значение, но и массив из двух элементов, содержащий:
            <ul>
                <li>имя класса(или ссылку на объект класса</li>
                <li>имя метода класса</li>
            </ul>
        </p>

    <h2>Использование call_user_func_array()</h2>
        <p> Функция предназначена для вызова подпрограмм, когда на момент вызова точно неизвестно, сколько именно аргументов им
            слудует передать. Ее описание:
            mixed call_user_func_array(string $имя_функции, array $аргументы)
            в отличии от сall_user_func параметры передаются не последовательно а в виде списка.
        </p>
        <pre>
            function myecho(...$str){
                foreach ($str as $v){
                    echo "$v&ltbr /&gt\n";
                }
            }
            function tabber($spaces, ...$planets){
                $new = [];
                foreach ($planets as $planet){
                    $new[] = str_repeat("&ampnbsp;", $spaces).$planet;
                }
                call_user_func_array("myecho", $new);
            }
        </pre>
        <?php
            function myecho(...$str){
                foreach ($str as $v){
                    echo "$v<br />\n";
                }
            }
            function tabber($spaces, ...$planets){
                $new = [];
                foreach ($planets as $planet){
                    $new[] = str_repeat("&nbsp;", $spaces).$planet;
                }
                call_user_func_array("myecho", $new);
            }
        tabber(10,"Меркурий", "Венера","Земля", "Марс");
        ?>
    <h2>Анонимные функции</h2>
        <p>
            Анонимные функции функции где в качестве имени выступает переменная. И вызов происходит через переменную.
            Предпологаю, что создается ссылка.
        </p>
        <?php
            $myecho = function (...$str){
                foreach ($str as $v){
                    echo "$v</br>\n";
                }
            };
            $myecho("Меркурий", "Венера","Земля", "Марс");
        ?>
        <p>
            Анонимные функции допускается передавать в качестве параметров другим функциям.
        </p>
</body>
</html>

