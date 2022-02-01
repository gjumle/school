<?php

$text = isset($_POST["textove_pole"]) ? $_POST["textove_pole"] : "";
$posun = isset($_POST["posun"]) ? $_POST["posun"] : 0;


if (isset($_POST["textove_pole"]) && isset($_POST["posun"])) {
    echo $_POST["textove_pole"];
    echo $_POST["posun"];
}

?>

<html>
    <form method="post">
        <textarea id="in_text"></textarea>
        <input type="number" id="in_number">

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
