<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
final class ProductController extends AbstractController
{
    #[Route('/products', name: 'product_index')]
    public function index(ProductRepository $repository): Response
    {
        // $products = $repository-> findAll();
        // dump($products);
        return $this->render('product/index.html.twig', [
            'products' => $repository-> findAll(),
        ]);
    }

    // bu entity kullanmadan yapilan kod 

    // #[Route('/product/{id<\d+>}')]
    // public function show($id, ProductRepository $repository): Response
    // {
    //     // $product = $repository->findOneBy(['id' => $id]);
    //     $product = $repository->find($id);
        
    //     if ($product === null ) {
    //         throw $this->createNotFoundException("Product not found");
    //     }
    //     return $this->render('product/show.html.twig', [
    //         'product' => $product
    //     ]);
    // }


    // buda entity kullanarak olusturulan kod (yukaridaki kodla ayni)
    #[Route('/product/{id<\d+>}', name:'product_show')]
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }
    #[Route('/product/new', name:"product_new")]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $product = new Product;
        $form = $this -> createForm(ProductType::class, $product);

        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash(
                'notice',
                'Product created successfully!!'
            );
            // dd($request->request->all());
            //  dd($product);
            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()
            ]);
        }
        return $this->render('product/new.html.twig',[
            'form' => $form,

        ]);
    }

    #[Route('/product/{id<\d+>}/edit', name:'product_edit')]
    public function edit(Product $product, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this -> createForm(ProductType::class, $product);

        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash(
                'notice',
                'Product updated successfully!!'
            );
            // dd($request->request->all());
            //  dd($product);
            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()
            ]);
        }
        return $this->render('product/edit.html.twig',[
            'form' => $form,

        ]);
    }

    #[Route('/product/{id<\d+>}/delete', name:'product_delete')]
    public function delete(Product $product, Request $request, EntityManagerInterface $entityManager): Response
    {

        if ($request->isMethod('POST')) {
            $entityManager->remove($product);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Product deleted successfully!!'
            );
            return $this->redirectToRoute('product_index');
        }
        
        return $this->render('product/delete.html.twig',[
            'id' => $product->getId(),

        ]);
    }
}
