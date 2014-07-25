<?php

namespace Acme\StoreBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * ProductRepository
 *
 */
class ProductRepository extends DocumentRepository
{
    public function findAllOrderedByName()
    {
        /*
         * $products = $this->get('doctrine_mongodb')
         *      ->getManager()
         *      ->createQueryBuilder('AcmeStoreBundle:Product')
         *      ->field('name')->equals('foo')
         *      ->limit(10)
         *      ->sort('price', 'ASC')
         *      ->getQuery()
         *      ->execute()
         */
        return $this->createQueryBuilder()
            ->sort('name', 'ASC')
            ->getQuery()
            ->execute();
    }
}