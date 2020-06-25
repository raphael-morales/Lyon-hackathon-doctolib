<?php


namespace App\DataFixtures;


use App\Entity\Specialist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class SpecialistFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $specialist = new Specialist();
        $specialist->setLink('https://www.doctolib.fr/neurologue/montelimar/herve-fayolle');
        $specialist->setSpecialitie($this->getReference('specialities'));
        $manager->persist($specialist);
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return class-string[]
     */
    public function getDependencies()
    {
        return [SpecialitiesFixtures::class];
    }
}

