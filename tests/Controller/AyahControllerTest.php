<?php

namespace App\Test\Controller;

use App\Entity\Ayah;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AyahControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/ayah/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = (static::getContainer()->get('doctrine'))->getManager();
        $this->repository = $this->manager->getRepository(Ayah::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Ayah index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'ayah[number]' => 'Testing',
            'ayah[text]' => 'Testing',
            'ayah[numberInSurah]' => 'Testing',
            'ayah[page]' => 'Testing',
            'ayah[surahId]' => 'Testing',
            'ayah[hizbId]' => 'Testing',
            'ayah[juzId]' => 'Testing',
            'ayah[sajda]' => 'Testing',
            'ayah[createdAt]' => 'Testing',
            'ayah[updatedAt]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Ayah();
        $fixture->setNumber('My Title');
        $fixture->setText('My Title');
        $fixture->setNumberInSurah('My Title');
        $fixture->setPage('My Title');
        $fixture->setSurahId('My Title');
        $fixture->setHizbId('My Title');
        $fixture->setJuzId('My Title');
        $fixture->setSajda('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Ayah');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Ayah();
        $fixture->setNumber('Value');
        $fixture->setText('Value');
        $fixture->setNumberInSurah('Value');
        $fixture->setPage('Value');
        $fixture->setSurahId('Value');
        $fixture->setHizbId('Value');
        $fixture->setJuzId('Value');
        $fixture->setSajda('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'ayah[number]' => 'Something New',
            'ayah[text]' => 'Something New',
            'ayah[numberInSurah]' => 'Something New',
            'ayah[page]' => 'Something New',
            'ayah[surahId]' => 'Something New',
            'ayah[hizbId]' => 'Something New',
            'ayah[juzId]' => 'Something New',
            'ayah[sajda]' => 'Something New',
            'ayah[createdAt]' => 'Something New',
            'ayah[updatedAt]' => 'Something New',
        ]);

        self::assertResponseRedirects('/ayah/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNumber());
        self::assertSame('Something New', $fixture[0]->getText());
        self::assertSame('Something New', $fixture[0]->getNumberInSurah());
        self::assertSame('Something New', $fixture[0]->getPage());
        self::assertSame('Something New', $fixture[0]->getSurahId());
        self::assertSame('Something New', $fixture[0]->getHizbId());
        self::assertSame('Something New', $fixture[0]->getJuzId());
        self::assertSame('Something New', $fixture[0]->getSajda());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Ayah();
        $fixture->setNumber('Value');
        $fixture->setText('Value');
        $fixture->setNumberInSurah('Value');
        $fixture->setPage('Value');
        $fixture->setSurahId('Value');
        $fixture->setHizbId('Value');
        $fixture->setJuzId('Value');
        $fixture->setSajda('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/ayah/');
        self::assertSame(0, $this->repository->count([]));
    }
}
