<?php


namespace App\DataFixtures;


use App\Entity\Specialities;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class SpecialitiesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $specialities = new Specialities();
        $specialities->setName('Neurologie');
        $specialities->setSymptom($this->getReference('symptom'));
        $manager->persist($specialities);
        $this->addReference('specialities', $specialities);
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
        return [SymptomFixtures::class];
    }
}
