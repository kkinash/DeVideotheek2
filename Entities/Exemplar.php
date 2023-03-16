<?php 
declare(strict_types=1);

namespace Entities;

use Exceptions\NoExemplarWithThisNumber;

class Exemplar {
    private int $id;
    private int $nummer;
    private int $status;
    private int $filmid;
	public function __construct(int $cid, int $cnummer, int $cstatus, int $cfilmid)
    {  
        $this->id = $cid;
        $this->nummer = $cnummer;
        $this->status = $cstatus;
        $this->filmid = $cfilmid;
    
    }

    /**
     * Get the value of nummer
     */ 
    public function getNummer()
    {
        return $this->nummer;
    }

    /**
     * Set the value of nummer
     *
     * @return  self
     */ 
    public function setNummer($nummer)
    {
        $this->nummer = $nummer;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of filmid
     */ 
    public function getFilmid()
    {
        return $this->filmid;
    }

    /**
     * Set the value of filmid
     *
     * @return  self
     */ 
    public function setFilmid($filmid)
    {
        $this->filmid = $filmid;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}