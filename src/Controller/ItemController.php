<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Item;
use App\Models\CategoryDTO;
use App\Models\ItemDTO;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ItemController extends AbstractController
{
    public function show(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        /** @var Item $repository */
        $repository = $entityManager->getRepository(Item::class);
        return $this->json(['data' => $repository->find($id)]);
    }

    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        /** @var Item $repository */
        $repository = $entityManager->getRepository(Item::class);
        return $this->json(['data' => $repository->findAll()]);
    }

    public function add(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $item = Item::fromDTO(new ItemDTO(...$data));
        $entityManager->persist($item);
        $entityManager->flush();
        $dataItem = json_decode($serializer->serialize($item, 'json'), true);
        return new JsonResponse(['data' => $dataItem]);
    }

    public function update(int $id, Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $item = $entityManager->find(Item::class, $id);
        $item = $item->fromDTO(new ItemDTO(...$data));
        $entityManager->merge($item);
        $entityManager->flush();
        $dataItem = json_decode($serializer->serialize($item, 'json'), true);
        return new JsonResponse(['data' => $dataItem]);
    }

    public function delete(int $id, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $item = $entityManager->find(Item::class, $id);
        if ($item) {
            $entityManager->remove($item);
            $entityManager->flush();
        }
        return new JsonResponse(['data' => ['id' => $id]]);
    }
}
