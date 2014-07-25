<?php

namespace Acme\StoreBundle\Document;

use Sonata\UserBundle\Document\BaseGroup as BaseGroup;
//use FOS\UserBundle\Document\Group as BaseGroup;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="groups")
 */
class Group extends BaseGroup
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * Get id
     */
    public function getId()
    {
        return $this->id;
    }

}