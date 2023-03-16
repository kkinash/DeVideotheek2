<?php

declare(strict_types=1);

namespace Data;

use Data\DBConfig;
use Entities\User;
use Exceptions\InvalidPasswordException;
use Exceptions\UserNotFoundException;
use Exceptions\EmailExistsException;
use \PDO;

class UserDAO
{

    public function loginUser(string $username, string $password): ?User
    {  
        try {
			$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :username");

            $stmt->bindValue(":username", $username);
            $stmt->execute();
            $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);

			if (!$resultSet) {
                throw new UserNotFoundException();
            }

            $isWachtwoordCorrect = password_verify($password, $resultSet["wachtwoord"]);

            if (!$isWachtwoordCorrect) {
                throw new InvalidPasswordException();
            }

            $user = new User(
                (int)$resultSet["userid"],
                $resultSet["FirstName"],
				$resultSet["email"],
                $resultSet["wachtwoord"]
            );
            $dbh = null;
            
            return $user;
           
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }


    public function emailReedsInGebruik($email): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }


public function registerUser(string $fname, string $lname, string $email, string $password): int	
    {
        $rowCount = $this->emailReedsInGebruik($email);
        if ($rowCount > 0) {
           throw new EmailExistsException();
        }
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("INSERT INTO users (firstName,lastName, email, wachtwoord) VALUES (:fname,:lname, :email, :wachtwoord)");
        $stmt->bindValue(":fname", $fname);
        $stmt->bindValue(":lname", $lname);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":wachtwoord", $password);
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $id = $laatsteNieuweId;
        return (int) $id;


    }


}
