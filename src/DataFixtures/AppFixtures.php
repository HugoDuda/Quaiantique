<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Generator;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */

    private Generator $faker;

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher) {
        $this->faker = Factory::create('fr_FR');
        $this->hasher = $hasher;
}

    public function load(ObjectManager $manager): void    {

    $user = [];

    $admin = new User();
    $admin->setEmail('admin@quaiantique.ovh')
        ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
        ->setPlainpassword('A2ZdE$R3fVk!y49Pt4fDe5?S');

    $user[] = $admin;
    $manager->persist($admin);

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail($this->faker->email())
                ->setRoles(['ROLE_USER']);

            $hashPassword = $this->hasher->hashPassword(
                $user,
                'Motd€pa$$€s€curi$€6789'
            );

                $user->setPassword($hashPassword);

        $manager->persist($user);

        }

        $manager->flush();
    }
}
