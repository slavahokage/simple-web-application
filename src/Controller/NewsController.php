<?php

namespace App\Controller;

use App\Model\News;
use Core\Validation\Validator;

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

    public function createNew()
    {
        return $this->render('news-form.html.twig');
    }

    public function storeNews()
    {
        $title = $this->request->title;
        $description = $this->request->description;

        $validator = new Validator(
            ['title' => $title, 'description' => $description],
            ['title' => 'required|filled', 'description' => 'required|filled']
        );

        if ($validator->isFail()) {
            return $this->render('news-form.html.twig', ['errors' => $validator->getBrokenRules()]);
        }

        $this->redirectTo('/news');
    }
}
