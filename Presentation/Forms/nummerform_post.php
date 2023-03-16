<?php
//Presentation/nummerform.php

?>

<!DOCTYPE html>
<html lang="nl">

<!-- HEADER START -->

<head>
    <script src="./Design/js/loginslider.js" defer></script>
    <meta charset="UTF-8">
    <title>Videotheek voor werknemers</title>
    <link rel="stylesheet" href="./Design/css/login.css">
</head>


<!-- HEADER END -->

<body>  <form class="bigform" method="POST">
        <input type="hidden" name="action" value="search" />
        <h5>Vul het nummer in </h5>
          <input type="number" name="nummer" value="nummer " required/>
            <br><br>
            <button type="submit" value="submit">submit</button>
        </form>
        <div class="break">  </div>