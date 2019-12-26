<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail('user'.$i.'@fake.com');
            $user->setUsername('user'.$i);
            $user->setFirstname('User '.$i);
            $user->setLastname('Fake');
            $user->setPassword(password_hash('user'.$i, PASSWORD_DEFAULT));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
