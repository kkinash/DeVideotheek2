<?php //FilmService.php
declare(strict_types=1);

namespace Business;

use Data\ExemplarDAO;
use Entities\Exemplar;
use Exceptions\NoExemplarWithThisNumber;

class ExemplarService {

    private ExemplarDAO $exemplarDAO;

    public function __construct() {
        $this->exemplarDAO = new ExemplarDAO();
    }

    public function getExemplarNumbersOverview($id)
    {
        $exemplarDAO = new ExemplarDAO();
        $exemplarOverview = $exemplarDAO->getNumbersByID($id);

            return $exemplarOverview;
    }

    public function getRentedAmountOverview($id)
    {
        $exemplarDAO = new ExemplarDAO();
        $rentedAmountOverview = $exemplarDAO->getRentedAmount($id);

            return $rentedAmountOverview;
    }

    
    public function getExemplarByNummerOverview($exemplarID): Exemplar
    {
        $exemplarDAO = new ExemplarDAO();
       
        $exemplarOverview = $exemplarDAO->getExemplarByNummer($exemplarID);
  
            return $exemplarOverview;
     }

     public function setStatusFreeOverview($exemplarNr): ?bool
     {
         $exemplarDAO = new ExemplarDAO();
        
         $changedStatus = $exemplarDAO->setStatusFree($exemplarNr);
   
             return $changedStatus;
      }

      public function setStatusRentedOverview($exemplarNr): ?bool
      {
          $exemplarDAO = new ExemplarDAO();
         
          $changedStatus = $exemplarDAO->setStatusRented($exemplarNr);
    
              return $changedStatus;
       }

       public function addnewExemplarOverview(int $filmid, int $nummer): ?int
       {
           $exemplarDAO = new ExemplarDAO();
          
           $exemplar = $exemplarDAO->addnewExemplar((int) $filmid, (int) $nummer);
     
               return $exemplar;
        }

        public function getNextFreeNumberOverview(): int
        {
            $exemplarDAO = new ExemplarDAO();
           
            $changedStatus = $exemplarDAO->getNextFreeNumber();
      
                return $changedStatus;
         }

         public function deleteExemplarOverview($id): int
         {
             $exemplarDAO = new ExemplarDAO();
            
             $result = $exemplarDAO->deleteExemplar($id);
       
                 return $result;
          }

          public function deleteExemplarByFilmIdOverview($filmid): int
          {
              $exemplarDAO = new ExemplarDAO();
             
              $result = $exemplarDAO->deleteExemplarByFilmId($filmid);
        
                  return $result;
           }

}