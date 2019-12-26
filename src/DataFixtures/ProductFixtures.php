<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 40; $i++) {
            $product = new Product();

            $product->setName('Product n°' . $i);
            $product->setDescription("I'm a description for Product n°" . $i);
            $product->setImage('uploads/products/dummy.png');
            $user = $this->getReference('user' . rand(0, 19));
            $user->addProduct($product);
            $this->addReference('product'.$i, $product);
            $manager->persist($product);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class
        ];
    }
}
