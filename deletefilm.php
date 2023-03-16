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

include_once("Presentation/header.php");
include_once("Presentation/menu.php");
?>

<h1>Een Film Verwijderen</h1>
<div class="break"></div>
<?php 
include_once("Presentation/Forms/deletefilm.php");
if (isset($_GET['action']) && $_GET['action'] === 'delete') {

    $filmSvc->deleteFilmOverview($_GET['film']);
    $exmpSvc->deleteExemplarByFilmIdOverview($_GET['film']);
    $error = 'De Film is succesvol verwijderd';
    header("Refresh:0; url=./filmsoverview.php");

} 
print($error);