<?php 
declare(strict_types=1);

namespace Entities;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $wachtwoord;	
	public function __construct(int $cid, string $cname, string $cemail, string $cwachtwoord)
    {
        $this->id = $cid;
        $this->name = $cname;
        $this->email = $cemail;
        $this->wachtwoord = $cwachtwoord;
    }
    //public function getId()
	public function getId(): int
    {
        return $this->id;
    }
    //public function getName()
	public function getName(): string
    {
        return $this->name;
    }
    //public function getEmail()
	public function getEmail(): string
    {
        return $this->email;
    }
    //public function getWachtwoord()
	public function getWachtwoord(): string
    {
        return $this->wachtwoord;
    }
    
    //public function setName($name)
	public function setName(string $name)
    {
        $this->name = $name;
    }
}