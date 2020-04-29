<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/product", name="product_")
 */

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(){
        $product = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('/product/index.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $product = $form->getData();

            $manager = $this->getDoctrine()->getManager();

            $manager->persist($product);

            $manager->flush();

            $this->addFlash('success', 'Produto Cadastrado com Sucesso!');

            return $this->redirectToRoute('product_index');
        }

        //dump($this->getDoctrine()->getRepository(Product::class)->findAll());

        return $this->render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Request $request, $id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $product = $form->getData();

            $manager = $this->getDoctrine()->getManager();

            $manager->flush();

            $this->addFlash('success', 'Produto Editado com Sucesso!');

            return $this->redirectToRoute('product_edit', ['id' => $id]);
        }

        //dump($this->getDoctrine()->getRepository(Product::class)->findAll());

        return $this->render('product/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

        /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove($id)
    {
        $doctrine = $this->getDoctrine(); 

        $product = $doctrine->getRepository(Product::class)->find($id);

        $manager = $doctrine->getManager();

        $manager->remove($product);

        $manager->flush();

        $this->addFlash('success', 'Produto Editado com Sucesso!');

        return $this->redirectToRoute('product_index');
    }
}
