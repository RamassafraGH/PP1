<?php
namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $hashedPassword = '$2y$13$3NM6cvgsbh/SHI6TKIace.NAnDNdlVZrKopru4KTtzYU3rfUcKe0m'; // Reemplazá con el hash real

        for ($i = 1; $i <= 5; $i++) {
            $user = new Usuario();
            $user->setEmail("usuario{$i}@gmail.com");
            $user->setNombre("Usuario{$i}");
            $user->setPassword($hashedPassword);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
?>