<?php

namespace App\Controller;

use App\Model\News;

class NewsController
{
    private const DATA = ["first" => "First new", "second" => "Second new", "third" => "Third new"];

    public function getNews()
    {
        $news = new News(self::DATA);

        return json_encode($news->getData());
    }
}
