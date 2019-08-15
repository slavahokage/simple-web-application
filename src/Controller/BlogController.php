<?php

namespace App\Controller;

use App\Model\Blogs;

class BlogController extends Controller
{
    private const DATA = ['blog1', 'blog2', 'blog3', 'blog4', 'blog5',
        'blog6', 'blog7', 'blog8', 'blog9', 'blog10', 'blog11'];

    public function getBlogs()
    {
        $blogs = new Blogs(self::DATA);
        $page = $this->request->page;

        if (isset($page)) {
            return json_encode($blogs->paginate($page));
        }

        return json_encode($blogs->getData());
    }

    public function getBlogById($id)
    {
        $blogs = new Blogs(self::DATA);
        $blog = $blogs->getById($id);

        return json_encode($blog);
    }
}