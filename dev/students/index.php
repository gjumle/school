<?php

$text_in = isset($_POST["text_in"]);
$class = isset($_POST["class"]);


?>

<html lang="en">
<head>
    <script src="master.js"></script>
</head>
<body>
<form action="" method="post">
    <div style="margin: auto; width: 50%">
        <label for="tex_in">Student:</label>
        <input type="text" name="text_in" id="tex_in" placeholder="student name">

        <select name="class" id="class">
            <option value="">--- class ---</option>
            <option value="1.B">1.B</option>
            <option value="2.B">2.B</option>
            <option value="3.B">3.B</option>
            <option value="4.B">4.B</option>
        </select>
    </div>

</form>
</body>
</html>
