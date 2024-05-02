<?php

namespace App\Controller\Api;

use App\Entity\AyahEdition;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AyahEditionController extends AbstractController
{
    /**
     * @Route("/api/ayah_editions", methods="GET")
     */
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $query = $em->createQueryBuilder()
        ->select('ae.id', 'ae.isAudio', 'a.id AS ayahId', 'e.id AS editionId')
        ->from('App\Entity\AyahEdition', 'ae')
        ->leftJoin('ae.ayah', 'a')
        ->leftJoin('ae.edition', 'e')
        ->setMaxResults(50000)
        ->getQuery();
    
        $ayahEditions = $query->getArrayResult();
        return $this->json($ayahEditions);
    }

    /**
     * @Route("/api/ayah_editions", methods="POST")
     */
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $ayahEdition = new AyahEdition();
        $ayahEdition->setData($request->request->get('data'))
                    ->setIsAudio($request->request->get('is_audio', false))
                    ->setAyah($em->getReference('App\Entity\Ayahs', $request->request->get('ayah_id')))
                    ->setEdition($em->getReference('App\Entity\Editions', $request->request->get('edition_id')));

        $em->persist($ayahEdition);
        $em->flush();

        return $this->json([
            'data' => $this->transform($ayahEdition)
        ], Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/ayah_editions/{id}", methods="GET")
     */
    public function show(int $id, EntityManagerInterface $em): JsonResponse
    {
        $ayahEdition = $em->getRepository(AyahEdition::class)->find($id);
        if (!$ayahEdition) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }
        return $this->json([
            'data' => $this->transform($ayahEdition)
        ]);
    }

    /**
     * @Route("/api/ayah_editions/{id}", methods="PUT")
     */
    public function update(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $ayahEdition = $em->getRepository(AyahEdition::class)->find($id);
        if (!$ayahEdition) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }

        $ayahEdition->setData($request->request->get('data', $ayahEdition->getData()))
                     ->setIsAudio($request->request->get('is_audio', $ayahEdition->getIsAudio()));

        $em->flush();

        return $this->json([
            'data' => $this->transform($ayahEdition)
        ]);
    }

    /**
     * @Route("/api/ayah_editions/{id}", methods="DELETE")
     */
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $ayahEdition = $em->getRepository(AyahEdition::class)->find($id);
        if (!$ayahEdition) {
            return $this->json('Not Found', Response::HTTP_NOT_FOUND);
        }

        $em->remove($ayahEdition);
        $em->flush();

        return $this->json('Deleted successfully');
    }

    private function transform(AyahEdition $ayahEdition): array
    {
        return [
            'id' => $ayahEdition->getId(),
            'data' => $ayahEdition->getData(),
            'isAudio' => $ayahEdition->getIsAudio(),
            'ayahId' => $ayahEdition->getAyah() ? $ayahEdition->getAyah()->getId() : null,
            'editionId' => $ayahEdition->getEdition() ? $ayahEdition->getEdition()->getId() : null,
        ];
    }
}
