<?php
//Presentation/deletenumber.php

declare(strict_types=1);

?>


    <!-- SHOWING DROPDOWN WITH FILMS -->
    
            <form class="bigform" method="get" action="./deletefilm.php?">
            <h5>Kies een film:</h5>
                <select name="film" id="film">
                    <?php
                    foreach ($titleLijst as $title) {
                        ?>
                    <option value="<?php print($title->getId()) ?>"><?php print($title->getTitle()) ?>
                    </option>
                    <?php
                    }
                    ?>

                </select>
                <input type="hidden" name="action" value="delete" /><br>
                <br><button type="submit" value="submit">Verwijder</button>