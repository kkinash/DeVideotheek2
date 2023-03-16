<?php
//Presentation/searchonebynumber.php

?>

<body>
<h2> Films met deze nummer</h2>
        <div class="nav-table">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th style="display:none">Id</th>
                        <th>Titel</th>
                        <th>Nummer(s)</th>
                        <th>Exemplaren aanwezig</th>
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
                            <?php
              
                                $exemp = $exmpSvc->getExemplarByNummerOverview($ex);
                                $status = $exemp->getStatus();
                                if ($status === 2) {
                                    ?><strong><span style="color:#FF416C">
                                            <?php print($_GET['nummer'] . '&nbsp&nbsp'); ?>
                                    </strong></span>
                                    <?php

                                } else {
                                    print($_GET['nummer'] . '&nbsp&nbsp');
                                }
                            ; ?>

                        </td>
                        <td>
                            <?php print $exmpSvc->getRentedAmountOverview($film->getId()); ?>
                        </td>


                    </tr>
               
                </tbody>
            </table><div class="flex">
             <center> <form action="./deletenumber.php"><button class="button-white">Clear</button></form></center>
            <center> <form action="?">
                
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="nummer" value="<?php print($_GET['nummer']);?>" />
            <button class="button">Verwijder</button></form></center></div>



   