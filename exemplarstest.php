<?php
//exemplarstest.php
spl_autoload_register();
require_once("vendor/autoload.php");
include_once("Presentation/header.php");


use Business\ExemplarService;


$exmpSvc = new ExemplarService();

// $exmpLijst = $exmpSvc->getExemplarOverview('5');
// echo '<pre>';
// var_dump($exmpLijst);
// echo '</pre>';

print $exmpSvc->getNextFreeNumberOverview();