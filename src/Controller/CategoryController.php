<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Category;
use App\Models\CategoryDTO;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CategoryController extends AbstractController
{
    /**
     * This route has a greedy pattern and is defined first.
     */
    #[Route('/category/{id}', name: 'category_item')]
    public function show(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        /** @var Category $repository */
        $repository = $entityManager->getRepository(Category::class);
        return $this->json(['data' => $repository->find($id)]);
    }

    /**
     * This route could not be matched without defining a higher priority than 0.
     */
    #[Route('/category/all', name: 'category_all', priority: 2)]
    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        /** @var Category $repository */
        $repository = $entityManager->getRepository(Category::class);
        return $this->json(['data' => $repository->findAll()]);
    }
    #[Route('/category', name: 'category_add')]
    public function add(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $category = Category::fromDTO(new CategoryDTO(...$data));
        $entityManager->persist($category);
        $entityManager->flush();
        $dataCategory = json_decode($serializer->serialize($category, 'json'), true);
        return new JsonResponse(['data' => $dataCategory]);
    }

    public function update(int $id, Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $category = $entityManager->find(Category::class, $id);
        $category = $category->fromDTO(new CategoryDTO(...$data));
        $entityManager->merge($category);
        $entityManager->flush();
        $dataCategory = json_decode($serializer->serialize($category, 'json'), true);
        return new JsonResponse(['data' => $dataCategory]);
    }

    public function delete(int $id, Request $request, EntityManagerInterface $entityManager):JsonResponse
    {
        $category = $entityManager->find(Category::class, $id);
        if ($category) {
            $entityManager->remove($category);
            $entityManager->flush();
        }
        return new JsonResponse(['data' => ['id' => $id]]);
    }
}
