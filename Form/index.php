<html lang="cs">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>

<script src="ow_resutl.js"></script>

<?php
$Q1A1 = $Q1A2 = $Q1A3 = "";
$Q2A1 = $Q2A2 = $Q2A3 = "";
$Q3A1 = $Q3A2 = $Q3A3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Q1A1 = test_input($_POST["Q1A1"]);
    $Q1A2 = test_input($_POST["Q1A2"]);
    $Q1A3 = test_input($_POST["Q1A3"]);

    $Q2A1 = test_input($_POST["Q2A1"]);
    $Q2A2 = test_input($_POST["Q2A2"]);
    $Q2A3 = test_input($_POST["Q2A3"]);

    $Q3A1 = test_input($_POST["Q1A1"]);
    $Q3A2 = test_input($_POST["Q1A2"]);
    $Q3A3 = test_input($_POST["Q1A3"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h1>Formulář</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- Q1 -->
    <label>Q1:</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q1A1" value="A1">
        <label class="form-check-label" for="Q1A1">A1</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q1A2" value="A2">
        <label class="form-check-label" for="Q1A2">A2</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q1A3" value="A3">
        <label class="form-check-label" for="Q1A3">A3</label>
    </div>
    <!-- Q2 -->
    <label>Q2:</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q2A1" value="A1">
        <label class="form-check-label" for="Q2A1">A1</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q2A2" value="A2">
        <label class="form-check-label" for="Q2A2">A2</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q2A3" value="A3">
        <label class="form-check-label" for="Q2A3">A3</label>
    </div>
    <!-- Q3 -->
    <label>Q3:</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q3A1" value="A1">
        <label class="form-check-label" for="Q3A1">A1</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q3A2" value="A2">
        <label class="form-check-label" for="Q3A2">A2</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="Q3A3" value="A3">
        <label class="form-check-label" for="Q3A3">A3</label>
    </div>
    <input type="submit" id="submin"  value="Odeslat" onclick="Submit()">

    <div class="form-check form-check-inline">
        <?php
            echo $Q1A1;
            echo "<br>";
            echo $Q1A2;
            echo "<br>";
            echo $Q1A3;
            echo "<br>";
        ?>
    </div>
</form>
</body>
</html>