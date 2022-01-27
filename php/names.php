<?php
$names = array("Terka", "Petr", "Lukas", "Daniel", "Simon", "Petr", "Karel");

function name_count($name) {
    global $names;
    $i = 0;
    $ret = 0;
    $arr_len = count($names)-1;
    while ($i <= $arr_len) {
        if ($names[$i] == $name) {
            $ret += 1;
        }
        $i += 1;
    }
    return "Pocet jmen " . $name . " je v seznamu " . $ret . " krat.";
}

echo name_count("Karel");