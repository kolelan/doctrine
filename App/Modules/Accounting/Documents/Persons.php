<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Documents\Person;

class Persons
{
    private $persons;

    public function __construct(array $persons = [])
    {
        foreach ($persons as $person)
            if ($person instanceof Person)
                $this->persons[] = $person;
    }

    public function getPersons()
    {
        return $this->persons;
    }

    public function getHeadOfOrg()
    {
        foreach ($this->persons as $person) {
            if ($person->isHeadOfOrg())
                return $person;
        }
    }

    public function getChief()
    {
        foreach ($this->persons as $person) {
            if ($person->isChiefAccountant())
                return $person;
        }
    }

    public function getSoleProp()
    {
        foreach ($this->persons as $person) {
            if ($person->isSoleProp())
                return $person;
        }
    }
}