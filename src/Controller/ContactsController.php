<?php

namespace App\Controller;

use App\Model\Contacts;

class ContactsController extends Controller
{
    /**
     * @Inject
     */
    public function getContacts(Contacts $contacts)
    {
        return json_encode($contacts->findAll(), JSON_UNESCAPED_UNICODE);
    }

    public function getContactById($id, Contacts $contacts)
    {
        return json_encode($contacts->findById($id));
    }
}
