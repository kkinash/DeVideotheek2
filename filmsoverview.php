<?php
//filmsoverview.php
spl_autoload_register();
require_once("vendor/autoload.php");
include_once("Presentation/header.php");

use Business\FilmService;
use Business\ExemplarService;

$filmSvc = new FilmService();
$titleLijst = $filmSvc->getTitlesOverview();

$exmpSvc = new ExemplarService();



?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <script src="./Design/js/loginslider.js" defer></script>
    <meta charset="UTF-8">
    <title>Videotheek voor werknemers</title>
    <link rel="stylesheet" href="./Design/css/login.css">
</head>
<body><br>
<div class="break"> <h1>FILMS OVERVIEW </h1>
       </div>
<?php 

include("presentation/filmsoverview.php");
?>
