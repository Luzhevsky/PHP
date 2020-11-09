<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
<p>
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

    <h2>Конкатенация строк</h2>
        <p>
            Раньше использовался плюс. Сейчас только ".". После использования точки пытается превести
            левые и правые части к строковым значениям, если не может то воспринимает как объект object или
            array массив. Например:
        </p>
        <pre>
            $a = [10, 20, 30];
            echo "asdf " .$a;// ошибка
        </pre>
        <?php
            $a = [10, 20, 30];
            echo "asdf " .$a;
        ?>
        <p>
            Более специалецированный способ использования кавычек в которых указывается переменные. Пример:
        </p>
        <pre>
            $day = 19;
            $month = "Февраль";
            $year = 2020;
            echo "Все произошло $day $month $year";
        </pre>
        <?php
            $day = 19;
            $month = "Февраль";
            $year = 2020;
            echo "Все произошло $day $month $year";
        ?>
    <h2>О сравнении строк</h2>
        <p>
            ПРи использовании оператроа == и =! со строками иногда результат не соответствует ожиданиям.
        </p>
        <pre>
            $one = 1;
            $zero = 0;
            if($one == "") echo 1;// Не верно не будет напечатно 1
            if($zero == "") echo 2;// Верно будет напеччатано 2
            if("" == $zero) echo 3;// верно будет наапечатано 3
            if("$zero" == "") echo 4;// Не верно не будет напечатно 4. Строка "0" не равно пустой строке.
            if(strval($zero) == "") echo 5;// Не верно не будет напечатно 5. strval($zero) переведет 0 в строку.
            if($zero === "") echo 6;// Не верно не будет напечатно 6. тройное равентство === сравнивает не только значения но и типы.
        </pre>
        <?php
            $one = 1;
            $zero = 0;
            if($one == "") echo 1;// Не верно не будет напечатно 1
            if($zero == "") echo 2;// Верно будет напеччатано 2
            if("" == $zero) echo 3;// верно будет наапечатано 3
            if("$zero" == "") echo 4;// Не верно не будет напечатно 4. Строка "0" не равно пустой строке.
            if(strval($zero) == "") echo 5;// Не верно не будет напечатно 5. strval($zero) переведет 0 в строку.
            if($zero === "") echo 6;// Не верно не будет напечатно 6. тройное равентство === сравнивает не только значения но и типы.
        ?>
    <h2>Особенности strpos()</h2>
        <p>
            Ошибка с которой можно встретится используя if и strpos(). Пусть у нас есть строка
            и мы должны напечаттать сообщение если символ например "<" найден в этой строке. Пишем
            нашу проверку:
        </p>
        <pre>
            $str = "<&lt?php echo 'asdf323f';";
            if(strpos($str, "&lt?") != false){
                echo "Это php-программа";
            } else {
                "Нет";
            }
        </pre>
        <?php
            $str = "<?php echo 'asdf323f';";
            if(strpos($str, "<?") != false){
                echo "Это php-программа";
            } else {
                echo "Нет, не php";
            }
        ?>
        <p>
            В чем дело?? почему нет? А дело в том что strpos возвращает нам 0 так как
            символ находится на нулевой позиции, а ноль это false. Так что нужно использовать оператор !==
        </p>
        <pre>
            $str = "<&lt?php echo 'asdf323f';";
            if(strpos($str, "&lt?") !== false){
                echo "Это php-программа";
            } else {
                "Нет";
            }
        </pre>
        <?php
            $str = "<?php echo 'asdf323f';";
            if(strpos($str, "<?") !== false){
                echo "Это php-программа";
            } else {
                echo "Нет, не php";
            }
        ?>
        <p>
            Несколько заданий по strpos
        </p>
        <ol>
            <li>Дана строка 'abc abc abc'. Определите позицию первой буквы 'b'.</li>
            <li>Дана строка 'abc abc abc'. Определите позицию последней буквы 'b'.</li>
            <li>Дана строка 'abc abc abc'. Определите позицию первой найденной буквы 'b',
                если начать поиск не с начала строки, а с позиции 3.</li>
            <li>Дана строка 'aaa aaa aaa aaa aaa'. Определите позицию второго пробела.</li>
            <li>Проверьте, что в строке есть две точки подряд. Если это так - выведите 'есть', если не так - 'нет'.</li>
            <li>Проверьте, что строка начинается на 'http://'. Если это так - выведите 'да', если не так - 'нет'.</li>
        </ol>
        <p>Решения</p>
            <p>1. Дана строка 'abc abc abc'. Определите позицию первой буквы 'b'.</p>
                <pre>
                    $s = 'abc abc abc';
                    echo 'Позиция первой буквы b = ' . strpos($s, "b");
                </pre>
                <?php
                    $s = 'abc abc abc';
                    echo 'Позиция первой буквы b = ' . strpos($s, "b");
                ?>
            <p>2. Дана строка 'abc abc abc'. Определите позицию последней буквы 'b'.</p>
                <pre>
                    $s = 'abc abc abc';
                    echo 'Позиция последней буквы b = ' . strrpos($s, "b");
                </pre>
                <?php
                    $s = 'abc abc abc';
                    echo 'Позиция последней буквы b = '. strrpos($s, "b");
                ?>
            <p>
                3. Дана строка 'abc abc abc'. Определите позицию первой найденной буквы 'b', если начать поиск не с начала строки, а с позиции 3.
            </p>
                <pre>
                    $s = 'abc abc abc';
                    echo 'Позиция первой буквы b, поиск с 3 символа = ' . strrpos($s, "b", 3);
                </pre>
                <?php
                    $s = 'abc abc abc';
                    echo 'Позиция первой буквы b, поиск с 3 символа = '. strpos($s, "b", 3);
                ?>
            <p>
                4. Дана строка 'aaa aaa aaa aaa aaa'. Определите позицию второго пробела.
            </p>
                <pre>
                    $s = 'aaa aaa aaa aaa aaa';
                    echo 'позиция второго пробела = '. strpos($s, " ", strpos($s, " ")+1);
                </pre>
                <?php
                    $s = 'aaa aaa aaa aaa aaa';
                    echo 'позиция второго пробела = '. strpos($s, " ", strpos($s, " ")+1);
                ?>
            <p>
                5. Проверьте, что в строке есть две точки подряд. Если это так - выведите 'есть', если не так - 'нет'.
            </p>
                <pre>
                    $s = 'aaa aaa aaa aaa aaa..fghghf..';
                    if(strpos($s, "..") !== false){
                        echo "Есть";
                    } else {
                        echo "Нет.";
                    }
                </pre>
                <?php
                    $s = 'aaa aaa aaa aaa aaa..fghghf.';
                    if(strpos($s, "..") !== false){
                        echo "Есть<br />";
                    } else {
                        echo "Нет.<br />";
                    }
                ?>
            <p>
                6. Проверьте, что строка начинается на 'https://'. Если это так - выведите 'да', если не так - 'нет'.
            </p>
                <pre>
                    $s = 'https://dmitriyluzhevskiy.com';
                    if(strpos($s, "https://") !== false){
                        echo "Да";
                    } else {
                        echo "Нет.";
                    }
                </pre>
                <?php
                    $s = 'https://dmitriyluzhevskiy.com';
                    if(strpos($s, "https://") !== false){
                        echo "Да<br />";
                    } else {
                        echo "Нет.<br />";
                    }
                ?>
    <h2>Отрезания пробелов</h2>
        <p>
            Программа должна быть максимально строга в формату выходных данных и максимально лояльна пр отношению к входным.
            Прежде чем передать полученные от пользователя строки куда-то дальше, - например функциям, ножно на данными
            поработать. Самое простое, что нужно сделать отрезать начальные и конечные пробелы. Функция trim работает молненосной
            скоростью. Если отделять нечего описанные функции мгновенно заканчивают свою работу. Юзать нужно!
        </p>
        <p>
            Функция string trim(string $st [, string $charlist]). Возвращает копию $st, с удаленными ведущими и концевыми пробельными
            символами. Под пробелными симолами подразумевается:
        </p>
            <ul>
                <li>Пробел " "</li>
                <li>Символ перевода строки \n</li>
                <li>Символ возврата каретки \r</li>
                <li>Символ табуляции \t</li>
                <li>Нулевой байт \0</li>
                <li>Вертикальная табуляция \x0B</li>
            </ul>
        <p>
            Установить альтернативный набор символов можно при помощи необязательного параметра $charlist. Он представляетс
            из себя строку в которой перечислены все символы подлежащие удалению.
        </p>
        <pre>
            $a = trim(" hello world!    \n");
            echo $a . '&ltbr /&gt';
            $a = " hello world!    \n";
            echo $a . '&ltbr /&gt';
        </pre>
        <?php
            $abc = "  Hello World   ";
            var_dump($abc);


            $preg = preg_replace('/[^a-z1-9.%()\'<>]/i','',$abc);


            $trimmed1 = trim('   Hello World   ', "Hello");
            var_dump($trimmed1);

        echo "<br />";

            $hello  = " Hello World   ";
            var_dump($hello);

            $trimmed = trim("  Hello World   ", "Hdle");
            var_dump($trimmed);

            $trimmed = trim($hello, 'HdWr');
            var_dump($trimmed);
            echo "hello с пробелами длинна = ". strlen($hello);
            echo "hello без пробелов = ". strlen(trim($hello));

        ?>
        <p>
            ПРобуем по другому
        </p>
        <?php
            $str = "    Hello world";
            $trims = trim($str);
            $strlen= strlen($str);
            $strtrim = strlen($trims);
            echo "strlen = $strlen, trimlen = $strtrim";
        ?>
        <p>
            Вроде все работает, но нужно быть аккуратнее с браузером, он не всегда отображает коректро то, что нам нужно.
        </p>
        <p>
            Еще пару функций без премеров которые можно использовать, хотя и вряд-ли нужно.
        </p>
            <ul>
                <li>string ltrim(string $st [, string $charlist]) - удаляет ведущие пробелы или парвые</li>
                <li>string rtrim(string $st [, string $charlist])- удаляет коныевые или левые пробелы</li>
                <li>string chop(string $st [, string $charlist]) - тоже только концевые пробелы, не трогая ведущие. тоже что и rtrim</li>
            </ul>



        <p>
            Несколько заданий по trim
        </p>
        <ol>
            <li>Дана строка. Очистите ее от концевых пробелов.</li>
            <li>Дана строка '/php/'. Сделайте из нее строку 'php', удалив концевые слеши.</li>
            <li>Дана строка 'слова слова слова.'. В конце этой строки может быть точка,
                а может и не быть. Сделайте так, чтобы в конце этой строки гарантировано стояла точка.
                То есть: если этой точки нет - ее надо добавить, а если есть - ничего не делать. Задачу решите через rtrim без всяких ифов.</li>

        </ol>
        <p>Решения</p>
            <p>1. Дана строка. Очистите ее от концевых пробелов.</p>
            <pre>
                $s = 'abc abc abc     ';
                $b = ltrim($s);
                echo " длинна строка с концевыми пробелами = ".strlen($s) . " длинна строка без концевых пробелов = ". strlen($b);
            </pre>
            <?php
                $s = 'abc abc abc     ';
                $b = rtrim($s);
                echo " длинна строка с концевыми пробелами = ".strlen($s) . " длинна строка без концевых пробелов = ". strlen($b);
            ?>
            <p>2. Дана строка '/php/'. Сделайте из нее строку 'php', удалив концевые слеши.</p>
            <pre>
                $s = '/php/';
                $b = rtrim($s, '/');
                echo $b;
            </pre>
            <?php
                $s = '/php/';
                $b = rtrim($s, '/');
                echo $b;
            ?>
            <p>
                3. Дана строка 'слова слова слова.'. В конце этой строки может быть точка, а может и не быть. Сделайте так,
                чтобы в конце этой строки гарантировано стояла точка. То есть: если этой точки нет - ее надо добавить,
                а если есть - ничего не делать. Задачу решите через rtrim без всяких ифов.
            </p>
            <pre>
                $s = '/php/';
                $b = rtrim($s, '/');
                echo $b;
            </pre>
            <?php
                $s = 'слова слова слова';
                $b = rtrim($s, ".") . ".";
                echo $b;
            ?>



    <h2>Базовые функции</h2>
        <p>
            <i style="font-size: 20px;">int strlen(string $st)</i> полезная функция возвращает длину строки, количество содержащий в st символов
        </p>
        <p>
            <i style="font-size: 20px;">int strpos(string $where, string $what [, int $from = 0])</i> Пытается найти в строке
            $where подстоку(последовательность символов) $what и в случае успеха возвращает позицию этой подстроки первый индекс
            имеет позицию 0. Параметро from задаем если нужно вести поиск не с начало строки. при неудачи возвращает false.
        </p>
        <p>
            <i style="font-size: 20px;">int strrpos(string $where, string $what [, int $from = 0])</i> Тоже самое что strpos Только
            воследюю позицию.Пытается найти в строке
            $where подстоку(последовательность символов) $what и в случае успеха возвращает последюю позицию в
            которой встечается это строка. Параметро from задаем если нужно вести поиск не с начало строки. при неудачи возвращает false.
        </p>
        <p>
            <i style="font-size: 20px;">int strcmp(string $str1, string $str2)</i> Сравнивает две строчки посимвольно( точнее по байтово) и
            возвращает:
        </p>
            <ul>
                <li>0, если строки послностью совподают;</li>
                <li> -1, если строка $str лексигофически меньше $str2;</li>
                <li> 1, если строка $str лексигофически болше $str2;</li>
            </ul>
        <p>
            Так как сравнение идет по байтово, то регистр символов влияет на результаты сравнения. Пустые строки могет быть равны только
            другим пустым строкам и они наименьшие текстовые значения.
        </p>
        <p>
            <i style="font-size: 20px; color: blue;">В PHP 7 вместо функции выше можно использовать оператор <=>.</i>
        </p>
        <p>
            <i style="font-size: 20px;">int strcasecmp(string $str1, string $str2) Тоже самое, что и int strcmp только не учитывает регистр</i>
            <i style="color: red;">Могут возникнуть проблемы с русскими символами (кириллицей)/</i>
        </p>
    <h2>Работа с подстроками</h2>
        <p>
            <i style="font-size: 20px;">string substr(string $str, int $start [,int $length])</i> Возвращает участок строки $str, начиная
            с позиции $start и длинной $length. Если $length не задана, то подразумевается подстрока от $start до конца строки $str.
            Если $start больше, чем длина строки, или же значение $length равно нулю, то возвращается пустая строка.
            Если передать в $start отрицательное число, то будет считаться, что это число является индекстом подстроки, но
            отсчитываемым от конца $str(например -1 онзаначет "начиная с последнего символа строки."). В этом случает
            последним символом возвращенной подстроки будет символ из $str с индексом $length, определяемым от конца строки.
        </p>
        <p>
            Несколько заданий по substr
        </p>
        <ol>
            <li>Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'.</li>
            <li>Дана строка. Вырежите и выведите на экран последние 3 символа этой строки.</li>
            <li>Дана строка. Проверьте, что она начинается на 'http://'. Если это так, выведите 'да', если не так - 'нет'.</li>
            <li>Дана строка. Проверьте, что она начинается на 'http://' или на 'https://'. Если это так, выведите 'да', если не так - 'нет'.</li>
            <li>Дана строка. Проверьте, что она заканчивается на '.png'. Если это так, выведите 'да', если не так - 'нет'.</li>
            <li>Дана строка. Проверьте, что она заканчивается на '.png' или на '.jpg'. Если это так, выведите 'да', если не так - 'нет'.</li>
            <li>Дана строка. Если в этой строке более 5-ти символов - вырежите из нее первые 5 символов, добавьте троеточие в конец
                и выведите на экран. Если же в этой строке 5 и менее символов - просто выведите эту строку на экран.</li>
        </ol>
        <p>Решения</p>
        <p>1. Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'.</p>
            <pre>
                $s = 'html css php';
                $b = [substr($s,0,4), substr($s, strpos($s, 'c'),3), substr($s,strpos($s, 'p'),3)];
                foreach ($b as $value){
                    echo "$value";
                }
            </pre>
            <?php
                $s = 'html css php';
                $b = [substr($s,0,4), substr($s, strpos($s, 'c'),3), substr($s,strpos($s, 'p'),3)];
                foreach ($b as $value){
                    echo "$value<br />";
                }
            ?>
        <p>2. Дана строка. Вырежите и выведите на экран последние 3 символа этой строки.</p>
            <pre>
                $s = 'html css php';
                $b = substr($s, -3,3);
                echo "$b";
            </pre>
            <?php
                $s = 'html css php';
                $b = substr($s, -3,3);
                echo "$b";
            ?>

    <h2>Замена</h2>
        <p>
            Функции полезны, если нужно проводить однотипные операции замены с блоками текста, заданными в строковой переменной.
        </p>
        <p>
            <i style="font-size: 20px;">string str_replace(string $from, string $to, mixed $text [,int $&count])</i> заменяет в строке
            $text все вхождения подстроки $from( с учетом регистра) на $to и возвращает результат. Исходная строка при этом
            не меняется. Если указать не обязательный параметро $count, то в него будет записано количество замен.
        </p>
        <p>
            тип text mixed значит можно передавать массивы. Если передать массив, то замена произойдет в каждом элменте
            массива. А вернет функция результат не изменяе изначальный.
        </p>
        <p>
            <i style="font-size: 20px;">string str_ireplace(string $from, string $to, mixed $text [,int $&count])</i> без учета регистра
        </p>
        <p>
            <i style="font-size: 20px;">string substr_replace(string $text, string $to, int $start [,int $len])</i>
            Функция предназначена для замены в строке $text учатска, начинающегося с позиции $start и длины $len на $to.
            На параметры $start и $len накладываются ограничения и разрешения как и у функции substr().
        </p>
    <h2>Подстановка</h2>
        <p>
            Функции подстановки предназначен для того, чтобы в одном и том же тексте искть и заменять сразу
            несколько пар различных подстрок.
        </p>
        <p>
            <i style="font-size: 20px;">string substr_replace(list $text, list $to, int $start [,int $len])</i>
            Функции можно передавать массивы в качесте аргументов. Если $from и $to - массивы, замена происходит
            так:  каждый лемент из $from заменяет соответсвующий элментом из $to. Можно заменить несколько пар
            подстрок.
        </p>
</body>
</html>


