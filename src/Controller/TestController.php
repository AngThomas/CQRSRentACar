<?php

namespace App\Controller;

use App\Command\Create\CreateCarOfferCommand;
use App\Command\Create\CreateRentingAgentCommand;
use App\Command\Handler\Create\CreateCarOfferHandler;
use App\Command\Handler\Create\CreateRentingAgentHandler;
use App\DTO\CarOfferDTO;
use App\DTO\Response\CarOfferResponseDTO;
use App\DTO\Response\SearchResponseDTO;
use App\Mapper\CarOfferMapper;
use App\Mapper\SearchCarOfferMapper;
use App\Mapper\RentingAgentMapper;
use App\Query\Handler\SearchCarOffersHandler;
use App\Query\CheckAvailabilityQuery;
use App\Request\SearchCarOfferRequest;
use App\Request\CreateCarOfferRequest;
use App\Request\CreateRentingAgentRequest;
use http\Env\Response;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/test', name: 'app_test')]
class TestController extends AbstractController
{
    #[Route('/renting-agent/add', name: 'app_test_add_renting_agent', methods: ['POST'])]
    public function addRentingAgent(#[MapRequestPayload] CreateRentingAgentRequest $request, CreateRentingAgentHandler $handler): JsonResponse
    {
        $addRentingAgentDTO = RentingAgentMapper::fromCreateRequest($request);
        $command = new CreateRentingAgentCommand($addRentingAgentDTO);
        $result = $handler->handle($command);

        return new JsonResponse('');
    }

    #[Route('/cars/show', name: 'app_test_show_cars', methods: ['POST'])]
    public function showCarsForRental(#[MapRequestPayload] SearchCarOfferRequest $request, SearchCarOffersHandler $handler, SerializerInterface $serializer): JsonResponse
    {
        $carOfferSearchDTO = SearchCarOfferMapper::fromSearchRequest($request);
        $query = new CheckAvailabilityQuery($carOfferSearchDTO);
        $carOffers = $handler->handle($query);
        $dtos = [];
        foreach ($carOffers as $carOffer) {
            $dtos[] = CarOfferMapper::toResponseDTO($carOffer);
        }

        $searchResp = new SearchResponseDTO($dtos);
        $serializedResp = $serializer->serialize($searchResp, 'json');
        return JsonResponse::fromJsonString($serializedResp);
    }

    #[Route('/car-offer/add', name: 'app_test_add_car_offer', methods: ['POST'])]

    public function addCarOffer(#[MapRequestPayload] CreateCarOfferRequest $request, CreateCarOfferHandler $handler): JsonResponse
    {
        $addCarOfferDTO = CarOfferMapper::fromCreateRequest($request);
        $command = new CreateCarOfferCommand($addCarOfferDTO);
        $result = $handler->handle($command);
        return new JsonResponse();
    }
}
