<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file', 'dimension', 'user_id'];

    public static function makeDirectory()
    {
        $subFolder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public static function getDimension($image)
    {
        [$width, $height ] = getimagesize(Storage::path($image));
        return $width . "x" . $height;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function fileUrl()
    {
        return Storage::url($this->file);
    }

    public function permalink()
    {
        return $this->slug ? route("images.show", $this->slug) : '#';
    }
}
