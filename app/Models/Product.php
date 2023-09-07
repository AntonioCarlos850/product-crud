<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => $value/100,
            set: fn (float $value) => 100 * $value,
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => is_null($this->photo) ? $this->photo : asset('storage/' . $this->photo),
        );
    }

    public function deletePhoto()
    {
        if ($this->getOriginal('photo')) {
            Storage::disk('public')->delete($this->getOriginal('photo'));
        }
    }

    public function verifyPhotoChange()
    {
        if (
            $this->getOriginal('photo')
            && $this->getOriginal('photo') != $this->photo
        ) {
            $this->deletePhoto();
        }
    }
}
