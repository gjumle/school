<?php

include "functions.php";

$conn = db_conn("city", "localhost");

$name = isset($_POST["name"]);
$city = isset($_POST["city"]);
$sql = "INSERT INTO persons (name, city) VALUES (" . "$name" . "," . "$city" . ") LIMIT 1";

if ($conn->query($sql) === TRUE) {
    echo "Data save successful.";
} else {
    echo "Data save error: " . $conn->errno();
}


?>

<html lang="en">
<head>
    <title>index</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js">
        $(document).ready(function ()) {
            $("#btn_save").on("click", function ()) {
                var name = $("#name").val();
                var city = $("#city").val();
                if(name!="" && city!="") {
                    $("#btn_save").attrChange("disabled", "disabled");

                }
            }
        }
    </script>
</head>
<head>
    <div style="margin: auto; width: 50%">
        <div id="success" style="display: none"></div>
        <form method="post" id="form1" name="form1">
            <input type="text" name="name" id="name" placeholder="your name">
            <select name="city" id="city">
                <option value="">--- city ---</option>
                <option value="Praha">Praha</option>
                <option value="Brno">Brno</option>
                <option value="Bratislava">Bratislava</option>
                <option value="Berlin">Berlin</option>
            </select>
            <input type="button" value="Save to DB" id="btn_save" name="btn_save">
        </form>
    </div>
</head>
</html>
