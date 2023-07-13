<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/student')]
class StudentController extends AbstractController
{

    public function __construct(private StudentRepository $repo, private EntityManagerInterface $em) {}

    #[Route(methods:'GET')]
    public function all(): Response
    {
        return $this->json($this->repo->findAll());
    }

    #[Route('/{id}', methods: 'GET')]
    public function one(Student $student) {
        return $this->json($student);
    }

    #[Route(methods: 'POST')]
    public function add(Request $request, SerializerInterface $serializer) {
        try {
            $student = $serializer->deserialize($request->getContent(), Student::class, 'json');
        } catch (\Exception $e) {
            return $this->json('Invalid Body', 400);
        }
        
        $this->em->persist($student);
        $this->em->flush();
        return $this->json($student, 201);

    }
}
