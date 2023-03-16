<?php
//searchbynumber.php
spl_autoload_register();
require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplarService;
use Exceptions\NoExemplarWithThisNumberException;

include_once("Presentation/header.php");
include_once("Presentation/menu.php");

$filmSvc = new FilmService();
$titleLijst = $filmSvc->getTitlesOverview();
$error = "";
$exmpSvc = new ExemplarService();

//include_once("Presentation/nummerform.php");



include_once("Presentation/Forms/nummerform.php");
$error = "";

if (isset($_GET['action']) && $_GET['action'] === 'search') {
    
    try { 
    $xmplr = $exmpSvc->getExemplarByNummerOverview($_GET['nummer']);
    $filmID = $xmplr->getFilmid(); 
    $film = $filmSvc->getFilmbyIdOverview($filmID); 
    $exmpLijst = $exmpSvc->getExemplarNumbersOverview($film->getId());
   
} catch (NoExemplarWithThisNumberException $e) {
         $error = 'No Exemplar With This Number';
     }
}
if ($error !== "") {
    ?> <div class="error"> <?php print $error; ?> </div> <?php
} else {

include_once("Presentation/searchbynumber.php");
}