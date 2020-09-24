<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
    <?php require_once '../option/nav.php'; ?>
    <?php require_once '../include/functions.php'; ?>
    <h1>Глава 10. Массивы.</h1>
    <h2>Задания</h2>
    <ol>
        <li class="li_task">Пусть имеется массив ['fst', 'snd', 'thd', 'fth']. Выведите случайный элемент массива.</li>
        <li class="li_task">Пусть имеется массив ['fst' => 1, 'snd' => 2, 'thd'
            => 2, 'fth' => 4]. Получите на основании его новый массив с ключами его элементов ['fst', 'snd', 'thd', 'fth'].</li>
        <li class="li_task">Пусть имеется массив ['fst', 'snd', 'thd', 'fth', 'snd', 'thd'].
            Получите на основании его новый массив, содержащий только уникальные элементы ['fst', 'snd', 'thd', 'fth'].</li>
        <li class="li_task">Решите задачу обмена значений двух целочисленных переменных,
            не прибегая к конструкции list() и использованию третьей промежуточной переменной.</li>
        <li class="li_task">Создайте массив со случайным количеством элементов от 5 до 10,
            элементы которого принимают значени от 0 до 100. Отсортируйте элементы в порядке от наименьшего к наибольшему.</li>
        <li class="li_task">Создайте текстовый файл с названием месяцев. В документации php
            найдите функцию file(). Создайте массив с названием месяцев из содержимого текстового файла.</li>
    </ol>
    <h2>Решения</h2>
    <h3>1. Пусть имеется массив ['fst', 'snd', 'thd', 'fth']. Выведите случайный элемент массива.</h3>
    <pre>
        $mass = ['fst', 'snd', 'thd', 'fth'];
        echo $mass[rand(0,1)];
        <?php
            $mass = ['fst', 'snd', 'thd', 'fth'];
            echo $mass[rand(0,1)];
            unset($mass);
        ?>
    </pre>
    <h3>2. Пусть имеется массив ['fst' => 1, 'snd' => 2, 'thd' => 2, 'fth' => 4].
        Получите на основании его новый массив с ключами его элементов ['fst', 'snd', 'thd', 'fth'].</h3>
    <pre>
        $mass = ['fst' => 1, 'snd' => 2, 'thd' => 2, 'fth' => 4];
        $mass2 = [];
        foreach($mass as $key => $value){
            $mass2[] = $key;
        }
        print_r($mass2);
        <?php
            $mass = ['fst' => 1, 'snd' => 2, 'thd' => 2, 'fth' => 4];
            $mass2 = [];
            foreach($mass as $key => $value){
                $mass2[] = $key;
            }
            print_r($mass2);
            unset($mass, $mass2);
        ?>
    </pre>
    <h3>3. Пусть имеется массив ['fst', 'snd', 'thd', 'fth', 'snd', 'thd'].
        Получите на основании его новый массив, содержащий только уникальные элементы ['fst', 'snd', 'thd', 'fth'].</h3>
        <pre>
            unset($mass);
            $mass = ['fst', 'snd', 'thd', 'fth', 'snd','snd','snd','snd','snd','snd', 'thd', 'thd', 'thd', 'thd', 'thd', 'thd'];
            $count = 0;
            for ($i = 0; $i < count($mass); $i++){
               $count = 0;
               for($j = $i + 1; $j < count($mass); $j++){
                   if($mass[$i] == $mass[$j]){
                      $count++;
                   }
               }
               if($count < 1)
               $mass2[] = $mass[$i];
            }
            print_r($mass2);
        <?php
        unset($mass);
            $mass = ['fst', 'snd', 'thd', 'fth', 'snd','snd','snd','snd','snd','snd', 'thd', 'thd', 'thd', 'thd', 'thd', 'thd'];
            $count = 0;
            for ($i = 0; $i < count($mass); $i++){
               $count = 0;
               for($j = $i + 1; $j < count($mass); $j++){
                   if($mass[$i] == $mass[$j]){
                      $count++;
                   }
               }
               if($count < 1)
               $mass2[] = $mass[$i];
            }
            print_r($mass2);
        ?>
        </pre>

    <h3>4. Решите задачу обмена значений двух целочисленных переменных, не
        прибегая к конструкции list() и использованию третьей промежуточной переменной.</h3>
    <pre>
        $a = 1;
        $b = 2;
        echo "a=$a b=$b &ltbr /&gt";

        $a = $a + $b;
        $b = $a - $b;
        $a = $a - $b;

        echo "a=$a b=$b &ltbr /&gt";
    </pre>
        <?php
            $a = 1;
            $b = 2;
            echo "a=$a b=$b <br />";
            $a = $a + $b;
            $b = $a - $b;
            $a = $a - $b;

            echo "a=$a b=$b <br />";
        ?>

    <h3>5.Создайте массив со случайным количеством элементов от 5 до 10, элементы
        которого принимают значени от 0 до 100. Отсортируйте элементы в порядке от наименьшего к наибольшему.</h3>

    <pre>
        unset($mass);
        for($i = 5; $i < 10; $i++){
            $mass[] = rand(5, 10);
        }
        print_r($mass);
        for($i = 0; $i < count($mass); $i++){
            for($j = 0; $j < count($mass); $j++){
                if($mass[$i] < $mass[$j]){
                    $dop = $mass[$j];
                    $mass[$j] = $mass[$i];
                    $mass[$i] = $dop;
                }
            }
        }
        echo '&ltbr /&gt';
        print_r($mass);
    </pre>
    <?php
        unset($mass);
        for($i = 5; $i < 10; $i++){
            $mass[] = rand(5, 10);
        }
        print_r($mass);
        for($i = 0; $i < count($mass); $i++){
            for($j = 0; $j < count($mass); $j++){
                if($mass[$i] < $mass[$j]){
                    $dop = $mass[$j];
                    $mass[$j] = $mass[$i];
                    $mass[$i] = $dop;
                }
            }
        }
        echo '<br />';
        print_r($mass);
    ?>
</body>
</html>
