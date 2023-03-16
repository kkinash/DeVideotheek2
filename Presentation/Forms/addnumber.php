<?php
//Presentation/addfilm.php

declare(strict_types=1);
include_once("Presentation/header.php");
include_once("Presentation/menu.php");
?>

<body>
    <!-- SHOWING DROPDOWN WITH FILMS -->
    <h1>Voeg een exemplaar toe<h1>
<div class="break"></div>
            <form class="bigform" method="get" action="?">
            <label for="films">Kies een film:</label>
                <select name="films" id="films">
                    <?php
                    foreach ($titleLijst as $title) {
                        ?>
                        <option value="<?php print($title->getId()) ?>"><?php print($title->getTitle()) ?></option>
                    <?php
                    }
                    ?>

                </select> <br>
                <label id="number">De nummer van de nieuwe exemplaar:&nbsp&nbsp </label><input name="nummer"
                    value="<?php print $nextnumber ?>" readonly="readonly" required /></input>
                <br><button type="submit" value="submit">Voeg toe</button>