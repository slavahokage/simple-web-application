<?php

namespace App\Model;

class Contacts extends Model
{
    protected $tableName = 'contacts';

    protected $fields = ['id', 'title', 'description'];
}
