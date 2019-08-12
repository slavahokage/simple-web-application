<?php

namespace Pagination;

class Paginator
{
    private $maxResultsPerPage;

    private $currentPage;

    private $data;

    public function __construct($data, $currentPage, $maxResultsPerPage = 5)
    {
        $this->data = $data;
        $this->currentPage = $currentPage;
        $this->maxResultsPerPage = $maxResultsPerPage;
    }

    public function getCurrentPageResults()
    {
        return array_slice($this->data, $this->maxResultsPerPage * $this->currentPage, $this->maxResultsPerPage);
    }

    public function getMaxResultsPerPage()
    {
        return $this->maxResultsPerPage;
    }

    public function setMaxResultsPerPage($maxResultsPerPage)
    {
        $this->maxResultsPerPage = $maxResultsPerPage;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
