<?php

namespace App\Controller;

use App\Model\Blogs;
use Pagination\Paginator;

class BlogController
{
    public function getBlogs()
    {
        $contacts = new Blogs();
        $blogs = $contacts->getBlogs();

        if (isset($_GET['page'])) {
            $paginator = new Paginator($blogs, $_GET['page']);

            return json_encode($paginator->getCurrentPageResults());
        }

        return json_encode($blogs);
    }
}
