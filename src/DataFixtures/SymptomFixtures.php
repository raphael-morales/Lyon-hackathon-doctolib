<?php


namespace App\DataFixtures;


use App\Entity\Symptom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class SymptomFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $symptom = new Symptom();
        $symptom->setName('migraine');
        $symptom->setName('vertiges');
        $symptom->setName('sensibilité à la lumière');
        $symptom->setKeyword($this->getReference('keywords'));
        $manager->persist($symptom);
        $this->addReference('symptom', $symptom);
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
        return [KeyWordFixtures::class];
    }
}



