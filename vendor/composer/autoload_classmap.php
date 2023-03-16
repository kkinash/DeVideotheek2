<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'Business\\ExemplarService' => $baseDir . '/Business/ExemplarServise.php',
    'Business\\FilmService' => $baseDir . '/Business/FilmService.php',
    'Business\\UserService' => $baseDir . '/Business/UserService.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Data\\DBConfig' => $baseDir . '/Data/DBConfig.php',
    'Data\\ExemplarDAO' => $baseDir . '/Data/ExemplarDAO.php',
    'Data\\FilmDAO' => $baseDir . '/Data/FilmDAO.php',
    'Data\\UserDAO' => $baseDir . '/Data/UserDAO.php',
    'Entities\\Exemplar' => $baseDir . '/Entities/Exemplar.php',
    'Entities\\Film' => $baseDir . '/Entities/Film.php',
    'Entities\\User' => $baseDir . '/Entities/User.php',
    'Exceptions\\EmailExistsException' => $baseDir . '/Exceptions/EmailExistsException.php',
    'Exceptions\\FilmNotFoundException' => $baseDir . '/Exceptions/FilmNotFoundException.php',
    'Exceptions\\GebruikerBestaatAlException' => $baseDir . '/Exceptions/GebruikerBestaatAlException.php',
    'Exceptions\\InvalidPasswordException' => $baseDir . '/Exceptions/InvalidPasswordException.php',
    'Exceptions\\NoExemplarWithThisNumber' => $baseDir . '/Exceptions/NoExemplarWithThisNumber.php',
    'Exceptions\\TitleExistsException' => $baseDir . '/Exceptions/TitleExistsException.php',
    'Exceptions\\UserNotFoundException' => $baseDir . '/Exceptions/UserNotFoundException.php',
    'Exceptions\\WachtwoordenKomenNietOvereenException' => $baseDir . '/Exceptions/WachtwoordenKomenNietOvereenException.php',
);