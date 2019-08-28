<?php

namespace App\Controller;

class CartController extends Controller
{
    public function cartPage()
    {
        return $this->render('products-add.html.twig');
    }

    public function displayProducts()
    {
        return $this->render('products-display.html.twig');
    }

    public function deleteProducts()
    {
        if (isset($this->request->cookie['products'])) {
            $this->request->deleteCookie('products');
        }

        $this->redirectTo('/cartPage');
    }

    public function storeProducts()
    {
        $products = [];

        foreach ($this->request->products as $item) {
            $products[] = $item;
        }

        if (!isset($this->request->cookie['products'])) {

            $products = array_flip($products);

            $products = array_map(function () {
                return 1;
            }, $products);

            $productsCookie = json_encode($products);


        } else {
            $productsCookie = json_decode($this->request->cookie['products'], true);

            foreach ($products as $product) {
                if (array_key_exists($product, $productsCookie)) {
                    $productsCookie[$product]++;
                } else {
                    $productsCookie[$product] = 1;
                }
            }

            $productsCookie = json_encode($productsCookie);

        }

        setcookie('products', $productsCookie);

        return $this->render('products-display.html.twig', ['products' => json_decode($productsCookie, true)]);
    }
}