<?php

if (isset($_POST["textove_pole"]) && isset($_POST["posun"])) {
    echo $_POST["textove_pole"];
    echo $_POST["posun"];
}

?>

<html>
    <form>
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
        else {
            window.alert("Odeslano!");
        }
    }
</script>
