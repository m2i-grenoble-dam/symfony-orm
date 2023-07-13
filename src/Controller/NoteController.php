<?php

namespace App\Controller;

use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/note')]
class NoteController extends AbstractController
{

    public function __construct(private NoteRepository $repo, private EntityManagerInterface $em) {}


    #[Route(methods: 'GET')]
    public function all(): JsonResponse
    {
        return $this->json($this->repo->findAll());
    }
}
