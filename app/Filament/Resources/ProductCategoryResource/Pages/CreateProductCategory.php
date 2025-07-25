<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\ProductCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;

    /**
     * Product category set custom title
     * 
     */
    public function getTitle(): string
    {
        return 'Create Product Category';
    }

    /**
     * Product category set custom Breadcrumbs
     * 
     */
    public function getBreadcrumbs(): array
    {
        return [
            ProductCategoryResource::getUrl() => 'Product Categories',
            'Create',
        ];
    }
}
