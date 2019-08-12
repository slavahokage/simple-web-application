<?php

namespace App\Model;

class Blogs
{
    private $blogs = ['blog1', 'blog2', 'blog3', 'blog4', 'blog5',
        'blog6', 'blog7', 'blog8', 'blog9', 'blog10', 'blog11'];

    public function getBlogs()
    {
        return $this->blogs;
    }

    public function setBlogs($blogs)
    {
        $this->blogs = $blogs;
    }
}
