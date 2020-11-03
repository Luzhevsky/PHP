<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
<?php require_once '../option/nav.php'; ?>
<?php require_once '../include/functions.php'; ?>


<h1 align='center'>Строковые функции</h1>
    <h2>Строковые функции</h2>
        <p>
            КОдировка ASCII. Функция 'chr()' позволяет получить рспечатать коды символов. Обратная функция 'ord()'.
        </p>
        <pre>
            for($code = 32; $code < 128; $code++){
                echo "code ($code)=".chr($code)." ";
            }
        </pre>
        <?php
            for($code = 32; $code < 128; $code++){
                echo "code ($code)=".chr($code)."<br />";
            }
        ?>
    <h2>UTF и PHP</h2>
        <p>
            В PHP 7 символы из кодировки UTF-8 могут быть заданы при помощи специального синтаксиса. в строках указывается
            последовательность \u после которой следует шестнадцатеричный код символа в фигурных скобках. "\u{0410}".
        </p>
        <pre>
            echo "\u{0410}"; //коды русской буквы А.
            echo "&ltbr /&gt ";
        </pre>
        <?php
            echo "\u{0410}";
            echo "<br />";
        ?>
        <p>
            Проблемы с поддержкой UTF-8 на уровне языка Php.
        </p>
        <pre>
            $str = "hello world";
            echo "{$str[2]}&ltbr /&gt";
            $str = "Привет, мир!";
            echo "{$str[2]}&ltbr /&gt";
            echo strlen($str);
        </pre>
        <?php
            $str = "hello world";
            echo "{$str[2]}<br />";
            $str = "Привет, мир!";
            echo "{$str[2]}<br />";
            echo strlen($str);
        ?>

        <p>
            Проблема до сих пор не решена, однако для выкуручивания(танцы с бубнами) можно подключить расширение mbstring
            для этого заходим в php.ini находим и разкомментируем(убераем ;) extension_dir = "ext" и extention=php_mbstring.dll.
            <b style="font-size:15px; color: red;">Если используешь локальный встроенный php ИЗМЕНИ php.ini-development на php.ini</b>
        </p>
        <pre>
            $str = "Привет, мир!";
            echo "В строке &quot;$str&quot; ".strlen($str). " байт&ltbr /&gt";
            echo "В строке &quot;$str&quot; ".mb_strlen($str). " символов&ltbr /&gt";
        </pre>
        <?php
            $str = "Привет, мир!";
            echo "В строке &quot;$str&quot; ".strlen($str). " байт<br />";
            echo "В строке &quot;$str&quot; ".mb_strlen($str). " символов<br />";
        ?>
</body>
</html>


