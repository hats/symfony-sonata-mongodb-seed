<?php

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Document\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $products = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('AcmeStoreBundle:Product')
            ->findAllOrderedByName();

        return $this->render('AcmeStoreBundle:Default:index.html.twig', [
            'products' => $products
        ]);
    }

    public function createAction()
    {
        $product = new Product();
        $product->setName('A 2nd Some Product');
        $product->setPrice('39.99');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();

        return new Response('Created product id ' . $product->getId());
    }

    public function showAction($id)
    {
        $product = $this->get('doctrine_mongodb')
            ->getRepository('AcmeStoreBundle:Product')
            ->find($id);

        if(!$product){
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        return $this->render('AcmeStoreBundle:Default:show.html.twig', [
            'product' => $product
        ]);
    }

    public function updateAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $product = $dm->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        $product->setName('New product name!');
        $dm->flush();

        return $this->redirect($this->generateUrl('acme_store_homepage'));
    }
}
