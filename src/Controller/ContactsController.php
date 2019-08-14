<?php

namespace App\Controller;

use App\Model\Contacts;

class ContactsController
{
    private const DATA = ["Bob" => "+375446686858", "Eva" => "+375446686812", "Alex" => "+375446686321"];

    public function getContacts()
    {
        $contacts = new Contacts(self::DATA);

        return json_encode($contacts->getData());
    }
}
