<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>

<?php require_once '../option/nav.php'; ?>
<?php require_once '../include/functions.php'; ?>


<h1 align='center'>Ассоциативные массивы</h1>

    <h2>Небольшой пример</h2>
        <p>
            Демонстрация работы со списками. Через for, лучше использовать foreach.
        </p>
        <pre>
            $nameList[0] = "Dmitriy";
            $nameList[1] = "Ivan";
            $nameList[2] = "Anatoliy";
            echo "Первый элмемент $nameList[0]";
            все элементы массива
            for ($i = 0; $i < count($nameList); $i++){
                echo $nameList . '&ltbr&gt';
            }
            <?php
                $nameList[0] = "Dmitriy";
                $nameList[1] = "Ivan";
                $nameList[2] = "Anatoliy";
                echo "Первый элмемент $nameList[0] <br />";
                echo 'все элементы массива <br />';
                for ($i = 0; $i < count($nameList); $i++){
                    echo $nameList[$i] . '<br />';
                }
            ?>
            <p>количество элементов массива count() или sizeof()</p>
        </pre>
    <h2>Создание массива "на лету". Автомассивы.</h2>
        <p>Можно не писать в скобочках номер элемента, в этом случае будет автоматически присваеватся номер.</p>
        <pre>
            unset($nameList); // Удалим предыдущий массив иначе он будет сохранен
            $nameList[] = "Dmitriy";
            $nameList[] = "Ivan";
            $nameList[] = "Anatoliy";
            echo "Первый элмемент $nameList[0]";
            все элементы массива
            for ($i = 0; $i < count($nameList); $i++){
                echo $nameList . '&ltbr&gt';
            }
            <?php
                unset($nameList);
                $nameList[] = "Dmitriy";
                $nameList[] = "Ivan";
                $nameList[] = "Anatoliy";
                echo "Первый элмемент $nameList[0] <br />";
                echo 'все элементы массива <br />';
                for ($i = 0; $i < count($nameList); $i++){
                    echo $nameList[$i] . '<br />';
                }
            ?>
        </pre>
        <p>количество элементов массива count() или sizeof()</p>

        <p><b>Для создание ассоциативного массива вместо цифрового ключа используем строковый ключ.</b></p>
        <pre>
             unset($nameList); // Удалим предыдущий массив иначе он будет сохранен
            $nameList["Sidorov"] = "Dmitriy";
            $nameList["Petrov"] = "Ivan";
            $nameList["Ivanov"] = "Anatoliy";
            echo "Первый элмемент ". $nameList["Sidorov"] .";// Лучший вариант
            echo "Первый элмемент $nameList[Sidorov] //;Можно и так
            все элементы массива
            foreach ($nameList as $mass => $key){
                echo echo $key . ' ' . $mass . '&ltbr&gt';
            }
            <?php
                unset($nameList);
                $nameList["Sidorov"] = "Dmitriy";
                $nameList["Petrov"] = "Ivan";
                $nameList["Ivanov"] = "Anatoliy";
