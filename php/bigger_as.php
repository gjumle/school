<?php

$numbers = isset($_POST["numbers"]) ? $_POST["numbers"] : "";
$higher_than = isset($_POST["higher_than"]) ? $_POST["higher_than"] : "";

function higher_than($numbers, $higher_than) {
    $numbers_arr = explode(",", $numbers);
    $higher_than_int = intval($higher_than);
    foreach ($numbers_arr as $item) {
        if ($item > $higher_than_int) {
            $numbers_arr[$item] = "*";
        }
    }
    return implode(", ", $numbers_arr);
}

echo higher_than($numbers, $higher_than);


?>

<html lang="en">
    <form action="" method="post">
        <textarea name="numbers"></textarea>
        <input name="higher_than">
        <input type="submit" name="submit">
    </form>
</html>

<script>
    function empty_check() {
        let numbers = document.getElementById("numbers").value;
        let higher_than = document.getElementById("higher_than").value;

        if (jmeno == false || text == false) {
            window.alert("Vyplente všechna pole!")
        }
    }
</script>
