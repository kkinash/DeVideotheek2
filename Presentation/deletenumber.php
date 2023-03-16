<?php
//Presentation/deletenumber.php

declare(strict_types=1);
include_once("Presentation/header.php");
include_once("Presentation/menu.php");
?>

<body>
    <!-- SHOWING DROPDOWN WITH FILMS -->
    <h1>Een Exemplar Verwijderen</h1>
            <div class="break"> </div>
            <div id="search">
                <div id="num">
                    <?php
                    include_once("Presentation/Forms/nummerform.php");
                    ?>
                </div>
             
                <div id="film">
                    <?php
                    include_once("Presentation/filmsoverview.php"); ?>
                </div>
            </div>
