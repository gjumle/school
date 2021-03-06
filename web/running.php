<?php
    include_once './maridb-connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title & icon-->
        <title>Fotografie</title>
        <link rel="icon" type="image/svg" href="SVG/Icon.svg">
        <!-- Font links-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">
        <!-- NOTE: Add boot strap to this project -->
        <!-- TODO: Place here the link for boot strap -->
        <!-- CSS Links-->
        <link rel="stylesheet" href="CSS/main.css">
        <!-- Meta tags -->
        <meta lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta name="viewport" content="width=device-width" />
    </head>
    <body id="skin">
        <!-- Navigation menu-->
        <header>
            <nav>
                <ul class="nav-links">
                    <li><a class="nav-link logo" href="./index.html" target="_self"><img src="./SVG/Logo.svg" alt="Logo" height="45"></a></li>
                    <!--<li><a class="nav-link active" href="./index.html" target="_self">Domů</a></li>-->
                    <li><a class="nav-link" href="./photography.html" target="_self">Fotografie</a></li>
                    <li><a class="nav-link" href="./portfolio.html" target="_self">Portfolio</a></li>
                    <li><a class="nav-link" href="./colors.html" target="_self">Barvy</a></li>
                    <li><a class="nav-link" href="in_a_row.html" target="_self">Piškvorky</a></li>
                    <li><a class="nav-link" href="./snake.html" target="_self">Had</a></li>
                    <li><a class="nav-link" href="./form.html" target="_self">Formulář</a></li>
                    <li><a class="nav-link" href="running.php" target="_self">Běhání</a></li>
                    <li><a class="nav-link" href="./about.html" target="_self">O mně</a></li>
                </ul>
            </nav>
        </header>
        <!-- Main section -->
        <main>
            <section class="presentation" id="sec_1">
                <div class="introduction">
                    <div class="intro-text">
                        <h1>Záznamy</h1>
                        <p>Senzam nejnovějších záznamů.</p>
                    </div>
                </div>
                <div class="cover">
                    <img alt="gps-arrow" src="SVG/OpenTracs.svg">
                </div>
            </section>
            <section class="presentation" id="sec_2">
                <div class="introduction">
                  <div class="intro-text">
                      <h2>Tabulka</h2>
                      <?php

                        $sql = "SELECT * FROM web_ready;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['distance'];
                                echo $row['date'];
                            }
                        }

                      ?>
                  </div>
                </div>
            </section>
        </main>

        <footer>
            <ul class="copryright">
                <li class="copyright-link">Fotografie ©2020</li>
                <li class="copyright-link">Všechna práva vyhrazena</li>
                <li class="copyright-link"><a class="copyright-link" href="./about.html" target="_blank">Kontakt</a></li>
            </ul>
        </footer>
    </body>
</html>