//                echo "Первый элмемент ". $nameList["Sidorov"] ."<br />";
                echo "Первый элмемент $nameList[Sidorov] <br />";
                echo 'все элементы массива <br />';
                foreach ($nameList as $mass => $key){
                    echo $key . ' ' . $mass .'<br />';
                }
            ?>
        </pre>

        <h2>Конструкция list()</h2>
        <p><b>Коснтрукция list() присваевает переменным значение некоторого массива.</b></p>
        <pre>
            unset($nameList); // Удалим предыдущий  массив иначе он будет сохранен
            $nameList[] = "Dmitriy";
            $nameList[] = "Ivan";
            $nameList[] = "Anatoliy";
            list($name1, $name2, $name3) = $nameList;
            echo $name1 . ' ' . $name2 . ' ' . $name3;
            <?php
            unset($nameList);
            $nameList[] = "Dmitriy";
            $nameList[] = "Ivan";
            $nameList[] = "Anatoliy";
            list($name1, $name2, $name3) = $nameList;
            echo $name1 . ' ' . $name2 . ' ' . $name3;
            ?>
        </pre>
        <p> Можно пропустить какой либо элемент для этого нужно его пропустить, но поставить запятую.</p>
            unset($nameList); // Удалим предыдущий массив иначе он будет сохранен
            unset($name1);
            unset($name2);
            unset($name3);
            $nameList[] = "Dmitriy";
            $nameList[] = "Ivan";
            $nameList[] = "Anatoliy";
            list($name1,, $name3) = $nameList;
            echo $name1 . ' ' . $name2 . ' ' . $name3;
              <?php
              unset($nameList);
              unset($name1);
              unset($name2);
              unset($name3);
              $nameList[] = "Dmitriy";
              $nameList[] = "Ivan";
              $nameList[] = "Anatoliy";
              list($name1, ,$name3) = $nameList;
              echo $name1 . ' ' . $name2 . ' ' . $name3;
              ?>
        <h2>Многомерные массивы и array()</h2>
            <p><b>Создание многомерного массива.</b></p>
            <pre>
                $dossier["Anderson"] = ["name" => "Thomas", "born" => "1962-03-11"];
                $dossier["Anderson"] = ["name" => "Thomas", "born" => "1962-03-11"];


            <?php
                $dossier["Anderson"] = ["name" => "Thomas", "born" => "1962-03-11"];
                $dossier["Reeves"] = ["name" => "Anton", "born" => "1941-02-12"];
                print_r($dossier);
                foreach($dossier as $mass){
                    foreach ($mass as $key => $inform){
                        echo $key . ' = ' . $inform . '<br />';
                    }
                }

            ?>
            </pre>
            <p>Создание многомерного массива с помощью array(). <b style="font-size: 19px;">Лучше так не делать</b></p>
            <pre>
                   $dossier = array("Anderson" => array("name" => "Thomas", "born" => "1962-03-11"),
                                   "Reeves" => array("name" => "Anton", "born" => "1941-02-12")
                 );
                 <?php
                 $dossier = array("Anderson" => array("name" => "Thomas", "born" => "1962-03-11"),
                                  "Reeves" => array("name" => "Anton", "born" => "1941-02-12")
                 );
                 print_r($dossier);
                 foreach($dossier as $mass){
                     foreach ($mass as $key => $inform){
                         echo $key . ' = ' . $inform . '<br />';
                     }
                 }

                 ?>
            </pre>

        <h2>Массивы-константы</h2>
            <pre>
                define(
                        'DOSSIER',
                [
                    "Anderson" => ["name" => "Thomas", "born" => "1962-03-11"],
                    "Reeves" =>["name" => "Anton", "born" => "1941-02-12"],
                ]);
                echo DOSSIER["Anderson"]["name"];
                <?php
                    define(
                        'DOSSIER',
                        [
                            "Anderson" => ["name" => "Thomas", "born" => "1962-03-11"],
                            "Reeves" =>["name" => "Anton", "born" => "1941-02-12"],
                        ]);
                    echo DOSSIER["Anderson"]["name"];
                ?>
            </pre>
        <h2>Операции над массивами. Доступ по ключу.</h2>
            <p>Стандартный доступ к элементам</p>
            <pre>
                echo $name["Weaving"]; // ВЫводит элмемент массива с ключом Weaving
                echo $name["Anderson"]["name"];// выводит элмемет двумерного массива
            </pre>
            <p>Создание изменение элемента массива</p>
            <pre>
                $name["Davis"] = "Don"; //Присваеваем элементу массива строку Don
                $name[] = "Paul Doyle"; //добавляем новыей элемент
            </pre>
        <h2>Count()</h2>
            Возвращает колчиество элементов в массива
            count($dossier["Anderson"]);
            2
            count($dossier);
            <?= count($dossier["Anderson"]);?>

        <h2>Слияние массивов</h2>
            <p>
                Два массива объединяются при помощи оператора +. Ассоциативные массивы (ключ строковое значение)
                соединяются, если ключи одинаковые значение самого левого массива останется.
            </p>
            <pre>
                $good = ["Jukian" => "Arahang", "Doran"=>"Matt"];
                $bad = ["Doogr"=>"Paul", "Taylor"=>"Robert"];
                $ugly = ["Doogr"=>"asdf", "Luh"=>"Dmitriy"];
                $all = $good + $bad + $ugly;
                print_r($all);
                 <?php
                     $good = ["Jukian" => "Arahang", "Doran"=>"Matt"];
                     $bad = ["Doogr"=>"Paul", "Taylor"=>"Robert"];
                     $ugly = ["Doogr"=>"asdf", "Luh"=>"Dmitriy"];
                     $all = $good + $bad + $ugly;
                     print_r($all);
                 ?>
            </pre>
            <p>Слияние списков</p>
            <pre>
                $good = ["Arahang", "Matt"];
                $bad = ["Paul", "Robert"];
                $ugly = ["asdf", "Dmitriy"];
                $all = $good + $bad + $ugly;
                print_r($all);
                 <?php
                    $good = ["Arahang", "Matt"];
                    $bad = ["Paul", "Robert"];
                    $ugly = ["asdf", "Dmitriy"];
                    $all = $good + $bad + $ugly;
                    print_r($all);
                 ?>
            </pre>
            <p>
                Как видим выше, при слиянии списков остается элемент находящийся левее. Остальные не учитываются.
                Так как у них одинаковы ключи [0] и [1].
            </p>

        <h2>Обновление элементов</h2>
        <p>Для добавления элементов можно использоват функцию array_merge($array, $array2 ...);</p>
            <pre>
                $good = ["Arahang", "Matt"];
                $bad = ["Paul", "Robert"];
                $ugly = ["asdf", "Dmitriy"];
                $all = array_merge($good, $bad, $ugly);
                print_r($all);

                <?php
                    $good = ["Arahang", "Matt"];
                    $bad = ["Paul", "Robert"];
                    $ugly = ["asdf", "Dmitriy"];
                    $all = array_merge($good, $bad, $ugly);
                    print_r($all);
                ?>
            </pre>
        <p>Можно воспользоваться циклом foreach</p>
        <pre>
            unset($good, $bad, $ugly);
            $good = ["Arahang", "Matt"];
            $bad = ["Paul", "Robert"];
            $ugly = ["asdf", "Dmitriy"];
            foreach($good as $key => $value){
                $bad[$key] = $value;
                echo "$key => $value &ltbr /&gt";
            }
            print_r($bad);
            print_r($good);
            <?php
            unset($good, $bad, $ugly);
            $good = ["Arahang", "Matt"];
            $bad = ["Paul", "Robert"];
            $ugly = ["asdf", "Dmitriy"];
            echo '<br />';
            foreach($good as $key => $value){
                $bad[$key] = $value;
                echo "$key => $value <br />";
            }
            print_r($bad);
            print_r($good);
            ?>
        </pre>
        <p><b style="font-size: 19px;">Несколько слов насчет операции слияния массиваво Цепочка:</b></p>
        <pre>
            $z = $a + $b + $c + ...и т.д.;
                эквивалентная
            $z = $a; $z += $b; $z += $c; ...и т.д.
        </pre>

        <h2>Косвенный перебор элеменов массива.</h2>
        <p>Перебор списка</p>
        <p>Если массив список, то можно перебрать массив используя цикл for.</p>

        <pre>
            $mass = ["dima", "Ivan", "Anton", "Anatokiy"];
            for ($i = 0; $i < count($mass); $i++){
                echo $mass[$i] . '&ltbr /&gt';
            }
            <?php
            echo '<br />';
                $mass = ["dima", "Ivan", "Anton", "Anatok"];
                for ($i = 0; $i < count($mass); $i++){
                    echo $mass[$i] . '<br/>';
                }
            ?>
        </pre>
        <p>
            Где можно нужно стараться не заключать массивы в кавычки, если все же пришлось необходимо поместить их в
            фигурные скобки. <b>С многомерными массивами обязательно применение скобок.</b> Пример:
        </p>
        <pre>
            unset($mass);
            $mass = [
                ["name" => "Dmitriy", "born" => "1923-03-11"],
                ["name" => "Ivan", "born" => "1927-02-21"],
            ];
            for ($i = 0; $i < count($mass); $i++){
                echo "{$mass[$i]['name']} was born {$mass[$i]['born']}";
            }
            <?php
                unset($mass);
                echo '<br />';
                $mass = [
                    ["name" => "Dmitriy", "born" => "1923-03-11"],
                    ["name" => "Ivan", "born" => "1927-02-21"],
                ];
                for ($i = 0; $i < count($mass); $i++){
                    echo "{$mass[$i]["name"]} was born {$mass[$i]["born"]} <br />";
                }
            ?>
        </pre>
        <p>Перебор ассоциативного массива.</p>
        <p>
            Перебрать ассоциативный массив через цикл for, если ключи разные например ключ
            фамилия, а имя значение, перебрать посложнее чем через foreach, но все равно можно используя
            стандартные функции.
        </p>
        <pre>
            unset($mass);
            $mass = [
                "dmitriy" => "luz",
                "Ivan" => "Mazur",
                "Anatoliy" => "Isupov",
            ];

            for(reset($mass); ($k = key($mass)) ;next($mass)){
                echo "$mass $key &ltbr /&gt";
            }
            <?php
                unset($mass);
                echo '<br />';
                $mass = [
                    "dmitriy" => "luz",
                    "Ivan" => "Mazur",
                    "Anatoliy" => "Isupov",
                ];
                for(reset($mass); ($k = key($mass)); next($mass)){
                    echo "{$mass[$k]} $k <br />";
                }
            ?>
        </pre>
        <p>
            <ul>
                <li>Функция reset() возвращает значение первого элемента массива или false если массив пуст.</li>
                <li>Функция next() возвращает значение элемента, следующего за текущим или false если такого нет.</li>
                <li>Функция key() возвращает ключ, который имеет текущий элемент массива, если он указывает на конец массива, возвращ. пустая строка.</li>
            </ul>
        </p>
        <p>
            Перебор массива с конца.
        </p>
        <pre>
            unset($mass);
                echo '&ltbr /&gt';
                $mass = [
                    "dmitriy" => "luz",
                    "Ivan" => "Mazur",
                    "Anatoliy" => "Isupov",
                ];
            for (end($mass); ($k = $key($mass)); prev($mass)){
                echo "$k $mass[$k] &ltbr /&gt";
            }
            <?php
                unset($mass);
                echo '<br />';
                $mass = [
                    "dmitriy" => "luz",
                    "Ivan" => "Mazur",
                    "Anatoliy" => "Isupov",
                ];
                echo 'end = ' . end($mass) . '<br />';
                echo 'key = ' . key($mass) . '<br />';
                echo 'prev = ' . prev($mass) . '<br />';
                echo 'reset = ' . reset($mass) . '<br />';
                echo '<br />';
                echo '<br />';
                for (end($mass); ($k = key($mass)); prev($mass)){
                    echo "$k $mass[$k] <br />";
                }
            ?>
        </pre>
        <p>
            <ul>
                <li>Функция end устанавливает позицию текущего элемента в конец массива.</li>
                <li>Функция prev() передвигает ее на один элемент назад</li>
                <li>Функция current() возвращает величину текущего элемента(если он не укзазывает на конец массива.)</li>
            </ul>
        </p>
        <p>
            Если в массиве может быть нулевой ключ, то коссвенный перебор нужно дополнить.(Это один из его недостатков).
        </p>
        <p>Прямой перебор массива</p>
        <p>Старый способ перебора массива.</p>
        <pre>
            unset($mass);
            echo '&ltbr /&gt';
            $mass = [
                "dmitriy" => "luz",
                "Ivan" => "Mazur",
                "Anatoliy" => "Isupov",
            ];
            for (reset($mass); list($k,$v) = each($mass);){
                echo "$k $v &ltbr /&gt";
            }
            <?php
                unset($mass);
                echo '<br />';
                $mass = [
                    "dmitriy" => "luz",
                    "Ivan" => "Mazur",
                    "Anatoliy" => "Isupov",
                ];
                for (reset($mass); list($k,$v) = each($mass);){
                    echo "$k $v <br />";
                }
            ?>
        </pre>
        <p>
            Функция each() возвращает небольшой массив, нулевой элемент которого хранит величину ключа текущего элемента массива $mass,
            а первый элемента хранит - значение текущего элемента.
        </p>
        <p style="font-size: 19px"><b>Переор циклом foreach. Лучший способ.</b></p>
        <pre>
            foreach ($mass as $key => $value){
                echo "$value $key &ltbr /&gt>";
            }
            <?php
                echo '<br />';
                foreach ($mass as $key => $value){
                    echo "$value $key <br />";
                }
            ?>
        </pre>
        <p>Для изменения элементов массива необъодимо использовать жесткую ссылку & изменять можно только значение.</p>
        <pre>
            $number = [101, 102, 103];
            foreach ($number as &$value){
                $value++;
            }
            print_r($number);
            <?php
            echo '<br />';
            $number = [101, 102, 103];
            foreach ($number as &$value){
                $value++;
            }
            print_r($number);
            ?>
        </pre>
    <h2>Списки и строки</h2>
    <p>
        Есть две функции которые часто используются. <b style="font-size: 21px;"> <li>list explode(string $token, string $str [, int $limit])</li>
            <li>list implode(string $glue, list $list)</li> или <li>string join(string $glue, list $list).</li>
        </b>
    </p>
    <pre>
         $st = "123, dmitriy, luzhevskiy, 1998, Moscow";
            $st2 = [1, 3, 3, 5, 6, 7, 8];
            $person = explode(",", $st);
            list($id, $name, $surname, $year, $city) = $person;
            echo " $id $name $surname $year $city";
            echo '&gtbr /&lt';
            $string = implode("|", $st2);
            echo $string;
        <?php
            $st = "123, dmitriy, luzhevskiy, 1998, Moscow";
            $st2 = [1, 3, 3, 5, 6, 7, 8];
            $person = explode(",", $st);
            list($id, $name, $surname, $year, $city) = $person;
            echo " $id $name $surname $year $city";
            echo '<br />';
            $string = implode("|", $st2);
            echo $string;
        ?>
    </pre>
    <h2>Сериализация</h2>
    <p>Упаковка и распаковка</p>
    <pre>
        $mass = [
                "dmitriy" => "luz",
                "Ivan" => "Mazur",
                "Anatoliy" => "Isupov",
            ];
            $save = serialize($mass);
            echo $save;
            $unser = unserialize($save);
            print_r($unser);
        <?php
            $mass = [
                "dmitriy" => "luz",
                "Ivan" => "Mazur",
                "Anatoliy" => "Isupov",
            ];
            $save = serialize($mass);
            echo $save;
            $unser = unserialize($save);
            print_r($unser);
        ?>
    </pre>

</body>
</html>

