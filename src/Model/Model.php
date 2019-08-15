<?php

namespace App\Model;

class Model
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function paginate($page, $maxResultsPerPage = 5)
    {
        return array_slice($this->data, $maxResultsPerPage * $page, $maxResultsPerPage);
    }

    public function getById($id)
    {
        if (array_key_exists($id, $this->data)) {
            return $this->data[$id];
        }

        return null;
    }
}
