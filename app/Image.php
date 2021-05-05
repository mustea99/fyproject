<?php

namespace App;

class Image
{
    public static function upload(string $fieldName, int $ownerId)
    {
        $file = request()->file($fieldName);
        $exploded = explode('.', $file->getClientOriginalName());
        $fileName = md5($ownerId) . '.' . end($exploded);
        $uploadedFilePath = 'uploads/' . $fileName;
        move_uploaded_file(
             $file->getPathname(),
             public_path($uploadedFilePath)
        );

        return $uploadedFilePath;
    }
}