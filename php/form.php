<?php

$text = isset($_POST["textove_pole"]) ? $_POST["textove_pole"] : "";
$posun = isset($_POST["posun"]) ? $_POST["posun"] : 0;
$abeceda = array("a", "b", "c", "d", "e", "f", "g", "h", "ch", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

$ret = "";
for ($i=0; $i < strlen($text); $i++) {
    $letter = $text[$i];
    $index = array_search($letter, $abeceda);
    $ret = $ret . ($abeceda[($index + $posun) %count($abeceda)]);
}

echo $ret;

/*
if (isset($_POST["textove_pole"]) && isset($_POST["posun"])) {
    echo $_POST["textove_pole"];
    echo $_POST["posun"];
}
*/

?>

<html>
<form method="post">
    <label for="in_text">Text</label>
    <br>
    <textarea name="textove_pole" id="in_text"><?php echo $text; ?></textarea>
    <br>

    <label for="in_number">Posun</label>
    <br>
    <input type="text" name="posun" id="in_number" value="<?php echo $posun; ?>">
    <br>

    <button type="submit" onclick="vyplneno()">Send</button>
</form>
</html>

<script>
    function vyplneno() {
        let in_text = document.getElementById("in_text").value;
        let in_number = document.getElementById("in_number").value;

        if (in_number == false || in_text == false) {
            window.alert("Vyplnte vsechna pole!");
        }
    }
</script>
