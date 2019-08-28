<?php

namespace App\Model;

class Posts extends Model
{
    protected $tableName = 'posts';

    protected $fields = ['id', 'title', 'description'];
}