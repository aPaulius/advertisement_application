<?php

namespace Mediapark\AdvertisementBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MediaPark\AdvertisementBundle\Entity\Advertisement;
use MediaPark\AdvertisementBundle\Entity\User;

class LoadAdvertisements implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('login3');
        $user->setPassword('login3');
        $user->setEmail('izabele@gmail.com');
        $manager->persist($user);

        $advertisement = new Advertisement();
        $advertisement->setPostingDate(new \DateTime("now"));
        $advertisement->setTitle('Abbey Road" by The Beatles');
        $advertisement->setDescription(
            'The eleventh studio album released by The Beatles ' .
            'and a strong contender for the title of “Greatest Album of All Time”.'
        );
        $advertisement->setUser($user);
        $manager->persist($advertisement);

        $advertisement = new Advertisement();
        $advertisement->setPostingDate(new \DateTime("now"));
        $advertisement->setTitle('"Dark Side of the Moon" by Pink Floyd');
        $advertisement->setDescription(
            'The source of the most ubiquitous album cover art of all time.'
        );
        $advertisement->setUser($user);
        $manager->persist($advertisement);

        $user = new User();
        $user->setUsername('login4');
        $user->setPassword('login4');
        $user->setEmail('dovydas@gmail.com');
        $manager->persist($user);

        $advertisement = new Advertisement();
        $advertisement->setPostingDate(new \DateTime("now"));
        $advertisement->setTitle('"Random Access Memories" by Daft Punk');
        $advertisement->setDescription(
            'Daft Punk’s most recent attempt to control the world through music.'
        );
        $advertisement->setUser($user);
        $manager->persist($advertisement);

        $manager->flush();
    }
}
