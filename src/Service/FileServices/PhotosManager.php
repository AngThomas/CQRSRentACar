<?php

namespace App\Service\FileServices;

use App\Service\FileServices\PhotosValidator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotosManager
{
    public function __construct(
        private PhotosValidator $photosValidator,
        private FileSaver $fileSaver
    )
    {

    }

    /**
     * @param UploadedFile[] $files
     * @return void
     */
    public function uploadAll(array $photos, string $uploadPath)
    {
        foreach ($photos as $photo) {
            $this->uploadSingle($photo, $uploadPath);
        }
    }

    public function uploadSingle(UploadedFile $photo, string $uploadPath)
    {
        $this->photosValidator->validate($photo);
        $this->fileSaver->save($photo, $uploadPath);
    }
}