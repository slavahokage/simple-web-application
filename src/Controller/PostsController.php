<?php

namespace App\Controller;

use Core\Helpers\StringHelper;

class PostsController extends Controller
{
    private const DATA = ['weekPost1' => 'Today is Friday', 'weekPost2' => 'Today is hot',
        'mathPost1' => '2+2=4', 'mathPost2' => '3+3=5', 'wowPost1' => 'today is happy day',
        'wowPost2' => 'you are cool man', 'madPost1' => 'you are mad'];

    public function posts()
    {
        $method = $this->request->requestMethod;

        if ($method === 'GET') {
            return $this->render('searchForm.html.twig');
        } else if ($method === 'POST') {
            $output = [];
            $postName = $this->request->postName ?? '';

            foreach (array_keys(self::DATA) as $item) {
                if (StringHelper::startsWith($item, $postName)) {
                    $output[] = self::DATA[$item];
                }
            }

            return $this->render('searchForm.html.twig', ['posts' => $output]);
        }
    }
}