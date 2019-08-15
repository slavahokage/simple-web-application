<?php

namespace App\Controller;

use App\Model\News;

class NewsController extends Controller
{
    private const DATA = ["first" => "First new", "second" => "Second new", "third" => "Third new"];

    public function getNews()
    {
        $news = new News(self::DATA);

        return json_encode($news->getData());
    }

    public function displayNews()
    {
        $news = new News(self::DATA);

        return $this->render('news.html.twig', ['news' => $news->getData()]);
    }
}
