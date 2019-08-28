<?php

namespace App\Model;

class Blogs extends Model
{
    protected $tableName = 'blogs';

    protected $fields = ['id', 'title', 'description'];
}
