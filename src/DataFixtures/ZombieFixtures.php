<?php

namespace App\DataFixtures;

use App\Entity\Zombie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ZombieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $zombies = [
            [
                'image' => 'bicycle_girl.png',
                'name' => 'Bicycle Girl',
                'description' => 'First walker Rick encounters, crawling on the ground.',
                'status' => 'Deceased',
                'season' => 1,
                'episode' => 1,
                'location' => 'Atlanta',
            ],
            [
                'image' => 'c13_zombie.jpg',
                'name' => 'C13 Zombie',
                'description' => 'A lonely Walker waiting for the eternal bus.',
                'status' => 'probably still waiting for the bus',
                'season' => 1,
                'episode' => 1,
                'location' => 'Atlanta',
            ],
            [
                'image' => 'michonnes_pet.png',
                'name' => 'Michonne\'s Pets',
                'description' => 'Two of Michonne\'s pet walkers, used to mask her presence.',
                'status' => 'Deceased',
                'season' => 3,
                'episode' => 1,
                'location' => 'Woods',
            ],
            [
                'image' => 'noahs_mother.png',
                'name' => 'Noah\'s Mother',
                'description' => 'Noah\'s mother who was killed by walkers.',
                'status' => 'Deceased',
                'season' => 5,
                'episode' => 9,
                'location' => 'Shirewilt Estates',
            ],
            [
                'image' => 'penny_blake.png',
                'name' => 'Penny Blake',
                'description' => 'The Governor\'s daughter, who is kept in captivity.',
                'status' => 'Deceased',
                'season' => 3,
                'episode' => 8,
                'location' => 'Woodbury',
            ],
            [
                'image' => 'sophia_peletier.png',
                'name' => 'Sophia Peletier',
                'description' => 'Carol\'s daughter who was found turned into a walker.',
                'status' => 'Deceased',
                'season' => 2,
                'episode' => 7,
                'location' => 'Barn at Hershel\'s Farm',
            ],
            [
                'image' => 'well_walker.png',
                'name' => 'Well Walker',
                'description' => 'A bloated walker found stuck in the well on Hershel\'s Farm.',
                'status' => 'Deceased',
                'season' => 2,
                'episode' => 4,
                'location' => 'Hershel\'s Farm',
            ],
            [
                'image' => 'field_walker.png',
                'name' => 'Field Walker',
                'description' => 'A walker found roaming in a field.',
                'status' => 'Unknown',
                'season' => 2,
                'episode' => 5,
                'location' => 'Hershel\'s Farm',
            ],
            [
                'image' => 'dale_killer_walker.png',
                'name' => 'Dale Killer Walker',
                'description' => 'The walker that attacks and kills Dale.',
                'status' => 'Deceased',
                'season' => 2,
                'episode' => 11,
                'location' => 'Hershel\'s Farm',
            ],
            [
                'image' => 'shane_zombie.png',
                'name' => 'Shane as a Walker',
                'description' => 'Shane Walsh after reanimating as a walker.',
                'status' => 'Deceased',
                'season' => 2,
                'episode' => 12,
                'location' => 'Woods',
            ],
        ];

        foreach ($zombies as $zombieData) {
            // Check if a Zombie with the same name already exists
            $existingZombie = $manager->getRepository(Zombie::class)
                ->findOneBy(['name' => $zombieData['name']]);

            if (!$existingZombie) {
                $zombie = new Zombie();
                $zombie->setImage($zombieData['image']);
                $zombie->setName($zombieData['name']);
                $zombie->setDescription($zombieData['description']);
                $zombie->setStatus($zombieData['status']);
                $zombie->setSeason($zombieData['season']);
                $zombie->setEpisode($zombieData['episode']);
                $zombie->setLocation($zombieData['location']);

                $manager->persist($zombie);
            }
        }

        $manager->flush();
    }
}