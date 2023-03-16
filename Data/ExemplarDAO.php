<?php

declare(strict_types=1);

namespace Data;

use Data\DBConfig;
use Entities\Exemplar;
use Exceptions\NoExemplarWithThisNumberException;

use \PDO;


class ExemplarDAO
{
    public function getAllExemplars(): array
    {
        $sql = "SELECT * FROM exemplars";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $titlesLijst = array();
        foreach ($resultSet as $rij) {
            $title = new Exemplar((int) $rij["exemplarID"], (int) $rij["exemplarNummer"], (int) $rij["exemplarStatus"], (int) $rij["filmid"]);
            array_push($titlesLijst, $title);
        }
        $dbh = null;
        return $titlesLijst;
    }

    public function getNumbersByID($id): array
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM exemplaren WHERE filmid = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $array = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($array, $row['exemplarNummer']);
        }

        $dbh = null;
        return $array;
    }

    public function getRentedAmount($id): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT count(*) FROM exemplaren WHERE filmid = :id and exemplarStatus = 2");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        $dbh = null;
        return $count;
    }


    public function noSuchNumber($exemplarID): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM exemplaren Where exemplarNummer = :id");
        $stmt->bindValue(":id", $exemplarID);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

    public function getExemplarByNummer($exemplarID): Exemplar
    {
        $rowCount = $this->noSuchNumber($exemplarID);
        if ($rowCount === 0) {
            throw new NoExemplarWithThisNumberException();
        }
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM exemplaren Where exemplarNummer = :id");
        $stmt->bindValue(":id", $exemplarID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $xmpl = new Exemplar((int) $result["exemplarID"], (int) $result["exemplarNummer"], (int) $result["exemplarStatus"], (int) $result["filmId"]);
        $dbh = null;

        return $xmpl;
        }

    public function setStatusFree($exemplarNr): ?bool
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("UPDATE exemplaren SET exemplarStatus = '1' WHERE exemplarNummer = :id");
        $stmt->bindValue(":id", $exemplarNr);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        $dbh = null;
        return $count;
    }

    public function setStatusRented($exemplarNr): ?bool
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("UPDATE exemplaren SET exemplarStatus = '2' WHERE exemplarNummer = :id");
        $stmt->bindValue(":id", $exemplarNr);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        $dbh = null;
        return $count;
    }

    public function addnewExemplar(int $filmid, int $nummer): ?int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("INSERT INTO exemplaren (exemplarNummer,exemplarStatus,filmId ) VALUES (:nummer,'1',:id)");
        $stmt->bindValue(":id", $filmid);
        $stmt->bindValue(":nummer", $nummer);
        $stmt->execute();
        //$count = $stmt->fetchColumn();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

    public function getNextFreeNumber(): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT MAX(exemplarNummer) + 1 FROM exemplaren");
        $stmt->execute();
        $number = $stmt->fetchColumn();
        $dbh = null;
        return $number;
    }

    public function deleteExemplar($id): int {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("DELETE FROM exemplaren WHERE exemplarNummer = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

    public function deleteExemplarByFilmId($filmid): int {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("DELETE FROM exemplaren WHERE filmId = :id");
        $stmt->bindValue(":id", $filmid);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

}