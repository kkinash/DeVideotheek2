<?php
// login.php
declare(strict_types=1);

spl_autoload_register();
require_once("vendor/autoload.php");
use Business\UserService;
use Exceptions\InvalidPasswordException;
use Exceptions\UserNotFoundException;
require_once __DIR__ . "/presentation/header.php";

include_once("Presentation/header.php");
include_once("Presentation/menu.php");

$error = "";
?>

<body>
    <?php
if (isset($_GET["action"]) && ($_GET["action"]) === "process") {
    $username = $_POST["username"];
    $password = $_POST['password'];
    $userService = new UserService();
    try {
        $userAccount = $userService->loginUser($username, $password);
        $_SESSION["userAccount"] = serialize($userAccount);
        $_SESSION["user"] = $username;
        $_SESSION["userid"] = $userAccount->getId();
        header("location: filmsoverview.php");
		echo 'Hello, ' . $_SESSION["user"];
    } catch (UserNotFoundException $e) {
        $error = "Gebruiker kan niet gevonden worden in de database.";
        print('<div class="bad-error">' . $error . '</div>');
    } catch (InvalidPasswordException $e) {
        $error = "Het passwoord is niet correct.";
        print('<div class="bad-error">' . $error . '</div>');
    } catch (\Exception $e) {
        $error = "Onbekende fout: kan niet inloggen.";
        print('<div class="bad-error">' . $error . '</div>');
    }
}


include_once 'Presentation/login.php';
