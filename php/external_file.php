<?php
    $ext = fopen("data.txt", "w");
    fputs($ext, "Sample text");
    fclose($ext);
    $obsah = file_get_contents("test.txt")
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
