<?php

namespace App\Controller;

use App\Model\Contacts;

class ContactsController
{
    public function getContacts()
    {
        $contacts = new Contacts();

        return json_encode($contacts->getContacts());
    }
}
