# symfony-sonata-mongodb-seed — the seed for Symfony2 apps with Sonata Admin and Sonata User + MongoDB

This project is an application skeleton for a typical [Symfony2][1] web app.
You can use it to quickly bootstrap your Symfony2 webapp projects.

The seed contains a sample Symfony2 application and is preconfigured to install the Symfony2
framework.

## Getting Started

To get you started you can simply clone the symfony-sonata-mongodb-seed repository and install the dependencies:

### Prerequisites

As Symfony uses [Composer][2] to manage its dependencies, the recommended way
to create a new project is to use it.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `create-project` command to generate a new Symfony application:

    php composer.phar create-project symfony/framework-standard-edition path/to/install

### Clone symfony-sonata-mongodb-seed
Clone the symfony-sonata-mongodb-seed repository using [git][git]:

    git clone https://github.com/hats/symfony-sonata-mongodb-seed.git
    cd symfony-sonata-mongodb-seed

### Install Dependencies
Composer will install symfony-sonata-mongodb-seed and all its dependencies under the
`symfony-sonata-mongodb-seed` directory so we can simply do:

    php composer.phar install

Before starting, make sure that your local system is properly
configured for symfony-sonata-mongodb-seed.

Find the `app\config\parameters.yml` and write you connection to MongoDB:

    parameters:
        database_host: YOUR_DATABASE_IP
        database_port: YOUR_DATABASE_PORT
        database_name: YOUR_DATABASE_NAME

Also, you need to install fixtures and create indexes in MongoDB

    php app/console doctrine:mongodb:fixtures:load
    php app/console doctrine:mongodb:schema:create --index

### Browsing the Demo Application

Congratulations! You're now ready to use symfony-sonata-mongodb-seed.

To see a real-live Symfony page in action, access the following pages:

    web/app_dev.php/
    web/app_dev.php/create
    web/app_dev.php/show/{id}
    web/app_dev.php/login
    web/app_dev.php/admin/login

Enjoy!

[1]:  http://symfony.com/
[2]:  http://getcomposer.org/
[3]:  http://symfony.com/download
[4]:  http://symfony.com/doc/2.4/quick_tour/the_big_picture.html
[5]:  http://symfony.com/doc/2.4/index.html
[6]:  http://symfony.com/doc/2.4/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.4/book/doctrine.html
[8]:  http://symfony.com/doc/2.4/book/templating.html
[9]:  http://symfony.com/doc/2.4/book/security.html
[10]: http://symfony.com/doc/2.4/cookbook/email.html
[11]: http://symfony.com/doc/2.4/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.4/cookbook/assetic/asset_management.html
[13]: http://symfony.com/doc/2.4/bundles/SensioGeneratorBundle/index.html
[git]: http://git-scm.com/
