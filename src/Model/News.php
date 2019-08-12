<?php

namespace App\Model;

class News
{
    private $news = ["first" => "First new", "second" => "Second new", "third" => "Third new"];

    public function getNews()
    {
        return $this->news;
    }

    public function setNews($news)
    {
        $this->news = $news;
    }
}
