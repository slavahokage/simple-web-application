<?php

namespace App\Controller;

use App\Model\News;
use Core\Validation\Validator;

class NewsController extends Controller
{

    /**
     * @Inject
     */
    public function getNews(News $news)
    {
        return json_encode($news->findAll(), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @Inject
     */
    public function displayNews(News $news)
    {
        $newsForTwig = $news->findColumns(['id', 'title', 'description']);

        return $this->render('news.html.twig', ['news' => $newsForTwig]);
    }

    public function createNew()
    {
        return $this->render('news-form-new.html.twig');
    }

    public function updateNew(?int $id, News $news)
    {
        $validator = new Validator(
            ['id' => $id],
            ['id' => 'required|filled']
        );

        if ($validator->isFail()) {
            return $this->render('news-form.html.twig', ['errors' => $validator->getBrokenRules()]);
        }

        $new = $news->findById($id);

        return $this->render('news-form-update.html.twig', ['new' => $new]);
    }

    public function storeNews(?int $id, News $news)
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

        if ($id === null) {
            $news->save([$title, $description]);
        } else {
            $news->update(['title' => $title, 'description' => $description], $id);
        }

        $this->addFlash("success", "Successfully saved");

        $this->redirectTo('/displayNews');
    }

    public function deleteNews(News $news)
    {
        $id = $this->request->id;
        $validator = new Validator(
            ['id' => $id],
            ['id' => 'required|filled']
        );

        if ($validator->isFail()) {
            return $this->render('news-form.html.twig', ['errors' => $validator->getBrokenRules()]);
        }

        $news->delete($id);

        $this->redirectTo('/displayNews');
    }
}
