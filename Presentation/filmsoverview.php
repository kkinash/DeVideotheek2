<?php
//Presentation/filmoverview.php
include_once("Presentation/header.php");
include_once("Presentation/menu.php");
?>


         <div class="nav-table">
                <table class="styled-table">
                        <thead>
                                <tr>
                                        <th style="display:none">Id</th>
                                        <th>Title</th>
                                        <th>Nummers</th>
                                        <th>Rented</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                foreach ($titleLijst as $object) {
                                        $object->getTitle() ?>
                                        <tr>
                                                <td style="display:none">
                                                        <?php print($object->getId()); ?>
                                                </td>
                                                <td>
                                                        <?php print($object->getTitle()); ?>
                                                </td>
                                                <td>
                                                        <?php


                                                        $exmpLijst = $exmpSvc->getExemplarNumbersOverview($object->getId());
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

                                                        }; ?>

                                                </td>
                                                <td>
                                                        <?php print $exmpSvc->getRentedAmountOverview($object->getId()); ?>
                                                </td>

                                        <?php } ?>
                                </tr>
                        </tbody>
                                                </table></div>