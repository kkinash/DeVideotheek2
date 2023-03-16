<?php
//addfilm.php

spl_autoload_register();
require_once("vendor/autoload.php");
include_once("Presentation/header.php");

use Business\FilmService;
use Business\ExemplarService;
use Exceptions\TitleExistsException;

$filmSvc = new FilmService();
$titleLijst = $filmSvc->getTitlesOverview();
$exmpSvc = new ExemplarService();
$error = "";

include_once("Presentation/addfilm.php");
if (isset($_GET['action']) && $_GET['action'] === 'addtitle') {

    try {
        $filmSvc->adNewFilm($_GET['title']);
        $error = "Film added succesfully";
        
    } catch (TitleExistsException $e) {
        $error = "De Film bestaat al";
    }

    ?><div class="error"><?php print  $error; ?> </div>
<?php
}