<?php

namespace App\Controller\Api;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class ApiProductController extends AbstractController
{
    #[Route('/api/product', name: 'app_api_product', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->json( [
            'products' => $productRepository
                ->createQueryBuilder('p')
                ->getQuery()
                ->getScalarResult(),
        ]);
    }
    #[Route('/api/product', name: 'app_api_product_add', methods: ['POST'])]
    public function add(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): JsonResponse
    {

        try {
            $product = $serializer->deserialize($request->getContent(), Product::class, 'json');
            // throw new Exception('sdsd', Response::HTTP_CONFLICT);

            $em->persist($product);
            $em->flush();

        } catch (Exception $e) {
            return $this->json(['message' => $e->getMessage() ], Response::HTTP_CONFLICT);
        }

        return $this->json(['message' => 'ok'], Response::HTTP_OK);
    }
}
