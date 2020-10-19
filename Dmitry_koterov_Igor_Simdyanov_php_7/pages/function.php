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
            
        </p>
</body>
</html>

