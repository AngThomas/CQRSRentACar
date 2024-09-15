<?php

namespace App\Service\FileServices;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileSaver
{
    public function save(UploadedFile $file, string $destination): string
    {
        return $file->move($destination, uniqid().$file->guessExtension())->getPathname();
    }
}