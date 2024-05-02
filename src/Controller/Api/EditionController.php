<?php

namespace App\Controller\Api;

use App\Entity\Edition;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class EditionController extends AbstractController
{
    /**
     * @Route("/api/editions", methods="GET")
     */
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $editions = $em->getRepository(Edition::class)->findAll();
        return $this->json([
            'data' => array_map([$this, 'transform'], $editions)
        ]);
    }

    /**
     * @Route("/api/editions", methods="POST")
     */
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $edition = new Edition();
        $edition->setIdentifier($request->request->get('identifier'))
                ->setLanguage($request->request->get('language'))
                ->setName($request->request->get('name'))
                ->setEnglishName($request->request->get('englishName'))
                ->setFormat($request->request->get('format'))
                ->setType($request->request->get('type'));

        $em->persist($edition);
        $em->flush();

        return $this->json([
            'data' => $this->transform($edition)
        ], Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/editions/{id}", methods="GET")
     */
    public function show(int $id, EntityManagerInterface $em): JsonResponse
    {
        $edition = $em->getRepository(Edition::class)->find($id);
        if (!$edition) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }
        return $this->json([
            'data' => $this->transform($edition)
        ]);
    }

    /**
     * @Route("/api/editions/{id}", methods="PUT")
     */
    public function update(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $edition = $em->getRepository(Edition::class)->find($id);
        if (!$edition) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }

        $edition->setIdentifier($request->request->get('identifier', $edition->getIdentifier()))
                ->setLanguage($request->request->get('language', $edition->getLanguage()))
                ->setName($request->request->get('name', $edition->getName()))
                ->setEnglishName($request->request->get('englishName', $edition->getEnglishName()))
                ->setFormat($request->request->get('format', $edition->getFormat()))
                ->setType($request->request->get('type', $edition->getType()));

        $em->flush();

        return $this->json([
            'data' => $this->transform($edition)
        ]);
    }

    /**
     * @Route("/api/editions/{id}", methods="DELETE")
     */
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $edition = $em->getRepository(Edition::class)->find($id);
        if (!$edition) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }

        $em->remove($edition);
        $em->flush();

        return $this->json('Deleted successfully');
    }

    private function transform(Edition $edition): array
    {
        return [
            'id' => $edition->getId(),
            'identifier' => $edition->getIdentifier(),
            'language' => $edition->getLanguage(),
            'name' => $edition->getName(),
            'englishName' => $edition->getEnglishName(),
            'format' => $edition->getFormat(),
            'type' => $edition->getType(),
            'createdAt' => $edition->getCreatedAt() ? $edition->getCreatedAt()->format('Y-m-d H:i:s') : null,
            'updatedAt' => $edition->getUpdatedAt() ? $edition->getUpdatedAt()->format('Y-m-d H:i:s') : null
        ];
    }
}
