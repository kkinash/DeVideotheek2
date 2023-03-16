<?php
//leanandbring.php

spl_autoload_register();
require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplarService;
use Exceptions\NoExemplarWithThisNumberException;

include_once("Presentation/header.php");
include_once("Presentation/menu.php");

$filmSvc = new FilmService();
$titleLijst = $filmSvc->getTitlesOverview();

$exmpSvc = new ExemplarService();


include_once("Presentation/Forms/nummerform_post.php");
$error = "";
$succes = "";


if (isset($_POST['nummer']) || isset($_GET['action']) || isset($_SESSION['number'])) {
    if (isset($_POST['nummer'])) {
        $_SESSION['number'] = $_POST['nummer'];
    }
    try { 
        $exemp = $exmpSvc->getExemplarByNummerOverview($_SESSION['number']);
        $status = $exemp->getStatus();

    

    
        $filmID = $exemp->getFilmid(); // If $_GET['nummer'] doesnt exist in DB - $xmplr = ERROR
        $film = $filmSvc->getFilmbyIdOverview($filmID); // If $_GET['nummer'] doesnt exist in DB - $xmplr = ERROR

    } catch (NoExemplarWithThisNumberException $e) {
        $error = 'NoExemplarWithThisNumber';
    }
}
if ($error !== "") {
    ?> <div class="error"> <?php print $error; ?> </div> <?php
} else {
    include_once("Presentation/leanandbring.php");
    

    if (isset($_GET['action']) && $_GET['action'] === 'breng') {
        try {
            $exmpSvc->setStatusFreeOverview($_GET['nummer']);
            $succes = "The status has been successfully changed";
            header("Refresh:0; url=./leanandbring.php");
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }


    if (isset($_GET['action']) && $_GET['action'] === 'huur') {
        try {
            $exmpSvc->setStatusRentedOverview($_GET['nummer']);
            $succes = "The status has been successfully changed";
            header("Refresh:0; url=./leanandbring.php");
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }


}

?>