<?php

$text = isset($_POST["textove_pole"]) ? $_POST["textove_pole"] : "";
$posun = isset($_POST["posun"]) ? $_POST["posun"] : 0;
$abeceda = array("a", "b", "c", "d", "e", "f", "g", "h", "ch", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");


for ($i=0; strlen($text); $i++) {
    $letter = $text[$i];
    $ret = $ret . ($abeceda[array_search($letter, $abeceda) + $posun] %count($abeceda));
}

/*
if (isset($_POST["textove_pole"]) && isset($_POST["posun"])) {
    echo $_POST["textove_pole"];
    echo $_POST["posun"];
}
*/

echo $text;
echo $posun;

?>

<html>
<form method="post">
    <textarea name="textove_pole" id="in_text"><?php echo $text?></textarea>
    <input type="number" name="posun" id="in_number" value="<?php echo $posun?>">

    <button type="submit" onclick="vyplneno()">Send</button>
</form>
</html>

<script>
    function vyplneno() {
        var in_text = document.getElementById("in_text").value;
        var in_number = document.getElementById("in_number").value;

        if (in_number == false || in_text == false) {
            window.alert("Vyplnte vsechna pole!");
        }
    }
</script>
