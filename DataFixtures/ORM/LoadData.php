<?php

namespace Spionek\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Spionek\ExampleMenuBundle\Entity\Menu;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file(__DIR__ . '/../../data/menu.xml');
        foreach ($xml->menu as $m) {
            $Menu = new Menu();
            $Menu->setTitle($m->title);
            $Menu->setContents($m->contents);
            $manager->persist($Menu);
        }
        $manager->flush();
    }
}