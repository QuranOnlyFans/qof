<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiController extends AbstractController
{
    protected EntityManagerInterface $entityManager;
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(EntityManagerInterface $EntityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $EntityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/api/users", methods="GET")
     */
    public function fetchUsers(): JsonResponse
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();
        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail()
            ];
        }

        return $this->json($data);
    }

    /**
     * @Route("/api/users", methods="POST")
     */
    public function createUser(Request $request): JsonResponse
    {
        $content = json_decode($request->getContent(), true);
        
        $user = new User();
        $user->setName($content['username']);
        $user->setEmail($content['email']);
        $user->setPassword($content['password']); // Consider hashing this password

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'User created successfully',
            'userId' => $user->getId()
        ], Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/users/{id}", methods="GET")
     */
    public function getUseById($id): JsonResponse
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], 404);
        }

        return new JsonResponse($user->toArray(), 200);
    }

    /**
     * @Route("/api/users/{id}", methods="PUT")
     */
    public function updateUser(Request $request, $id): JsonResponse
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw new NotFoundHttpException('User not found');
        }

        $content = json_decode($request->getContent(), true);
        $user->setUsername($content['username'] ?? $user->getUsername());
        $user->setEmail($content['email'] ?? $user->getEmail());
        $user->setPassword($content['password'] ?? $user->getPassword()); // Consider hashing this password

        $this->entityManager->flush();

        return $this->json([
            'message' => 'User updated successfully',
            'userId' => $user->getId()
        ]);
    }

    /**
     * @Route("/api/users/{id}", methods="DELETE")
     */
    public function deleteUser($id): JsonResponse
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw new NotFoundHttpException('User not found');
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'User deleted successfully'
        ]);
    }
}