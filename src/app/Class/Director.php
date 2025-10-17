<?php

namespace App\Class;

class Director
{
    private string $name;
    private string $birthday;
    private array $awards;

    public function __construct(string $name)
    {
        $this->name=$name;
        $this->awards=[];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Director
    {
        $this->name = $name;
        return $this;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday): Director
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getAwards(): array
    {
        return $this->awards;
    }

    public function setAwards(array $awards): Director
    {
        $this->awards = $awards;
        return $this;
    }



}