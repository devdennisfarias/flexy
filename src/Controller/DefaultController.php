<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Tag;
use App\Controller\ProductController;
use App\Controller\TagController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->findAll();

        $tag = $this->getDoctrine()->getRepository(Tag::class)->findAll();

        return $this->render('/index.html.twig', [
            'tag' => $tag,
            'product' => $product
        ]);
    }
}
