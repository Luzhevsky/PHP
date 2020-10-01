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
</body>
</html>

