<?php
//Presentation/searchbynumber.php

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


                            
                            foreach ($exmpLijst as $ex) {
                                ?>
                                <?php
                                // try {}
                                $exemp = $exmpSvc->getExemplarByNummerOverview($ex);
                                $status = $exemp->getStatus();

                                if ($status === 2) {
                                    ?><strong><span style="color:#FF416C">
                                            <?php
                                            print($ex . '&nbsp&nbsp'); ?>
                                    </strong></span>
                                    <?php

                                } else {
                                    print($ex . '&nbsp&nbsp');
                                }

                            }
                            ; ?>

                        </td>
                        <td>
                            <?php print $exmpSvc->getRentedAmountOverview($film->getId()); ?>
                        </td>


                    </tr>
               
                </tbody>
            </table>
            <br><br> <center> <form action="./searchbynumber.php"><button class="button-white">Clear</button></form></center>
        </div>



   