<?php
//index.php

spl_autoload_register();
require_once("vendor/autoload.php");

use Business\UserService;
use Exceptions\WachtwoordenKomenNietOvereenException;
use Exceptions\GebruikerBestaatAlException;
use Exceptions\EmailExistsException;


$error = "";

include_once("Presentation/header.php");
include_once("Presentation/menu.php");
?>


<body>

    <?php if (!isset($_SESSION['userAccount'])) {
        ?>
        <h2>Log in of registreer om verder te gaan</h2>

<!-- *** START REGISTER PART  *** -->
        <?php if (isset($_GET['action']) && $_GET['action'] === 'signup') {
            $userService = new UserService();
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $password1 = $_POST['password'];
            $password2 = $_POST['rpassword'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            try {
                $userService->checkPassword($password1, $password2);
                $userService->registerUser($fname, $lname, $email, $password);

                $error = "You have successfully signed up. Now you can <a class='login' href='./login.php'> Log In</a>";
                print('<div class="error">' . $error . '</div>');
            } catch (WachtwoordenKomenNietOvereenException $e) {
                $error = "Pasword and password repeat doesnt match!";
                print('<div class="bad-error">' . $error . '</div>');
                include_once("Presentation/login.php");
            } catch (GebruikerBestaatAlException $e) {
                $error = "This user is allready exists!";
                print('<div class="bad-error">' . $error . '</div>');
                include_once("Presentation/login.php");
            } catch (EmailExistsException $e) {
                $error = "This email is allready taken!";
                print('<div class="bad-error">' . $error . '</div>');
                include_once("Presentation/login.php");
            }
        } else {
            include_once("Presentation/login.php");
        } ?>
<!-- *** END REGISTER PART  *** -->
    <?php } else { 
        include_once("Presentation/startpage.php");
    } ?>
















</body>

</html>