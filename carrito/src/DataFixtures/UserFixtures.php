<?php
namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $user = new Usuario();
            $user->setEmail("usuario{$i}@gmail.com");
            $user->setNombre("Usuario{$i}");
            $user->setPassword('$2y$13$AdKcNEHMd/T1jwxKaLR15.T9sWyzRe/owC8Im.5qMIGoASGJz6tzG');
            $manager->persist($user);
        }

        $manager->flush();
    }
}
?>