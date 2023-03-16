<?php

declare(strict_types=1);

namespace Data;

use Data\DBConfig;
use Entities\Film;
use Exceptions\TitleExistsException;
use \PDO;

class FilmDAO
{
    public function getAllFilms(): array
    {
        $sql = "SELECT * FROM films";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $titlesLijst = array();
        foreach ($resultSet as $rij) {
            $title = new Film((int) $rij["id"], (string) $rij["FilmTitle"]);
            array_push($titlesLijst, $title);
            }
        $dbh = null;
        return $titlesLijst;
    }

    public function getFilmbyId ($id):Film {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM films Where id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $film = new Film((int) $result["id"],(string) $result["FilmTitle"]);
        $dbh = null;
        return $film;
    }

    public function titleExists($title): int {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM films WHERE FilmTitle = :title");
        $stmt->bindValue(":title", $title);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

    public function addNewTitle(string $title): int {
        $rowCount = $this->titleExists($title);
        if ($rowCount > 0) {
            throw new TitleExistsException();
        }
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("INSERT INTO films (FilmTitle) VALUES (:title)");
        $stmt->bindValue(":title", $title);
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $id = $laatsteNieuweId;
        return (int) $id;
        
    }

    public function deleteFilm($id): int {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("DELETE FROM films WHERE id = :id;");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

}