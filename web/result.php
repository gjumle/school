<!DOCTYPE html>
<html lang="cs">
    <head>
        <!-- Title & icon-->
        <title>Fotografie</title>
        <link rel="icon" type="image/svg" href="./SVG/Icon.svg">
        <!-- Font links-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">
        <!-- NOTE: Add bootstrap to this project -->
        <!-- TODO: Place here the link for boot strap -->
        <!-- CSS Links-->
        <link rel="stylesheet" href="./CSS/main.css">
        <link rel="stylesheet" href="./CSS/form.css">
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
                    <li><a class="nav-link active" href="./index.html" target="_self">Domů</a></li>
                    <li><a class="nav-link" href="./photography.html" target="_self">Fotografie</a></li>
                    <li><a class="nav-link" href="./portfolio.html" target="_self">Portfolio</a></li>
                    <li><a class="nav-link" href="./colors.html" target="_self">Barvy</a></li>
                    <li><a class="nav-link" href="in_a_row.html" target="_self">Piškvorky</a></li>
                    <li><a class="nav-link" href="./snake.html" target="_self">Had</a></li>
                    <li><a class="nav-link" href="./form.html" target="_self">Formulář</a></li>
                    <li><a class="nav-link" href="./running.html" target="_self">Běhání</a></li>
                    <li><a class="nav-link" href="./about.html" target="_self">O mně</a></li>
                </ul>
            </nav>
        </header>
        <!-- Main section -->
        <main>
            <section class="presentation", id="sec_1">
                <div class="introduction">
                    <div class="intro-text">
                        <h1>Formulář</h1>
                        <p>Jednoduchý formulář pomocí PHP.</p>
                    </div>
                </div>
                <div class="cover">
                    <img src="./SVG/Php.svg" alt="Php">
                </div>
            </section>
            <section class="presentation" id="sec_2">
                <div class="introduction">
                    <div class="intro-text">
                        <?php
                        $score = 0;

                        if (htmlspecialchars($_SERVER["REQUEST_METHOD"] == "POST")) {
                            $A1 = $_REQUEST["Q1"];
                            if ($A1 == 1) {
                                $score = $score + 1;
                            }

                            $A2 = $_REQUEST["Q2"];
                            if ($A2 == 1) {
                                $score = $score + 1;
                            }

                            $A3 = $_REQUEST["Q3"];
                            if ($A3 == 1) {
                                $score = $score + 1;
                            }

                            $A4 = $_REQUEST["Q4"];
                            if ($A4 == 1) {
                                $score = $score + 1;
                            }

                            $A5 = $_REQUEST["Q5"];
                            if ($A5 == 1) {
                                $score = $score + 1;
                            }

                            $A6 = $_REQUEST["Q6"];
                            if ($A6 == 1) {
                                $score = $score + 1;
                            }

                            $A7 = $_REQUEST["Q7"];
                            if ($A7 == 1) {
                                $score = $score + 1;
                            }

                            $A8 = $_REQUEST["Q8"];
                            if ($A8 == 1) {
                                $score = $score + 1;
                            }
                        }
                        ?>
                        <h1>Vyhodnocení</h1>
                        <p>Počet získaných bodů: <?php echo " ", $score ?></p>
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

