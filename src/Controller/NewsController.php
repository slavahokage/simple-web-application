<?php

namespace App\Controller;

use App\Model\News;

class NewsController
{
    public function getNews()
    {
        $news = new News();

        return json_encode($news->getNews());
    }
}
