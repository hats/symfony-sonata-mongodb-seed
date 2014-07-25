<?php

namespace Acme\StoreBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $admin = $userManager->createUser();

        $admin->setUsername('admin');
        $admin->setUsernameCanonical('admin');
        $admin->setEmail('admin@admin.adm');
        $admin->setEmailCanonical('admin@admin.adm');
        $admin->setPlainPassword('admin');
        $admin->setRoles(['ROLE_SUPER_ADMIN']);
        $admin->setEnabled(true);

        $userManager->updateUser($admin);
        //$manager->persist($admin);

        //$manager->flush();
    }
} 