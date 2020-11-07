<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'image_path',
        'color',
        'year',
        'engine',
    ];

    function deleteImage() {

        if (!$this->image_path)
            return;

        $file = storage_path('app/' . $this->image_path);

        if (!file_exists($file))
            return;

        unlink($file);
    }
}
