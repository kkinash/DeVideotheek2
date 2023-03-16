<?php
//Presentation/leanandbring.php

?>

    <h2> Films met deze nummer</h2>


    <div class="nav-table">
        <table class="styled-table">
            <thead>
                <tr>
                    <th style="display:none">Id</th>
                    <th>Titel</th>
                    <th>Nummer(s)</th>
                    <th>Status</th>
                    <th>Huuren / <br> Terugbrengen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="display:none">
                        <?php print($film->getId()); ?>
                    </td>
                    <td>
                        <?php print($film->getTitle()); ?>
                    </td>
                    <td>
                        <?php print $_SESSION['number']; ?>
                    </td>
                    <td>
                        <?php
                        if ($status === 2) {
                            ?><strong><span style="color:#FF416C">
                                    Verhuurd
                            </strong></span>
                            <?php

                        } else { ?>
                            <strong> Vrij </strong>
                            <?php
                        } ?>
                    </td>
                    <?php
                    if ($status === 2) { ?>

                        <td>
                            <form class="smallform" method="GET">
                            <input type="hidden" name="action" value="breng" />
                            <input type="hidden" name="nummer" value="<?php print $_SESSION['number'] ?>"/>
                            <button type="submit" class="button-white">Breng terug</button></form>
                        </td>
                    <?php } else { ?>
                        <td>
                            <form class="smallform" method="GET">
                            <input type="hidden" name="action" value="huur" />
                            <input type="hidden" name="nummer" value="<?php print $_SESSION['number'] ?>" />
                            <button type="submit" class="button-white">Huur</button></form>
                        </td>
                    <?php } ?>
                </tr>

            </tbody>
        </table>
        <br><br>
        <center>
            <form action="./searchbynumber.php"><button class="button-white">Clear</button></form>
        </center>
    </div>