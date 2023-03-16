<?php 
declare(strict_types=1);

namespace Entities;

class Film {
    private int $id;
    private string $title;

public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


}