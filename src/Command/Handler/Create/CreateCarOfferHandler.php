<?php

namespace App\Command\Handler\Create;

use App\Command\Create\AddCarOfferCommand;
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

    public function handle(AddCarOfferCommand $addCarOfferCommand): ?int
    {
        $addCarOfferDTO = $addCarOfferCommand->getCarOffer();
        $photoUploadPath = $this->directoryManager->makeNewPhotoDirectory();
        $this->photosManager->uploadAll($addCarOfferDTO->getFiles(), $photoUploadPath);
        return $this->carOfferSaver->save($addCarOfferDTO);
    }
}