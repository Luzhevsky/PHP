<?php
function calculate($int1, $int2, $char){
    switch($char){
        case "*": return $int1 * $int2;
        case "+": return $int1 + $int2;
        case "-": return $int1 - $int2;
        case "/": return $int1 / $int2;
        default: echo "Такого оператора не существует";
    }

}

function animal($animal){
    switch($animal){
        case "pig": echo "свинка"; break;
        case "dog": echo "собака"; break;
        case "cat": echo "кошка"; break;
        default: echo "Животное не найдено";
    }
}
function globalParameter(){
    foreach ($_SERVER as $k => $v) {
        echo "$k => <tt>$v</tt><br />";
    }

}