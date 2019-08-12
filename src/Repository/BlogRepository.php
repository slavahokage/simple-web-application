<?php

namespace App\Repository;

class BlogRepository
{
    private $blog;

    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    public function getBlogById($id)
    {
        if (array_key_exists($id, $this->blog->getBlogs())) {
            return $this->blog->getBlogs()[$id];
        }

        return null;
    }
}
