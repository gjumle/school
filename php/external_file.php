<?php
    $jmeno = isset($_POST["jmeno"]) ? $_POST["jmeno"] : "";
    $text = isset($_POST["text"]) ? $_POST["text"] : "";
    $time = date("h:i:sa");

    function save_data($jmeno, $text) {
        global $jmeno, $text, $time;
        $data = fopen("data.txt", "w");
        fputs($data, $jmeno . "#" . $text . "#" . $time . "#");
        fclose($data);
    }
    save_data($jmeno, $text);
?>

<html lang="en">

<form action="" method="post">
    <input type="text" name="jmeno" id="jmeno" placeholder="jmeno"><br>
    <textarea name="text" id="text" placeholder="vzkaz"></textarea><br>
    <input type="submit" name="enter" onclick="empty_check()">
</form>

</html>

<script>
    function empty_check() {
        let jmeno = document.getElementById("jmeno").value;
        let text = document.getElementById("text").value;

        if (jmeno == false || text == false) {
            window.alert("Vyplente všechna pole!")
        }
    }
</script>
