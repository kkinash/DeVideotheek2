<?php //FilmService.php
declare(strict_types=1);

namespace Business;

use Data\FilmDAO;
use Entities\Film;
use Exceptions\FilmNotFoundException;

class FilmService {

    private FilmDAO $filmDAO;
    public function __construct()
    {
        $this->filmDAO = new FilmDAO();
    }
    public function getTitlesOverview(): array
    {
        $FilmDAO = new FilmDAO();
        $titlesLijstOverview = $FilmDAO->getAllFilms();

            return $titlesLijstOverview;
    }
    public function getFilmbyIdOverview($id): Film
    {
        $FilmDAO = new FilmDAO();
        $filmOverview = $FilmDAO->getFilmbyId($id);

            return $filmOverview;
    }

    public function adNewFilm($title): int
    {
        $FilmDAO = new FilmDAO();
        $id = $FilmDAO->addNewTitle($title);

            return $id;
    }

    public function deleteFilmOverview($id): int
    {
        $FilmDAO = new FilmDAO();
        $result = $FilmDAO->deleteFilm($id);
        return $result;
    }

}