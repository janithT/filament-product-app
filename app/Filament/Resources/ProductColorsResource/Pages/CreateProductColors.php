<?php

namespace App\Filament\Resources\ProductColorsResource\Pages;

use App\Filament\Resources\ProductColorsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductColors extends CreateRecord
{
    protected static string $resource = ProductColorsResource::class;

    /**
     * Set product colors create title
     * 
     */
    public function getTitle(): string
    {
        return 'Create Product Color';
    }

    /**
     * Set product colors create Breadcrumbs
     * 
     */
    public function getBreadcrumbs(): array
    {
        return [
             
        ];
    }
}
