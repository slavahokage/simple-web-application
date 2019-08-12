<?php

namespace App\Model;

class Contacts
{
    private $contacts = ["Bob" => "+375446686858", "Eva" => "+375446686812", "Alex" => "+375446686321"];

    public function getContacts()
    {
        return $this->contacts;
    }

    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }
}
