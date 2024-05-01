<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ApiController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $EntityManager)
    {
        $this->entityManager = $EntityManager;
    }

    /**
     * @Route("/api/users", methods="GET")
     */
    public function fetchUsers(): JsonResponse
    {
        $data = [];
        return $this->json($data);
    }
}
