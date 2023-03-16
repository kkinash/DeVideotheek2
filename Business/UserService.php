<?php //UserService.php
declare(strict_types=1);
namespace Business;

use Data\UserDAO;
use Entities\User;
use Exceptions\WachtwoordenKomenNietOvereenException;

class UserService
{
    private UserDAO $userDAO;
    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    /**
     * Retrieve user from DB with credentials
     */
    public function loginUser($username, $password): ?User
    {
        return $this->userDAO->loginUser($username, $password);
    }

    public function registerUser($fname, $lname, $email, $password) : int
    {
        return $this->userDAO->registerUser($fname, $lname, $email, $password);
    }

    public function checkPassword($password, $rpassword) : void
    {
       if ($password !== $rpassword) {throw new WachtwoordenKomenNietOvereenException();
    }

}

}
