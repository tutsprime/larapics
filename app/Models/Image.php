<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    public static function makeDirectory()
    {
        $subFolder = date('Y/m/d');
        Storage::makeDirectory('images/' . $subFolder);
    }

    public static function getDimension($image)
    {
        [$width, $height ] = getimagesize(Storage::path($image));
        return $width . "x" . $height;
    }
}
