<?php

namespace App\Controller;

use App\Model\Blogs;

class BlogController extends Controller
{
    /**
     * @Inject
     */
    public function getBlogs(Blogs $blogs)
    {
        $page = $this->request->page;

        if (isset($page)) {
            return json_encode($blogs->paginate($page));
        }

        return json_encode($blogs->findAll(), JSON_UNESCAPED_UNICODE);
    }

    public function getBlogById($id, Blogs $blogs)
    {
        return json_encode($blogs->findById($id));
    }
}
