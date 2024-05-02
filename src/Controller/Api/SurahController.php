<?php

namespace App\Controller\Api;

use App\Entity\Surah;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SurahController extends AbstractController
{
    /**
     * @Route("/api/surahs", name="api_surah_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $surahs = $em->getRepository(Surah::class)->findAll();
        $data = [];

        foreach ($surahs as $surah) {
            $data[] = $this->transform($surah);
        }

        return $this->json($data);
    }

    /**
     * @Route("/api/surahs", name="api_surah_create", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $surah = new Surah();
        $surah->setNumber($request->request->get('number'));
        $surah->setNameAr($request->request->get('name_ar'));
        $surah->setNameEn($request->request->get('name_en'));
        $surah->setNameEnTranslation($request->request->get('name_en_translation'));
        $surah->setType($request->request->get('type'));

        $em->persist($surah);
        $em->flush();

        return $this->json($this->transform($surah), Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/surahs/{id}", name="api_surah_show", methods={"GET"})
     */
    public function show(int $id, EntityManagerInterface $em): JsonResponse
    {
        $surah = $em->getRepository(Surah::class)->find($id);

        if (!$surah) {
            return $this->json('No Surah found for id ' . $id, Response::HTTP_NOT_FOUND);
        }

        return $this->json($this->transform($surah));
    }

    /**
     * @Route("/api/surahs/{id}", name="api_surah_update", methods={"PUT"})
     */
    public function update(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $surah = $em->getRepository(Surah::class)->find($id);

        if (!$surah) {
            return $this->json('No Surah found for id ' . $id, Response::HTTP_NOT_FOUND);
        }

        $surah->setNumber($request->request->get('number', $surah->getNumber()));
        $surah->setNameAr($request->request->get('name_ar', $surah->getNameAr()));
        $surah->setNameEn($request->request->get('name_en', $surah->getNameEn()));
        $surah->setNameEnTranslation($request->request->get('name_en_translation', $surah->getNameEnTranslation()));
        $surah->setType($request->request->get('type', $surah->getType()));

        $em->flush();

        return $this->json($this->transform($surah));
    }

    /**
     * @Route("/api/surahs/{id}", name="api_surah_delete", methods={"DELETE"})
     */
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $surah = $em->getRepository(Surah::class)->find($id);

        if (!$surah) {
            return $this->json('No Surah found for id ' . $id, Response::HTTP_NOT_FOUND);
        }

        $em->remove($surah);
        $em->flush();

        return $this->json('Deleted a Surah successfully');
    }

    private function transform(Surah $surah): array
    {
        return [
            'id' => $surah->getId(),
            'number' => $surah->getNumber(),
            'name_ar' => $surah->getNameAr(),
            'name_en' => $surah->getNameEn(),
            'name_en_translation' => $surah->getNameEnTranslation(),
            'type' => $surah->getType(),
        ];
    }
}
