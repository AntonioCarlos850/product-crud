<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     */
    public function creating(Product $product): void
    {
        $product->verifyPhotoChange();
    }

    /**
     * Handle the Product "updating" event.
     */
    public function updating(Product $product): void
    {
        $product->verifyPhotoChange();
    }

    /**
     * Handle the Product "deleting" event.
     */
    public function deleting(Product $product): void
    {
        $product->deletePhoto();
    }
}
