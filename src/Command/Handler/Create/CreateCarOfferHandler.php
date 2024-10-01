<?php

namespace App\Command\Handler\Create;

use App\Command\Create\CreateCarOfferCommand;
use App\Service\CarOfferSaver;
use App\Service\FileServices\DirectoryManager;
use App\Service\FileServices\PhotosManager;
use Doctrine\ORM\EntityManagerInterface;


readonly class CreateCarOfferHandler
{

    public function __construct(
        EntityManagerInterface $entityManager,
        private CarOfferSaver $carOfferSaver,
        private PhotosManager $photosManager,
        private DirectoryManager $directoryManager
    )
    {
    }

    public function handle(CreateCarOfferCommand $createCarOfferCommand): ?int
    {
        $carOfferDTO = $createCarOfferCommand->getCarOffer();
        $photoUploadPath = $this->directoryManager->makeNewPhotoDirectory();
        $this->photosManager->uploadAll($carOfferDTO->getFiles(), $photoUploadPath);
        return $this->carOfferSaver->save($carOfferDTO);
    }
}