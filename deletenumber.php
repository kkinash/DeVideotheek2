<?php
//addnumber.php
spl_autoload_register();
require_once("vendor/autoload.php");
include_once("Presentation/header.php");

use Business\FilmService;
use Business\ExemplarService;
use Exceptions\NoExemplarWithThisNumberException;


$filmSvc = new FilmService();
$titleLijst = $filmSvc->getTitlesOverview();
$exmpSvc = new ExemplarService();
$nextnumber = $exmpSvc->getNextFreeNumberOverview();
$savenextNumber = $nextnumber;
$error = "";

include_once("Presentation/deletenumber.php");
if (isset($_GET['action']) && $_GET['action'] === 'search') {
    try { 
        $xmplr = $exmpSvc->getExemplarByNummerOverview($_GET['nummer']);
        $filmID = $xmplr->getFilmid(); 
        $film = $filmSvc->getFilmbyIdOverview($filmID); 
     
        $exmpLijst = $exmpSvc->getExemplarNumbersOverview($film->getId());
       
    } catch (NoExemplarWithThisNumberException $e) {
              $error = 'No Exemplar With This Number';
         }
         include_once("Presentation/searchonebynumber.php");     
    }




if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $exmpSvc->deleteExemplarOverview($_GET['nummer']);
    $error = 'oops';
    $error = 'Het Exemplaar is succesvol verwijderd';
   
}
?> <div id="break"></div><h3> <?php print($error); ?> </h3>
