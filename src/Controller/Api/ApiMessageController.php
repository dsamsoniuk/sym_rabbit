<?php

namespace App\Controller\Api;

use App\Entity\Product;
use App\Message\SmsNotification;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class ApiMessageController extends AbstractController
{
    #[Route('/api/message', name: 'app_api_message', methods: ['GET'])]
    public function index(Request $request, MessageBusInterface $messageBus): JsonResponse
    {
        
        $messageBus->dispatch(new SmsNotification($request->query->get('message')."\n", 5));

        return $this->json( [
            'msg' => 'ok'
        ]);
    }
  
}
