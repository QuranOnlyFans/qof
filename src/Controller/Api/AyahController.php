<?php

namespace App\Controller\Api;

use App\Entity\Ayah;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AyahController extends AbstractController
{
    /**
     * @Route("/api/ayahs", methods="GET")
     */
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $ayahs = $em->getRepository(Ayah::class)->findAll();
        return $this->json([
            'data' => array_map(function ($ayah) {
                return $this->transform($ayah);
            }, $ayahs)
        ]);
    }

    /**
     * @Route("/api/ayahs", methods="POST")
     */
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $ayah = new Ayah();
        $ayah->setNumber($request->request->get('number'))
             ->setText($request->request->get('text'))
             ->setNumberInSurah($request->request->get('numberInSurah'))
             ->setPage($request->request->get('page'))
             ->setSurahId($request->request->get('surahId'))
             ->setHizbId($request->request->get('hizbId'))
             ->setJuzId($request->request->get('juzId'))
             ->setSajda($request->request->get('sajda', false));

        $em->persist($ayah);
        $em->flush();

        return $this->json([
            'data' => $this->transform($ayah)
        ], Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/ayahs/{id}", methods="GET")
     */
    public function show(int $id, EntityManagerInterface $em): JsonResponse
    {
        $ayah = $em->getRepository(Ayah::class)->find($id);
        if (!$ayah) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }
        return $this->json([
            'data' => $this->transform($ayah)
        ]);
    }

    /**
     * @Route("/api/ayahs/{id}", methods="PUT")
     */
    public function update(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $ayah = $em->getRepository(Ayah::class)->find($id);
        if (!$ayah) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }

        $ayah->setNumber($request->request->get('number', $ayah->getNumber()))
             ->setText($request->request->get('text', $ayah->getText()))
             ->setNumberInSurah($request->request->get('numberInSurah', $ayah->getNumberInSurah()))
             ->setPage($request->request->get('page', $ayah->getPage()))
             ->setSurahId($request->request->get('surahId', $ayah->getSurahId()))
             ->setHizbId($request->request->get('hizbId', $ayah->getHizbId()))
             ->setJuzId($request->request->get('juzId', $ayah->getJuzId()))
             ->setSajda($request->request->get('sajda', $ayah->getSajda()));

        $em->flush();

        return $this->json([
            'data' => $this->transform($ayah)
        ]);
    }

    /**
     * @Route("/api/ayahs/{id}", methods="DELETE")
     */
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $ayah = $em->getRepository(Ayah::class)->find($id);
        if (!$ayah) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }

        $em->remove($ayah);
        $em->flush();

        return $this->json('Deleted successfully');
    }

    private function transform(Ayah $ayah): array
    {
        return [
            'id' => $ayah->getId(),
            'number' => $ayah->getNumber(),
            'text' => $ayah->getText(),
            'numberInSurah' => $ayah->getNumberInSurah(),
            'page' => $ayah->getPage(),
            'surahId' => $ayah->getSurahId(),
            'hizbId' => $ayah->getHizbId(),
            'juzId' => $ayah->getJuzId(),
            'sajda' => $ayah->getSajda(),
            'createdAt' => $ayah->getCreatedAt() ? $ayah->getCreatedAt()->format('Y-m-d H:i:s') : null,
            'updatedAt' => $ayah->getUpdatedAt() ? $ayah->getUpdatedAt()->format('Y-m-d H:i:s') : null
        ];
    }
}
