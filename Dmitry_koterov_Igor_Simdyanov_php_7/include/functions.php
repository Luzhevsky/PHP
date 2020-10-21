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

function dumper($obj){
    echo "<pre>", htmlspecialchars(dumperGet($obj)), "</pre>";
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