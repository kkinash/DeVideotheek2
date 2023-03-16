<?php
//addnumber.php
spl_autoload_register();
require_once("vendor/autoload.php");
include_once("Presentation/header.php");

use Business\FilmService;
use Business\ExemplarService;


$filmSvc = new FilmService();
$titleLijst = $filmSvc->getTitlesOverview();
$exmpSvc = new ExemplarService();
$nextnumber = $exmpSvc->getNextFreeNumberOverview();
$savenextNumber = $nextnumber;
$error = "";

include_once("Presentation/Forms/addnumber.php");

if (isset($_GET['films']) && isset($_GET['nummer'])) {

    try {
        $exmpSvc->addnewExemplarOverview($_GET['films'], $nextnumber);
        $error = "Exemplar added succesfully. <a href='./searchbynumber.php?action=search&nummer=" . $savenextNumber . "'>  Check </a>";
        
    } catch (Exception $e) {
        $error = "Exemplaar bestaat al";
    }

  

}
?>
<div class="error"><?php print  $error; ?> </div>